@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Calculadora de IMC</h2>
    <p>Use a ferramenta abaixo para calcular o seu IMC:</p>

    <!-- Código do iframe da calculadora -->
    <script src="https://hellosafe.com.br/responsive.js"></script>
    <iframe class="responsive-iframe" src="https://hellosafe.com.br/app/iframe?id=7109&amp;has-title=false&amp;lang=pt-BR" title="calculo imc" frameborder="0" style="width: 100%; height: 500px;"></iframe>

    <!-- Link para voltar à home -->
    <div style="margin-top: 20px;">
        <a href="{{ url('/') }}" class="button">Voltar para a Home</a>
    </div>
</div>
@endsection