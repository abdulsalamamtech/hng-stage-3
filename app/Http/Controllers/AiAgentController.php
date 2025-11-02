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
    public function index()
    {
        return [
            "id" => date('s', time()),
            "request" => request()->all()
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
        // const { jsonrpc, method, id, params } = rpcRequest;

        try {
            //code...
            $message = "what should I do when a car accident occur?";
            $response = MyAgent::for('John Deo' . $request?->jsonrpc ?? now())->respond($message);
            // echo $response = MyAgent::ask($message);
            // return $response;
            return response()->json($this->sendSuccess($response, $request?->id ?? null));
        } catch (\Throwable $th) {
            //throw $th;
            // return $th->getMessage();
            return response()->json($this->sendError($th->getMessage(), $request?->id ?? null));
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
                "part" => [
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
