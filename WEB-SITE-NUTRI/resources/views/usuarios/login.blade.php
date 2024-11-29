@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endpush

@section('title', 'Login - Clínica Bem Viver')

@section('content')
    <!-- Conteúdo de Login -->
    <div class="container">
        <div class="login-container">
            <h1>Login</h1>
            <form method="POST" action="{{ route('usuarios.login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit">Entrar</button>
            </form>

            <p>Não tem uma conta? <a href="{{ route('usuarios.registro') }}">Crie uma aqui</a>.</p>
        </div>
    </div>
@endsection