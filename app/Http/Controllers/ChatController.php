<?php
use OpenAI;
use App\Models\Chat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ChatController extends Controller
{

public function index()
{
    $history = Chat::where('user_id', auth()->id())
    ->latest()
    ->get();

    return view('chat', compact('history'));
}

public function generate(Request $request)
{

$client = OpenAI::client(env('OPENAI_API_KEY'));

$response = $client->chat()->create([
'model' => 'gpt-4o-mini',
'messages' => [
['role' => 'user', 'content' => $request->prompt],
],
]);

$text = $response->choices[0]->message->content;

Chat::create([
'user_id' => auth()->id(),
'prompt' => $request->prompt,
'response' => $text
]);

return back();

}

public function export($id)
{

$chat = Chat::find($id);

$pdf = Pdf::loadView('pdf',compact('chat'));

return $pdf->download('resposta.pdf');

}
}