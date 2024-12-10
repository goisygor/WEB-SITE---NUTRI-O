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

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #00BFAE;
        color: white;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo-container {
        display: flex;
        align-items: center;
    }

    .logo-img {
        height: 50px;
        margin-right: 15px;
    }

    .logo-text {
        font-size: 24px;
        font-weight: bold;
    }

    nav {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    nav a {
        color: white;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s;
    }

    nav a:hover {
        color: #ffffffcc;
    }

    .dropdown {
        position: relative;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-content a {
        display: block;
        padding: 10px 15px;
        color: #333;
        text-decoration: none;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .dropdown-content a:hover {
        background-color: #f0f0f0;
    }

    .container {
        max-width: 600px;
        margin: 30px auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #00BFAE;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #00BFAE;
        box-shadow: 0 0 5px rgba(0, 191, 174, 0.5);
    }

    .btn {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #00BFAE;
        color: white;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn:hover {
        background-color: #009e91;
        transform: scale(1.05);
    }

    .user-greeting h3, .user-greeting h4 {
        margin: 0;
    }

    .login-button {
        background-color: transparent;
        color: white;
        border: 1px solid white;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .login-button:hover {
        background-color: white;
        color: #00BFAE;
    }
</style>
@endsection
