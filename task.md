Stage 3 Backend Task – Build and Integrate AI Agents

Welcome to Stage 3.
You're going to build AI agents and hook them up to Telex.im. We want to see how you design intelligent systems, handle integrations, and structure your code.
Getting Access to Telex.im
You need access to the Telex organisation first.
Run this command: /telex-invite your-email@example.com (same way you make submissions)
Swap in your actual email. You'll get added to the organisation and can start testing.
What You're Building
Create an AI agent that does something useful. Pick a task, solve a problem, help users.
Ideas:

    Code helper that assists developers on Telex
    Task tracker that reminds people about their projects
    Bot that summarises data or automates chat responses

Build it. Connect it to Telex.im. Make it talk to users on the platform.
Technical Requirements
TypeScript / JavaScript Developers:
You're required to use Mastra. This isn't optional.
What you need to do:

    Set up a Mastra agent
    Define what it does and how it behaves
    Connect it to Telex.im using the A2A protocol with proper JSON formatting
    To view the interactions with your agents go to https://api.telex.im/agent-logs/{channel-id}.txt

The channel-id is the first UUID on the address bar https://telex.im/telex-im/home/colleagues/01989dec-0d08-71ee-9017-00e4556e1942/01989dec-01be-71ee-a273-7744838298d6
Example
https://api.telex.im/agent-logs/01989dec-0d08-71ee-9017-00e4556e1942.txtNote on workflow JSON: For node positions in your workflow, use any positive integers. Example:

"position": [
816,
-112 // any integer works
]

SAMPLE WORKFLOW JSON

{
"active": false,
"category": "utilities",
"description": "A workflow that gives weather information",
"id": "sGC3u7y4vBaZww0G",
"long_description": "\n You are a helpful weather assistant that provides accurate weather information and can help planning activities based on the weather.\n\n Your primary function is to help users get weather details for specific locations. When responding:\n - Always ask for a location if none is provided\n - If the location name isn't in English, please translate it\n - If giving a location with multiple parts (e.g. \"New York, NY\"), use the most relevant part (e.g. \"New York\")\n - Include relevant details like humidity, wind conditions, and precipitation\n - Keep responses concise but informative\n - If the user asks for activities and provides the weather forecast, suggest activities based on the weather forecast.\n - If the user asks for activities, respond in the format they request.\n\n Use the weatherTool to fetch current weather data.\n",
"name": "phoenix_agent",
"nodes": [
{
"id": "weather_agent",
"name": "weather agent",
"parameters": {},
"position": [
816,
-112
],
"type": "a2a/mastra-a2a-node",
"typeVersion": 1,
"url": "https://telex-mastra.mastra.cloud/a2a/agent/weatherAgent"
}
],
"pinData": {},
"settings": {
"executionOrder": "v1"
},
"short_description": "someting"
}

{
"active": false,
"category": "utilities",
"description": "A workflow that gives weather information",
"id": "sGC3u7y4vBaZww0G",
"long_description": "\n You are a helpful weather assistant that provides accurate weather information and can help planning activities based on the weather.\n\n Your primary function is to help users get weather details for specific locations. When responding:\n - Always ask for a location if none is provided\n - If the location name isn't in English, please translate it\n - If giving a location with multiple parts (e.g. \"New York, NY\"), use the most relevant part (e.g. \"New York\")\n - Include relevant details like humidity, wind conditions, and precipitation\n - Keep responses concise but informative\n - If the user asks for activities and provides the weather forecast, suggest activities based on the weather forecast.\n - If the user asks for activities, respond in the format they request.\n\n Use the weatherTool to fetch current weather data.\n",
"name": "phoenix_agent",
"nodes": [
{
"id": "weather_agent",
"name": "weather agent",
"parameters": {},
"position": [
816,
-112
],
"type": "a2a/mastra-a2a-node",
"typeVersion": 1,
"url": "https://telex-mastra.mastra.cloud/a2a/agent/weatherAgent"
}
],
"pinData": {},
"settings": {
"executionOrder": "v1"
},
"short_description": "something"
}

