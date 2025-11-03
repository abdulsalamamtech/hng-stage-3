<?php

namespace App\AiAgents;

use LarAgent\Agent;

class MyAgent extends Agent
{
    // openai
    // protected $model = 'gpt-4.1-nano';
    // protected $provider = 'default';

    // protected $history = 'in_memory';
    protected $history = 'cache';
    // Limits the length of the AI’s response.
    protected $maxCompletionTokens = 1024;
    // Controls randomness: 0.0 for focused responses, 2.0 for creative ones.
    protected $temperature = 0.7; // Balanced

    // gemini
    protected $model = 'gemini-2.5-flash';
    protected $provider = 'gemini';

    // groq
    // protected $model = 'grok-4-latest';
    // protected $provider = 'groq';   


    protected $tools = [];

    public function instructions()
    {
        return "You are a medical expert in Nigeria, briefly answer question like an expert in health and medicine.";
    }

    // public function prompt($message)
    // {
    //     return $message;
    // }
    public function prompt($message)
    {
        return $message;
    }
}
