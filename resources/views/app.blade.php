<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<title>Corretor ENEM IA</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-slate-950 text-white min-h-screen flex justify-center items-center">

<div class="w-full max-w-4xl p-8 bg-slate-900 rounded-xl shadow-xl">

<h1 class="text-3xl font-bold text-center mb-6">
📚 Corretor de Redação ENEM
</h1>

<form method="POST">

@csrf

<textarea
id="redacao"
name="redacao"
rows="10"
placeholder="Escreva sua redação aqui..."
class="w-full p-4 bg-slate-800 border border-slate-700 rounded resize-none"
></textarea>

<p class="text-sm text-gray-400 mt-2">
Palavras: <span id="contador">0</span>
</p>

<button
class="mt-4 w-full bg-purple-600 hover:bg-purple-700 p-3 rounded font-semibold"
>
Corrigir redação
</button>

</form>

@if(isset($resultado))

<div class="mt-8 bg-slate-800 p-6 rounded">

<h2 class="text-xl font-bold mb-4">
Resultado da correção
</h2>

<p>Palavras: {{ $resultado['palavras'] }}</p>

<div class="grid grid-cols-2 gap-4 mt-4">

<p>Competência 1: {{ $resultado['c1'] }}</p>
<p>Competência 2: {{ $resultado['c2'] }}</p>
<p>Competência 3: {{ $resultado['c3'] }}</p>
<p>Competência 4: {{ $resultado['c4'] }}</p>
<p>Competência 5: {{ $resultado['c5'] }}</p>

</div>

<h3 class="text-2xl font-bold text-purple-400 mt-6">
Nota final: {{ $resultado['total'] }}
</h3>

</div>

@endif

</div>

<script>

const textarea = document.getElementById("redacao");
const contador = document.getElementById("contador");

textarea.addEventListener("input", () => {

let palavras = textarea.value.trim().split(/\s+/);

if(textarea.value.trim() === ""){
contador.innerText = 0;
}else{
contador.innerText = palavras.length;
}

});

</script>

</body>
</html>