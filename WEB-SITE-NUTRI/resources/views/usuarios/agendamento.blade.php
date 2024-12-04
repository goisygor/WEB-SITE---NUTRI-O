@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Minha Nutrição - Agendamento</title>
    <link rel="stylesheet" href="{{ asset('css/agendamento.css') }}">
</head>
<body>
    <!-- Cabeçalho -->
    <header>
        <div class="logo-container">
            <img src="{{ asset('imgs/logo.jpg') }}" alt="Logo" class="logo-img">
            <div class="logo-text">Clínica Bem Viver</div>
        </div>
        <nav>
            <a href="{{ route('sobre-nos') }}">Sobre Nós</a>
            <div class="dropdown">
                <a href="#servicos">Serviços</a>
                <div class="dropdown-content">
                    <a href="#medicos">Nossa Equipe</a>
                    <a href="#avaliacao">Avaliações Nutricionais</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Formulário de Agendamento -->
    <main>
        <section id="agendamento" class="agendamento-container">
            <h1>Agendamento de Consultas</h1>

            <!-- Exibir mensagem de sucesso -->
            @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif

            <form action="{{ route('agendamento.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="sobrenome">Sobrenome:</label>
                    <input type="text" id="sobrenome" name="sobrenome" required>
                </div>
                <div class="form-group">
                    <label for="idade">Idade:</label>
                    <input type="number" id="idade" name="idade" min="0" required>
                </div>
                <div class="form-group">
                    <label for="peso">Peso (kg):</label>
                    <input type="number" id="peso" name="peso" step="0.1" required>
                </div>
                <div class="form-group">
                    <label for="altura">Altura (cm):</label>
                    <input type="number" id="altura" name="altura" step="0.1" required>
                </div>
                <div class="form-group">
                    <label for="tipo_documento">Tipo de Documento:</label>
                    <select id="tipo_documento" name="tipo_documento" required>
                        <option value="RG">RG</option>
                        <option value="CPF">CPF</option>
                        <option value="CNH">CNH</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="documento">Documento:</label>
                    <input type="text" id="documento" name="documento" required>
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco" required>
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="bairro" required>
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" required>
                </div>
                <div class="form-group">
                    <label for="convenio">Convênio:</label>
                    <input type="text" id="convenio" name="convenio">
                </div>
                <div class="form-group">
                    <label for="plano">Plano:</label>
                    <input type="text" id="plano" name="plano">
                </div>
                <div class="form-group">
                    <label for="modalidade_exame">Modalidade de Exame:</label>
                    <input type="text" id="modalidade_exame" name="modalidade_exame" required>
                </div>
                <div class="form-group">
                    <label for="exame">Exame:</label>
                    <input type="text" id="exame" name="exame" required>
                </div>
                <div class="form-group">
                    <label for="medico">Médico:</label>
                    <input type="text" id="medico" name="medico" required>
                </div>
                <button type="submit" class="btn-agendar">Agendar</button>
            </form>
        </section>
    </main>

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
