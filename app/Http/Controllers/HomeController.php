<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Livro;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $generoId = $request->get('genero'); // Obtém o parâmetro 'genero' da requisição
        $data = [];

        // Se um gênero foi passado, filtra os livros por esse gênero
        if ($generoId) {
            $listaLivro = Livro::where('status', '!=', 0)
                ->whereHas('generos', function ($query) use ($generoId) {
                    $query->where('generos.id', $generoId);
                })
                ->get();
        } else {
            // Caso contrário, pega todos os livros com status diferente de 0
            $listaLivro = Livro::where('status', '!=', 0)->get();
        }

        // Obtém todos os gêneros com status diferente de 0
        $listaGenero = Genero::where('status', '!=', 0)->get();

        // Adiciona os resultados às variáveis para a view
        $data['lista'] = $listaLivro;
        $data['listagenero'] = $listaGenero;

        return view('home', $data);
    }
}
