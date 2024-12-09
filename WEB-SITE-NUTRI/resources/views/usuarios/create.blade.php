@extends('layouts.app')

@section('content')
<header>
    <div class="logo-container">
        <img src="{{ asset('imgs/logo.jpg') }}" alt="" class="logo-img">
        <div class="logo-text">Clínica Bem Viver</div>
    </div>
    @if (Auth::check())
        <div class="user-greeting">
            <h3>Olá, {{ Auth::user()->name }}</h3>
            <h4>{{ Auth::user()->tipo_usuario }}</h4>
        </div>
    @endif
    <nav>
        <a href="sobre-nos">Sobre Nós</a>
        <div class="dropdown">
            <a href="#servicos">Serviços</a>
            <div class="dropdown-content">
                <a href="{{ route('agendamento.index') }}">Agendamento Online</a>
                <a href="#medicos">Nossa Equipe</a>
                <a href="#planos">Planos de Atendimento</a>
                <a href="#avaliacao">Avaliações Nutricionais</a>
                <a href="{{ route('consultas.index') }}">Minhas Consultas</a>
            </div>
        </div>
        @if (Auth::check())
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="login-button">Logout</button>
            </form>
        @endif
    </nav>
</header>

<div class="container">
    <h1>Agendar Consulta</h1>

    <form action="{{ route('consultas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="paciente_nome">Nome do Paciente:</label>
            <input type="text" name="paciente_nome" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" name="data" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="hora">Hora:</label>
            <input type="time" name="hora" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                <option value="agendada">Agendada</option>
                <option value="confirmada">Confirmada</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Agendar</button>
    </form>
</div>
@endsection