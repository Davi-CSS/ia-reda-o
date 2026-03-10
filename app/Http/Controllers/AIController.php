<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AIController extends Controller
{
    <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class AIController extends Controller
{
    public function index()
    {
        return view('ai');
    }

    public function generate(Request $request)
    {
        $prompt = $request->prompt;

        $client = OpenAI::client(env('OPENAI_API_KEY'));

        $result = $client->chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        $text = $result->choices[0]->message->content;

        return back()->with('response', $text);
    }
}
}
