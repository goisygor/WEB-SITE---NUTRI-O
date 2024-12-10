@extends('layouts.app')

@section('content')

<!-- Incluindo o arquivo CSS -->
<link rel="stylesheet" href="{{ asset('css/consulta.css') }}">

<header>
    <div class="logo-container">
        <img src="{{ asset('imgs/logo.jpg') }}" alt="" class="logo-img">
        <div class="logo-text">Clínica Bem Viver</div>
    </div>
    <!-- Exibe o nome do usuário abaixo do logo -->
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
                <button type="submit" class="btn btn-danger login-button">Logout</button>
            </form>
        @endif
    </nav>
</header>

<div class="consultas-section">
    <div class="consultas-header">
        <h2>Minhas Consultas</h2>
        <a class="btn btn-success" href="{{ route('consultas.create') }}">Inserir Nova Consulta</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($consultas->isNotEmpty())
        <div class="consultas-cards">
            @foreach ($consultas as $consulta)
                <div class="consultas-card">
                    <h3>{{ $consulta->paciente_nome }}</h3>
                    <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($consulta->data)->format('d/m/Y') }}</p>
                    <p><strong>Hora:</strong> {{ \Carbon\Carbon::parse($consulta->hora)->format('H:i') }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($consulta->status) }}</p>

                    @if(Auth::user()->tipo_usuario === 'cliente' && $consulta->status === 'cancelado')
                        <div class="motivo-cancelamento" style="background-color: #00BFAE; border: 1px solid #ffffff; padding: 15px; border-radius: 8px; margin-top: 10px;">
                            <strong style="color: #ffffff;">Motivo do Cancelamento:</strong>
                            <p>
                                @if($consulta->motivo_cancelamento)
                                    {{ $consulta->motivo_cancelamento }}
                                @else
                                    Para mais detalhes, entre em contato:
                                    <a href="https://wa.me/1234567890" target="_blank" style="color: #ffffff; font-weight: bold;">WhatsApp: +55 12 3456-7890</a>
                                @endif
                            </p>
                        </div>
                    @endif

                    <div>
                        <a class="btn btn-primary" href="{{ route('consultas.edit', $consulta->id) }}">Editar</a>
                        <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Você tem certeza que deseja deletar esta consulta?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            <p>Não há consultas agendadas.</p>
        </div>
    @endif
</div>

@endsection
