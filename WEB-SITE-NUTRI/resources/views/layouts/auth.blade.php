<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>@yield('title', 'Clínica Bem Viver')</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @stack('styles') <!-- Estilos específicos para login ou registro -->
</head>
<body>
    <!-- Cabeçalho -->
    <header>
        <div class="logo-container">
            <img src="{{ asset('imgs/logo.jpg') }}" alt="Logo" class="logo-img">
            <div class="logo-text">Clínica Bem Viver</div>
        </div>
        <nav>
            {{-- <a href="#sobre-nos">Sobre Nós</a>
            <a href="#servicos">Serviços</a> --}}
            <a href="{{ route('usuarios.login') }}" class="login-button">Fazer Login</a>
        </nav>
    </header>

    <!-- Conteúdo Principal -->
    @yield('content')

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