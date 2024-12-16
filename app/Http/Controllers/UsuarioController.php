<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $data = [];

        // Obtém lista de todos os usuarios com status diferente de 0
        $listaUsuario = Usuario::where('status', '!=', 0)->get();
        $data['lista'] = $listaUsuario;

        $listaUsuarioDesativados = Usuario::where('status', '==', 0)->get();
        $data['listadesativados'] = $listaUsuarioDesativados;

        return view('usuario', $data);
    }

    public function adicionaUsuario(Request $request)
    {
        $values = $request->all();
        $values['status'] = true;

        $usuarios = Usuario::create($values);
        return redirect()->route('usuario')->with('sucesso', 'Usuario Cadastrada');
    }

    public function desativaUsuario(Request $request)
    {
        // Valida se o parâmetro 'usuario' foi enviado e é um número válido
        $request->validate([
            'usuario' => 'required|integer|exists:usuarios,id',
        ]);

        try {
            // Busca o usuário pelo ID
            $usuario = Usuario::find($request->usuario);

            if ($usuario) {
                // Altera o status do usuário para desativado
                $usuario->status = false;
                $usuario->save();

                // Retorna com mensagem de sucesso
                return redirect()->route('usuario')->with('sucesso', 'Usuário desativado com sucesso.');
            }

            // Caso o usuário não seja encontrado
            return redirect()->route('usuario')->with('error', 'Usuário não encontrado.');
        } catch (\Exception $e) {
            // Captura qualquer exceção e retorna mensagem de erro
            return redirect()->route('usuario')->with('error', 'Erro ao desativar o usuário: ' . $e->getMessage());
        }
    }

    public function ativaUsuario(Request $request)
    {
        // Valida se o parâmetro 'usuario' foi enviado e é um número válido
        $request->validate([
            'usuario' => 'required|integer|exists:usuarios,id',
        ]);

        try {
            // Busca o usuário pelo ID
            $usuario = Usuario::find($request->usuario);

            if ($usuario) {
                // Altera o status do usuário para ativado
                $usuario->status = true;
                $usuario->save();

                // Retorna com mensagem de sucesso
                return redirect()->route('usuario')->with('sucesso', 'Usuário Ativado com sucesso.');
            }

            // Caso o usuário não seja encontrado
            return redirect()->route('usuario')->with('error', 'Usuário não encontrado.');
        } catch (\Exception $e) {
            // Captura qualquer exceção e retorna mensagem de erro
            return redirect()->route('usuario')->with('error', 'Erro ao desativar o usuário: ' . $e->getMessage());
        }
    }

    public function editaUsuario(Request $request)
    {
        // Valida se o parâmetro 'usuario' foi enviado e é um número válido
        $request->validate([
            'usuario' => 'required|integer|exists:usuarios,id',
        ]);

        try {
            // Busca o usuário pelo ID
            $usuario = Usuario::find($request->usuario);

            if ($usuario) {
                // Atualiza nome se foi informado
                if ($request->nome != '') {
                    $usuario->nome = $request->nome;
                }
                // Atualiza email se foi informado
                if ($request->email != '') {
                    $usuario->email = $request->email;
                }

                // Salva as alterações no usuário
                $usuario->save();

                // Retorna com mensagem de sucesso
                return redirect()->route('usuario')->with('sucesso', 'Usuário atualizado com sucesso.');
            }

            // Caso o usuário não seja encontrado
            return redirect()->route('usuario')->with('error', 'Usuário não encontrado.');
        } catch (\Exception $e) {
            // Captura qualquer exceção e retorna mensagem de erro
            return redirect()->route('usuario')->with('error', 'Erro ao atualizar o usuário: ' . $e->getMessage());
        }
    }
}
