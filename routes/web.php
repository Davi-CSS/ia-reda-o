<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::match(['get','post'],'/', function (Request $request) {

    $resultado = null;

    if ($request->isMethod('post')) {

        $texto = $request->redacao;

        $palavras = str_word_count($texto);

        // notas simuladas
        $c1 = rand(120,200);
        $c2 = rand(120,200);
        $c3 = rand(120,200);
        $c4 = rand(120,200);
        $c5 = rand(120,200);

        $notaFinal = $c1 + $c2 + $c3 + $c4 + $c5;

        $resultado = [
            "palavras"=>$palavras,
            "c1"=>$c1,
            "c2"=>$c2,
            "c3"=>$c3,
            "c4"=>$c4,
            "c5"=>$c5,
            "total"=>$notaFinal
        ];
    }

    return view('app',[
        "resultado"=>$resultado
    ]);

});
Route::get('/settings/appearance', function () {
    return Inertia::render('settings/Appearance');
})->name('appearance.edit');