@extends('layouts.app')

@section('content')
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
                <button type="submit" class="login-button">Logout</button>
            </form>
        @endif
    </nav>
</header>

<div class="container">
    <h1 class="my-4">Minhas Consultas</h1>

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

    <a class="btn btn-success mb-3" href="{{ route('consultas.create') }}">Inserir Nova Consulta</a>

    @if ($consultas->isNotEmpty())
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nome do Paciente</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Status</th>
                <th width="280px">Ação</th>
            </tr>
            
            @foreach ($consultas as $consulta)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $consulta->paciente_nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($consulta->data)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($consulta->hora)->format('H:i') }}</td>
                    <td>{{ ucfirst($consulta->status) }}</td>
                    <td>
                        <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja deletar esta consulta?');">
                            <a class="btn btn-primary" href="{{ route('consultas.edit', $consulta->id) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
                
                @if(Auth::user()->tipo_usuario === 'cliente' && $consulta->status === 'cancelado')
                    <tr>
                        <td colspan="6">
                            @if($consulta->motivo_cancelamento)
                                <div class="alert alert-warning">
                                    <strong>Motivo do Cancelamento:</strong> {{ $consulta->motivo_cancelamento }}
                                </div>
                            @else
                                <div class="alert alert-info">
                                    <strong>Motivo do Cancelamento:</strong> Não informado.
                                </div>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    @else
        <div class="alert alert-info">
            <p>Não há consultas agendadas.</p>
        </div>
    @endif
</div>

@endsection