Other Languages (Python, Go, Java, Rust, C#, PHP, etc.):
Build your agent from scratch. Pick any framework or library you want.
What you need to do:

    Write the core logic
    Handle incoming messages
    Create endpoints that work with Telex.im

Your API needs to be clean and talk to the platform without breaking.
Integration Requirements
Your agent needs to:

    Respond to messages or events from Telex.im
    Send back valid responses or actions
    Use REST or WebSocket (keep it simple and consistent)
    Handle errors properly and validate responses

You need to provide:

    A public endpoint or repo we can test

Deliverables

    Working AI agent
    Telex.im integration (fully connected)
    Live demo or API endpoint we can hit
    Documentation explaining what it does and how to run it
    Blog post about your integration process (especially if you used Mastra - walk through how you did it, what worked, what didn't)
    Tweet about your agent and share what you built
        TypeScript/JavaScript developers: Tag @mastra in your tweet
        All other languages: Tag @hnginternship and @teleximapp in your tweet

How We'll Evaluate This

    Does your agent work well? Is it smart?
    Integration quality with Telex.im
    Code structure and documentation
    Creativity (build something interesting)
    Error handling and testing
    Quality of your blog post and how well you explain your process

Submission

    You can implement this in any language of your choice (eg Fortran, C, Assembly etc)
    Use the command /submit in stage-3-backend and fill in the requirements

That's it. Show us how you think and build. This isn't about basic CRUD anymore.
Build something cool for Telex.im.Submission Deadline: Deadline: Monday, 3rd Nov 2025 | 11:59pm GMT+1 (WAT)

May the wind be always at your back

Good luck, Backend Wizards! :rocket: (edited)
telex.im
Telex App
Get real-time notifications per deliverables and achieve efficient communication with teammates and your deployed solutions.

###

Interact with Emergent on Telex.im
https://telex.im/telex-ai-intergration/home/colleagues/019a49a1-993b-72e7-8c82-fe997ba95a54/019a49a1-188b-72c8-af90-29f4e6f93104

Adding task
https://docs.telex.im/docs/Agents/creating-agent/create_agents

###

Motivation:
Building Emergent AI and AI Agent that answers medical emergency related questions and give tips on what to do based on described emergency.

It is a difficult thing to exactly know what to do in different emergency situation, the data is already out their is just to have the exact information of what to do on different situation before help arise can save lives and property.

I wanted to be able to have an AI agent that can easily guide someone through this situation.

Tech stack:
PHP/Laravel
Laragent library
Railway

In short Emergent is a chat bot that answers #medical #emergency related questions & help with tips!

System design:

```sh
User Message (Telex)
    ↓
JSON-RPC 2.0 Request
    ↓
Railway App Service (NGINX Server)
    ↓
Laravel Framework & API
    ↓
Gemini AI Agent
    ↓
Format & Return
    ↓
A2A Response
    ↓
Telex.im Display
```

💻 Building the Agent:
I set up Laravel
Install Laragent
Register my API KEY on Gemini
Add the API_KEY to my .env file
I test the agent ability
I Implement the A2A Protocol
I test it again
I push to GitHub and deployed to Railway
Result

The challenges:

-   I wasn't able to understand how a2a works.
    I go through the documentation and articles multiple times
-   I wast not getting the right message
    I went on to test and debug the codebase again
-   Other AI model I used wasn't working
    I tried multiple LLM before finally using Gemini
-   Formatting the response and error
    I created different methods to format the responses for error and success
-   I have production error while deploying to Railway
    I changed the PHP version from 8.2 to 8.3
-   I wasn't able to integrate it with telex.
    An article and step by step guide was later sent to the slack group that is want I used to be able to setup my Agent.

Performance:
Response agent api time <500ms
Total response time ~2-3s
Uptime 99.9%
Success rate 99%

Conclusion:
Building Emergent AI Agent allow people to be able to seek emergency tips before help arrive and I was able to work on something extra-ordinary using AI and combining it with a technology new to me Telex A2A protocol.

Connect with me:
GitHub:
X (Twitter):
Linkedin:
Facebook:

###

How to integrate ai agent with telex platform Please, note that I'm yet to integrate my ai agent with the telex.im ai coworker.However, I think the process is as follows:

    Obtain an access to the telex platform by running /telex-invite your email addres command in the in-message of the stage-3-backend  . This was explained on the task's rubric on the project announcement channel.
    Follow the instructions, received in your email
    Create an ai Coworker by clicking on the Add new button, located under the Ai Coworker on the telex platform. Details are here.
    Fill up the displayed form accordingly. Make sure to take note of the name of your coworker
    Look up the created coworker
    Open it and look for the configure button, located to the right hand side of your screen and closer to the bottom of the screen. You can use Ctrl + f  to find the word configure
    Click it. (You might need to click it multiple times) before it responds.
    Under the task tab, click the Task List and change it to JSON. Details are here.
    Click example button. It is located close to the Task List. Clicking the example will give you a JSON workflow template.
    Update the JSON workflow values so that it correctly calls your hosted ai agent (mastra ai agent or your railway hosted api).  Note that the JSON workflow template was given in the task rubric.

If you are a type who really wants to know more about telex, please use their official tutorial whose link is https://docs.telex.im/docs/Agents/quickstartThe above link takes you to the Agent page, which explains about Agent.Different concepts are explained in their official documentation or tutorial.Once again, note that I am yet to integrate my ai agent with the telex platform. (edited)
docs.telex.imdocs.telex.im
Create Your First Agent | Telex Docs
Agents are created through a simple form where you define their identity, role, and behavior. Once launched — with task lists and skills properly configured — you can interact with them to perform tasks based on your defined task list using assigned

Route: url/a2a/agent/:agentId

```php
[
"jsonrpc" => "2.0"
"id" => 3,
"result" => [
    "id" => randInt(),
    "contextId" => randInt(),
    "status" => [
        "state" => "completed",
        "timestamp" => now(),
        "message" => [
            "messageId" => randInt(),
            "role" => "agent",
            "parts" => [
                "kind" => "test",
                "text" => $AgentMessage
            ],
            "kind" => "message"
        ]
    ],
    "articacts",
    "history"
    "kind" => "task"
]
]
```

### Defining Workflow on Telex

link: https://fynix.dev/blog/telex-x-mastra
video: https://youtu.be/r1mOaQUUiXk

```json
{
  "active": false,
  "category": "health",
  "description": "A workflow that gives medical health information",
  "id": "sGC3u7y4vBaZww0G",
  "name": "emergent_agent",
  "long_description": "
      You are a helpful medical assistant that provides accurate medical information and can help gives urgent emergency tips.

      Your primary function is to help users with information details of what to do responding:
      - Always ask for the situation or kind of the emergency if none is provided
      - If the information isn't in English, please translate it
      - Include relevant details to kind the people in need of the emergency services
      - Keep responses concise but informative
",
  "short_description": "Get medical emergency information",
  "nodes": [
    {
      "id": "emergent_agent",
      "name": "emergent_agent",
      "parameters": {},
      "position": [816, -112],
      "type": "a2a/mastra-a2a-node",
      "typeVersion": 1,
      "url": "https://hngi13-backend-task-production.up.railway.app/api/agents"
    }
  ],
  "pinData": {},
  "settings": {
    "executionOrder": "v1"
  }
}



```
