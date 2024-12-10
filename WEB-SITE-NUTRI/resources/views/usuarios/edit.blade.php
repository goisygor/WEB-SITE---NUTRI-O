@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Consulta</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('consultas.update', $consulta->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="paciente_nome">Nome do Paciente</label>
            <input type="text" class="form-control" id="paciente_nome" name="paciente_nome" value="{{ old('paciente_nome', $consulta->paciente_nome) }}" required>
        </div>

        <div class="form-group">
            <label for="data">Data</label>
            <input type="date" class="form-control" id="data" name="data" value="{{ old('data', $consulta->data) }}" required>
        </div>

        <div class="form-group">
            <label for="hora">Hora</label>
            <input type="time" class="form-control" id="hora" name="hora" value="{{ old('hora', $consulta->hora) }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required onchange="toggleMotivoCancelamento(this.value)">
                <option value="agendado" {{ old('status', $consulta->status) == 'agendado' ? 'selected' : '' }}>Agendado</option>
                <option value="realizado" {{ old('status', $consulta->status) == 'realizado' ? 'selected' : '' }}>Realizado</option>
                <option value="cancelado" {{ old('status', $consulta->status) == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>

        <div id="motivo-cancelamento-container" class="form-group" style="display: none;">
            <label for="motivo_cancelamento">Motivo do Cancelamento</label>
            <select class="form-control" id="motivo_cancelamento" name="motivo_cancelamento">
                <option value="Paciente não compareceu" {{ old('motivo_cancelamento') == 'Paciente não compareceu' ? 'selected' : '' }}>Paciente não compareceu</option>
                <option value="Consulta remcarada" {{ old('motivo_cancelamento') == 'Consulta remarcada' ? 'selected' : '' }}>Consulta remarcada</option>
                <option value="Erro administrativo" {{ old('motivo_cancelamento') == 'Erro administrativo' ? 'selected' : '' }}>Erro administrativo</option>
                <option value="Solicitação do paciente" {{ old('motivo_cancelamento') == 'Solicitação do paciente' ? 'selected' : '' }}>Solicitação do paciente</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Salvar Consulta</button>
        <a href="{{ route('consultas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </form>
</div>

<script>
    function toggleMotivoCancelamento(status) {
        const motivoContainer = document.getElementById('motivo-cancelamento-container');
        motivoContainer.style.display = status === 'cancelado' ? 'block' : 'none';
    }

    // Inicializa ao carregar a página
    document.addEventListener('DOMContentLoaded', function () {
        toggleMotivoCancelamento(document.getElementById('status').value);
    });
</script>

<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .container {
        max-width: 700px;
        margin: 20px auto;
        background: #ffffff;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    h1 {
        color: #00BFAE;
        text-align: center;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .form-control, .form-select {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        transition: all 0.3s ease-in-out;
    }

    .form-control:focus, .form-select:focus {
        border-color: #00BFAE;
        box-shadow: 0 0 8px rgba(0, 191, 174, 0.5);
    }

    button {
        background-color: #00BFAE;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    button:hover {
        background-color: #009e91;
        transform: scale(1.05);
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .alert {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 4px;
        padding: 10px;
        margin-bottom: 15px;
    }
</style>
@endsection
