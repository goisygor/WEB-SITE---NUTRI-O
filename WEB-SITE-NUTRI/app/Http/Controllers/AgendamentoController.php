<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;

class AgendamentoController extends Controller
{
    // Exibe o formulário de agendamento
    public function index()
    {
        return view('usuarios.agendamento'); // Caminho correto da view
    }

    // Salva os dados no banco
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'idade' => 'required|integer|min:0',
            'peso' => 'required|numeric|min:0',
            'altura' => 'required|numeric|min:0',
            'tipo_documento' => 'required|string|max:50',
            'documento' => 'required|string|max:50|unique:agendamentos,documento', // Verifica se o documento já existe
            'endereco' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'convenio' => 'nullable|string|max:255',
            'plano' => 'nullable|string|max:255',
            'modalidade_exame' => 'required|string|max:255',
            'exame' => 'required|string|max:255',
            'medico' => 'required|string|max:255',
        ]);

        // Criação do agendamento no banco de dados
        Agendamento::create($request->all()); // Salva todos os dados no banco

        // Redireciona de volta com uma mensagem de sucesso
        return redirect()->route('agendamento.index')->with('success', 'Agendamento realizado com sucesso!');
    }
}
