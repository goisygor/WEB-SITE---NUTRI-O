@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<title>Sobre Nós - Clínica Bem Viver</title>
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
<!-- Cabeçalho -->
<header>
<div class="logo-container">
<img src="{{ asset('imgs/logo.jpg') }}" alt="Logo" class="logo-img">
<div class="logo-text">Clínica Bem Viver</div>
</div>
<nav>
<!-- Link para a página inicial -->
<a href="{{ url('/') }}">Home</a>
 <!-- Dropdown para Serviços -->
 <div class="dropdown">
    <a href="#servicos">Serviços</a>
    <div class="dropdown-content">
        <a href="#medicos">Nossa Equipe</a>
        <a href="#avaliacao">Avaliações Nutricionais</a>
    </div>
</div>
<!-- Botão de Login -->
<form action="/register" method="get" style="margin: 0;">
<button class="login-button" type="submit">Fazer Login</button>
</form>
</nav>
</header>

<!-- Conteúdo Principal -->
<div class="container">
<section id="sobre-nos">
<h1>Sobre a Clínica Bem Viver</h1>
<p>A Clínica Bem Viver é um projeto inovador que combina tecnologia e nutrição personalizada para oferecer soluções práticas para o seu bem-estar. Nossa missão é oferecer serviços de nutrição adaptados às suas necessidades, com acompanhamento contínuo para garantir seus melhores resultados.</p>

<h2>Nosso Objetivo</h2>
<p>Transformar a forma como você gerencia sua alimentação e saúde, oferecendo planos nutricionais personalizados e consultas online.</p>

<h2>Como Funciona?</h2>
<ul>
<li>Avaliação online de suas necessidades nutricionais.</li>
<li>Consultas com nutricionistas especializados.</li>
<li>Plano alimentar personalizado para suas metas de saúde.</li>
</ul>

<h2>Benefícios para Você</h2>
<ul>
<li>Consultas rápidas e acessíveis.</li>
<li>Planos alimentares adaptados às suas necessidades.</li>
<li>Acompanhamento contínuo e personalizado.</li>
</ul>
</section>
</div>

{{-- <!-- Rodapé -->
<footer class="footer">
<div class="footer-content">
<div class="footer-section">
<h3>Clínica Bem Viver</h3>
<p>© 2024 Todos os direitos reservados.</p>
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
</footer> --}}
</body>
</html>
