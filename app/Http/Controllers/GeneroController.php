<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index(Request $request)
    {
        $data = [];

        // Obtém lista de todos os generos com status diferente de 0
        $listaGenero = Genero::where('status', '!=', 0)->get();
        $data['lista'] = $listaGenero;

        $listaGeneroDesativados = Genero::where('status', '==', 0)->get();
        $data['listadesativados'] = $listaGeneroDesativados;

        return view('genero', $data);
    }

    public function adicionaGenero(Request $request)
    {
        $values = $request->all();
        $values['status'] = true;

        $generos = Genero::create($values);
        return redirect()->route('genero')->with('sucesso', 'Genero Cadastrada');
    }

    public function desativaGenero(Request $request)
    {
        // Valida se o parâmetro 'genero' foi enviado e é um número válido
        $request->validate([
            'genero' => 'required|integer|exists:generos,id',
        ]);

        try {
            // Busca o genero pelo ID
            $genero = Genero::find($request->genero);

            if ($genero) {
                // Altera o status do genero para desativado
                $genero->status = false;
                $genero->save();

                // Retorna com mensagem de sucesso
                return redirect()->route('genero')->with('sucesso', 'Genero desativado com sucesso.');
            }

            // Caso o Genero não seja encontrado
            return redirect()->route('genero')->with('error', 'genero não encontrado.');
        } catch (\Exception $e) {
            // Captura qualquer exceção e retorna mensagem de erro
            return redirect()->route('genero')->with('error', 'Erro ao desativar o genero: ' . $e->getMessage());
        }
    }

    public function ativaGenero(Request $request)
    {
        // Valida se o parâmetro 'genero' foi enviado e é um número válido
        $request->validate([
            'genero' => 'required|integer|exists:generos,id',
        ]);

        try {
            // Busca o genero pelo ID
            $genero = Genero::find($request->genero);

            if ($genero) {
                // Altera o status do genero para desativado
                $genero->status = true;
                $genero->save();

                // Retorna com mensagem de sucesso
                return redirect()->route('genero')->with('sucesso', 'genero desativado com sucesso.');
            }

            // Caso o genero não seja encontrado
            return redirect()->route('genero')->with('error', 'genero não encontrado.');
        } catch (\Exception $e) {
            // Captura qualquer exceção e retorna mensagem de erro
            return redirect()->route('genero')->with('error', 'Erro ao desativar o genero: ' . $e->getMessage());
        }
    }

    public function editaGenero(Request $request)
    {
        // Valida se o parâmetro 'genero' foi enviado e é um número válido
        $request->validate([
            'genero' => 'required|integer|exists:generos,id',
        ]);

        try {
            // Busca o genero pelo ID
            $genero = Genero::find($request->genero);

            if ($genero) {
                // Atualiza nome se foi informado
                if ($request->nome != '') {
                    $genero->nome = $request->nome;
                    // Salva as alterações no genero
                    $genero->save();
                }
                // Retorna com mensagem de sucesso
                return redirect()->route('genero')->with('sucesso', 'genero atualizado com sucesso.');
            }

            // Caso o genero não seja encontrado
            return redirect()->route('genero')->with('error', 'genero não encontrado.');
        } catch (\Exception $e) {
            // Captura qualquer exceção e retorna mensagem de erro
            return redirect()->route('genero')->with('error', 'Erro ao atualizar o genero: ' . $e->getMessage());
        }
    }
}
