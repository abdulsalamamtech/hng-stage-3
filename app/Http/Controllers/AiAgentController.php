<?php

namespace App\Http\Controllers;

use App\AiAgents\MyAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AiAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return [$request->jsonrpc, $request?->params['message']['parts'][0]['text']];
        // $request?->param?->message?->parts->text
        // const { jsonrpc, method, id, params } = rpcRequest;
        if ($request->jsonrpc && $request->jsonrpc && $request?->filled('params.message.parts.0.text')) {
            $prompt = $request?->params['message']['parts'][0]['text'] ?? "";
        } elseif ($request->message) {
            $prompt =  $request?->message ?? "Give me a fun fact about medical science and healthcare";
        } else {
            return response()->json($this->sendError("Invalid request", $request?->id ?? null), 401);
        }
        return [
            "id" => date('s', time()),
            "request" => request()->all(),
            "prompt" => $prompt
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // JSON-RPC Request Object
        // {
        //     "jsonrpc": "2.0", 
        //     "method": "message/send", 
        //     "id": 3,
        //     "params": {
        //         "message": {
        //           "role": "user",  
        //           "parts": [
        //              {
        //              "type": "text",
        //              "text": "ping"
        //              }
        //          ]
        //         }
        //     } 
        // }
        $prompt = "";
        try {
            // const { jsonrpc, method, id, params } = rpcRequest;
            if ($request->jsonrpc && $request->jsonrpc && $request?->filled('params.message.parts.0.text')) {
                $prompt = $request?->params['message']['parts'][0]['text'] ?? "";
            } elseif ($request->message) {
                $prompt =  $request?->message ?? "Give me a fun fact about medical science and healthcare";
            } else {
                return response()->json($this->sendError("Invalid request", $request?->id ?? null), 401);
            }
            //code...
            $response = MyAgent::for('John Deo' . $request?->jsonrpc ?? now())->respond($prompt);
            // echo $response = MyAgent::ask($message);
            // return $response;
            return response()->json($this->sendSuccess($response, $request?->id ?? null), 200);
        } catch (\Throwable $th) {
            //throw $th;
            // return $th->getMessage();
            return response()->json($this->sendError($th->getMessage(), $request?->id ?? null), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return [
            "id" => $id,
            "request" => request()->all()
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return [
            "id" => $id,
            "request" => $request->all()
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return [
            "id" => $id,
            "request" => request()->all()
        ];
    }

    // Emergent AI
    // send success JSON-RPC Success Response
    public function sendSuccess($data, $id = null)
    {
        // {
        //     "jsonrpc": "2.0", 
        //     "id": 3,
        //     "result": {
        //     "role": "agent",  
        //      "parts": [
        //           {
        //            "type": "text",
        //            "text": "pong"
        //            }
        //        ],
        //     "kind": "message",
        //     "message_id": "fbuvdhb4ke6vq8hbva9qh9ha"
        //     } 
        // }
        return [
            "jsonrpc" => '2.0',
            "id" => $id ?? null,
            "result" => [
                "role" => "user" ?? "agent",
                "parts" => [
                    "kind" => "text",
                    "type" => "text",
                    "text" => $data
                ],
                "kind" => "message",
                "message_id" => Str::uuid(),
            ]
        ];
    }
    // send error JSON-RPC Error Response
    public function sendError($data, $id = null)
    {
        return [
            "jsonrpc" => '2.0',
            "id" => $id ?? null,
            "error" => [
                "code" => -32600,
                "message" => $data
            ]
        ];
    }
}
