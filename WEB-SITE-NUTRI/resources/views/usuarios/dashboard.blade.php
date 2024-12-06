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
        <!-- Exibe o nome do usuário abaixo do logo -->
        @if (Auth::check())
            <div class="user-greeting">
                <h3>Olá, {{ Auth::user()->name }}</h3>
                <h4>{{ Auth::user()->tipo_usuario }}</h4>
            </div>
        @endif
        <nav>
            <a href="sobre-nos">Sobre Nós</a>
            <!-- Dropdown para Serviços -->
            <div class="dropdown">
                <a href="#servicos">Serviços</a>
                <div class="dropdown-content">
                    <!-- Link de Agendamento Online modificado -->
                    <a href="{{ route('agendamento.index') }}">Agendamento Online</a>
                    <a href="#medicos">Nossa Equipe</a>
                    <a href="#planos">Planos de Atendimento</a>
                    <a href="#avaliacao">Avaliações Nutricionais</a>
                    <!-- Link para Minhas Consultas -->
                    <a href="{{ route('consultas.index') }}">Minhas Consultas</a>
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
        <!-- Seção de Cards -->
        <div class="card-container">
            <div class="card">
                <img src="{{ asset('imgs/card2.jpg') }}" alt="Nutricionista">
                <h3>Consultas Nutricionais</h3>
                <p>Agende sua consulta com um profissional especializado.</p>
                <a href="#agendamento" class="button">Saiba Mais</a>
            </div>
            <div class="card">
                <img src="{{ asset('imgs/card1.jpg') }}" alt="Receitas">
                <h3>Receitas Saudáveis</h3>
                <p>Explore diversas receitas para uma vida saudável.</p>
                <a href="https://www.receiteria.com.br/receitas-fit/" class="button">Explorar</a>
            </div>
            <div class="card">
                <img src="{{ asset('imgs/card3.jpg') }}" alt="Dicas">
                <h3>Dicas de Nutrição</h3>
                <p>Acompanhe as melhores dicas para seu bem-estar.</p>
                <a href="https://especialmed.com/blog/6-dicas-de-alimentacao/" class="button">Ver Dicas</a>
            </div>
        </div>
    </div>
    <!-- Conteúdo Principal -->
    <div class="container">
        <!-- Seção de Cards -->
        <div class="card-container">
            <div class="card">
                <img src="{{ asset('imgs/card4.jpg') }}" alt="Nutricionista">
                <h3>Cálculos on-line</h3>
                <p>Descubra como está a sua saúde com apenas alguns cliques! Utilize nossa ferramenta para calcular o IMC (Índice de Massa Corporal) e tenha um ponto de partida para entender melhor o equilíbrio do seu corpo.</p>
                <a href="" class="button">Saiba Mais</a>
            </div>
            <div class="card">  
                <img src="{{ asset('imgs/card5.jpg') }}" alt="Receitas">
                <h3>Curiosidades</h3>
                <p>Descubra Curiosidades Incríveis!
                    Sabia que o mundo está cheio de fatos surpreendentes que podem te deixar de queixo caído? Queremos compartilhar conhecimento e despertar sua curiosidade!</p>
                <a href="#receitas" class="button">Explorar</a>
            </div>
            <div class="card">
                <img src="{{ asset('imgs/card6.jpg') }}" alt="Dicas">
                <h3>O impacto do IMC na sua Saúde</h3>
                <p>Você sabia que o IMC (Índice de Massa Corporal) vai além de um simples número? Ele pode revelar muito sobre o seu bem-estar físico e até mental. Descubra como esse cálculo simples influencia sua saúde.</p>
                <a href="" class="button">Ver Dicas</a>
            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <!-- <footer class="footer">
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
    </footer> -->
</body>
</html>

@endsection
