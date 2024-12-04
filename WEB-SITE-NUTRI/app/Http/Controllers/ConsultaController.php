<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    // Método para listar as consultas
    public function index()
    {
        // Recupera todas as consultas do banco de dados
        $consultas = Consulta::all();

        // Retorna a visualização com as consultas
        return view('consultas.index', compact('consultas'));
    }

    // Método para mostrar o formulário de criação
    public function create()
    {
        return view('consultas.create');
    }

    // Método para editar uma consulta
    public function edit($id)
    {
        $consulta = Consulta::findOrFail($id);
        return view('consultas.edit', compact('consulta'));
    }

    // Método para deletar uma consulta
    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();

        return redirect()->route('consultas.index')->with('success', 'Consulta deletada com sucesso!');
    }
}
