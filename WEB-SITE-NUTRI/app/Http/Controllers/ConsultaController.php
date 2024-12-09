<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\MotivoCancelamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultaController extends Controller
{
    public function index()
    {
        if (Auth::user()->tipo_usuario === 'administrador') {
            $consultas = Consulta::all();
        } else {
            $consultas = Consulta::where('user_id', auth()->id())->get();
        }

        return view('usuarios.consultas', compact('consultas'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente_nome' => 'required|string|max:255',
            'data' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'status' => 'required|string|max:255',
        ]);

        $consultaExistente = Consulta::where('data', $request->data)
            ->where('hora', $request->hora)
            ->first();

        if ($consultaExistente) {
            return redirect()->back()->with('error', 'O horário já está ocupado.');
        }

        Consulta::create([
            'user_id' => auth()->id(),
            'paciente_nome' => $request->paciente_nome,
            'data' => $request->data,
            'hora' => $request->hora,
            'status' => $request->status,
            'motivo_cancelamento_id' => null,
        ]);

        return redirect()->route('consultas.index')->with('success', 'Consulta criada com sucesso!');
    }

    public function edit($id)
    {
        $consulta = Consulta::findOrFail($id);

        if (Auth::user()->tipo_usuario !== 'administrador' && $consulta->user_id !== Auth::id()) {
            return redirect()->route('consultas.index')->with('error', 'Você não tem permissão para editar esta consulta.');
        }

        $motivosCancelamento = MotivoCancelamento::all();

        return view('usuarios.edit', compact('consulta', 'motivosCancelamento'));
    }

    public function update(Request $request, $id)
    {
        $consulta = Consulta::findOrFail($id);

        if (Auth::user()->tipo_usuario !== 'administrador' && $consulta->user_id !== Auth::id()) {
            return redirect()->route('consultas.index')->with('error', 'Você não tem permissão para editar esta consulta.');
        }

        $request->validate([
            'status' => 'required|string|max:255',
            'motivo_cancelamento_id' => 'nullable|exists:motivos_cancelamento,id',
        ]);

        $consulta->update([
            'paciente_nome' => $request->paciente_nome,
            'data' => $request->data,
            'hora' => $request->hora,
            'status' => $request->status,
            'motivo_cancelamento_id' => $request->status === 'cancelado' ? $request->motivo_cancelamento_id : null,
        ]);

        return redirect()->route('consultas.index')->with('success', 'Consulta atualizada com sucesso!');
    }

    public function destroy($id)
    {
        if (Auth::user()->tipo_usuario !== 'administrador') {
            return redirect()->route('consultas.index')->with('error', 'Você não tem permissão para deletar consultas.');
        }

        $consulta = Consulta::findOrFail($id);
        $consulta->delete();

        return redirect()->route('consultas.index')->with('success', 'Consulta deletada com sucesso!');
    }
}
