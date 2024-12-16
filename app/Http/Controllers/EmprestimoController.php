<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class EmprestimoController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        // Obtém lista de todos os livros com statusEmprestimo diferente de 0
        $listaLivro = Livro::where('statusEmprestimo', '==', 0)->get();
        $data['lista'] = $listaLivro;

        // Obtém lista de todos os usuarios com status diferente de 0
        $listaUsuario = Usuario::where('status', '!=', 0)->get();
        $data['listauser'] = $listaUsuario;

        $listaLivroEmprestado = Livro::where('statusEmprestimo', '!=', 0)->get();
        $data['listaemprestados'] = $listaLivroEmprestado;

        $emprestimos = Emprestimo::with(['livro', 'usuario'])
            ->whereNull('dataDevolvido')
            ->orderByDesc('dataPrazo') // Correção aqui
            ->paginate(2);
        $data['emprestimos'] = $emprestimos;

        return view('emprestimo', $data);
    }

    public function adicionaEmprestimo(Request $request)
    {
        // Validação inicial dos dados
        $request->validate([
            'livro_id' => 'required|integer|exists:livros,id',
        ]);

        try {
            // Inicia a transação
            DB::beginTransaction();

            // Cria o empréstimo
            $values = $request->all();
            $dias = (int) $values['dias'];
            $values['dataDevolvido'] = null;
            $values['dataPrazo'] = now()->addDays($dias);

            $emprestimo = Emprestimo::create($values);

            // Busca o livro e altera o status
            $livro = Livro::find($request->livro_id);

            if (!$livro) {
                throw new \Exception('Livro não encontrado.');
            }

            $livro->statusEmprestimo = true; // Marca como desativado
            $livro->save();

            // Confirma a transação
            DB::commit();

            return redirect()->route('emprestimo')->with('sucesso', 'Empréstimo cadastrado e livro desativado com sucesso.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro: ' . $e->getMessage());
            return redirect()->route('livro')->with('error', 'Erro ao processar o empréstimo: ' . $e->getMessage());
        }
    }

    public function recebeEmprestimo(Request $request)
    {
        // Validação inicial dos dados
        $request->validate([
            'livro_id' => 'required|integer|exists:livros,id',
        ]);

        try {
            // Inicia a transação
            DB::beginTransaction();

            // Busca o último empréstimo do livro com dataDevolvido null
            $emprestimo = Emprestimo::where('livro_id', $request->livro_id)
                ->whereNull('dataDevolvido')
                ->latest() // Ordena pelo mais recente
                ->first();

            if (!$emprestimo) {
                throw new \Exception('Nenhum empréstimo pendente encontrado para este livro.');
            }

            // Atualiza o registro do empréstimo com a data atual
            $emprestimo->dataDevolvido = now();
            $emprestimo->save();

            // Atualiza o status do livro para disponível
            $livro = Livro::find($request->livro_id);
            $livro->statusEmprestimo = false; // Marca como disponível
            $livro->save();

            // Confirma a transação
            DB::commit();

            return redirect()->route('emprestimo')->with('sucesso', 'Livro recebido com sucesso e disponibilidade atualizada.');
        } catch (\Exception $e) {
            // Reverte a transação em caso de erro
            DB::rollBack();
            return redirect()->route('livro')->with('error', 'Erro ao processar a devolução do livro: ' . $e->getMessage());
        }
    }
}
