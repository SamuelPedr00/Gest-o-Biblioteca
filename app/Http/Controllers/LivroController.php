<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index(Request $request)
    {
        $data = [];

        // Obtém lista de todos os livros com status diferente de 0
        $listaLivro = Livro::where('status', '!=', 0)->get();
        $data['lista'] = $listaLivro;

        // Obtém lista de todos os generos com status diferente de 0
        $listaGenero = Genero::where('status', '!=', 0)->get();
        $data['listagenero'] = $listaGenero;

        $listaLivroDesativados = Livro::where('status', '==', 0)->get();
        $data['listadesativados'] = $listaLivroDesativados;

        return view('livro', $data);
    }

    public function adicionaLivro(Request $request)
    {
        $values = $request->all();
        $values['statusEmprestimo'] = false;
        $values['status'] = true;

        $livros = Livro::create($values);
        return redirect()->route('livro')->with('sucesso', 'Livro Cadastrada');
    }

    public function desativaLivro(Request $request)
    {
        // Valida se o parâmetro 'livro' foi enviado e é um número válido
        $request->validate([
            'livro' => 'required|integer|exists:livros,id',
        ]);

        try {
            // Busca o livro pelo ID
            $livro = Livro::find($request->livro);

            if ($livro) {
                // Altera o status do livro para desativado
                $livro->status = false;
                $livro->save();

                // Retorna com mensagem de sucesso
                return redirect()->route('livro')->with('sucesso', 'Livro desativado com sucesso.');
            }

            // Caso o Livro não seja encontrado
            return redirect()->route('livro')->with('error', 'Livro não encontrado.');
        } catch (\Exception $e) {
            // Captura qualquer exceção e retorna mensagem de erro
            return redirect()->route('livro')->with('error', 'Erro ao desativar o Livro: ' . $e->getMessage());
        }
    }

    public function ativaLivro(Request $request)
    {
        // Valida se o parâmetro 'livro' foi enviado e é um número válido
        $request->validate([
            'livro' => 'required|integer|exists:livros,id',
        ]);

        try {
            // Busca o Livro pelo ID
            $livro = Livro::find($request->livro);

            if ($livro) {
                // Altera o status do Livro para desativado
                $livro->status = true;
                $livro->save();

                // Retorna com mensagem de sucesso
                return redirect()->route('livro')->with('sucesso', 'Livro desativado com sucesso.');
            }

            // Caso o Livro não seja encontrado
            return redirect()->route('livro')->with('error', 'Livro não encontrado.');
        } catch (\Exception $e) {
            // Captura qualquer exceção e retorna mensagem de erro
            return redirect()->route('livro')->with('error', 'Erro ao desativar o Livro: ' . $e->getMessage());
        }
    }

    public function editaLivro(Request $request)
    {
        // Valida se o parâmetro 'livro' foi enviado e é um número válido
        $request->validate([
            'livro' => 'required|integer|exists:livros,id',
        ]);

        try {
            // Busca o Livro pelo ID
            $livro = Livro::find($request->livro);

            if ($livro) {
                // Atualiza nome se foi informado
                if ($request->nome != '') {
                    $livro->nome = $request->nome;
                }
                // Atualiza autor se foi informado
                if ($request->autor != '') {
                    $livro->autor = $request->autor;
                }
                // Atualiza sinopse se foi informado
                if ($request->sinopse != '') {
                    $livro->sinopse = $request->sinopse;
                }

                // Salva as alterações no Livro
                $livro->save();

                // Retorna com mensagem de sucesso
                return redirect()->route('livro')->with('sucesso', 'Livro atualizado com sucesso.');
            }

            // Caso o Livro não seja encontrado
            return redirect()->route('livro')->with('error', 'Livro não encontrado.');
        } catch (\Exception $e) {
            // Captura qualquer exceção e retorna mensagem de erro
            return redirect()->route('livro')->with('error', 'Erro ao atualizar o Livro: ' . $e->getMessage());
        }
    }
}
