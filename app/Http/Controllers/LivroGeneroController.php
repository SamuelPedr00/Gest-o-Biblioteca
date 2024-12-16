<?php

namespace App\Http\Controllers;

use App\Models\LivroGenero;
use Illuminate\Http\Request;

class LivroGeneroController extends Controller
{
    public function adicionaGeneroLivro(Request $request)
    {
        $values = $request->all();

        // Verificar se a relação já existe
        $existeRelacao = LivroGenero::where('livro_id', $values['livro_id'])
            ->where('genero_id', $values['genero_id'])
            ->exists();

        if ($existeRelacao) {
            // Se a relação já existir, retornar um aviso
            return redirect()->route('livro')->with('aviso', 'Este gênero já está cadastrado para este livro.');
        }

        // Caso contrário, criar a nova relação
        LivroGenero::create($values);

        // Redirecionar com sucesso
        return redirect()->route('livro')->with('sucesso', 'Gênero adicionado ao livro com sucesso.');
    }


    public function removeGeneroLivro(Request $request)
    {
        $values = $request->all();

        // Verificar se a relação existe antes de tentar deletar
        $relacao = LivroGenero::where('livro_id', $values['livro_id'])
            ->where('genero_id', $values['genero_id'])
            ->first();

        if (!$relacao) {
            // Se a relação não existir, retornar um aviso
            return redirect()->route('livro')->with('aviso', 'Esse Genero não está adicionado a esse Livro');
        }

        // Deletar a relação
        $relacao->delete();

        // Redirecionar com sucesso
        return redirect()->route('livro')->with('sucesso', 'Gênero removido do livro com sucesso.');
    }
}
