<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedacaoController extends Controller
{
    //
}
$response = OpenAI::chat()->create([
    'model' => 'gpt-4.1-mini',
    'messages' => [
        [
            'role' => 'system',
            'content' => 'Você é um corretor de redações estilo ENEM.'
        ],
        [
            'role' => 'user',
            'content' => $texto
        ]
    ],
]);
