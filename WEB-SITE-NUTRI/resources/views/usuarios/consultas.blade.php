@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Minha Nutrição - Home</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <!-- Cabeçalho -->
    <header>
        <div class="logo-container">
            <img src="{{ asset('imgs/logo.jpg') }}" alt="" class="logo-img">
            <div class="logo-text">Clínica Bem Viver</div>
        </div>
        <nav>
            <a href="{{ route('sobre-nos') }}">Sobre Nós</a>
            <!-- Dropdown para Serviços -->
            <div class="dropdown">
                <a href="#servicos">Serviços</a>
                <div class="dropdown-content">
                    <a href="#medicos">Nossa Equipe</a>
                    <a href="#avaliacao">Avaliações Nutricionais</a>
                </div>
            </div>
            <!-- Dropdown para Agendamento -->
            <div class="dropdown">
                <a href="#agendamento">Agendamento Online</a>
                <div class="dropdown-content">
                    <a href="{{ route('agendamento.blade.php') }}">Agendar Consulta</a>
                </div>
            </div>
            <!-- Sempre exibe o botão de Logout se o usuário estiver autenticado -->
            @if (Auth::check())
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="login-button">Logout</button>
                </form>
            @endif
        </nav>
    </header>

    <!-- Conteúdo Principal -->
    <div class="container">
        <h1 class="my-4">Minhas Consultas</h1>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a class="btn btn-success mb-2" href="{{ route('consultas.create') }}"> Inserir Nova Consulta</a>

        <!-- Tabela de Consultas -->
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
                <td>{{ $consulta->status }}</td>
                <td>
                    <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('consultas.edit', $consulta->id) }}">Editar</a>
                        
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <!-- Rodapé -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Clínica Bem Viver</h3>
                <p>&copy; 2024 Todos os direitos reservados.</p>
            </div>

            <div class="footer-section">
                <h4>Horário de Funcionamento</h4>
                <p>Segunda a Sexta: 8h - 18h</p>
                <p>Sábado: 8h - 14h</p>
                <p>Domingo: Fechado</p>
            </div>

            <div class="footer-section">
                <h4>Endereço</h4>
                <p>Rua Exemplo, 123, Centro - Cidade, Estado</p>
            </div>

            <div class="footer-section">
                <h4>Contato</h4>
                <p><a href="https://wa.me/1234567890" target="_blank">WhatsApp: +55 12 3456-7890</a></p>
                <p><a href="https://wa.me/9876543210" target="_blank">WhatsApp: +55 98 7654-3210</a></p>
            </div>

            <div class="footer-social">
                <a href="https://www.facebook.com/" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="https://x.com/?lang=pt-br" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com/" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>
@endsection
