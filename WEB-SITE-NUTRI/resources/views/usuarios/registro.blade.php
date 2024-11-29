@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/registro.css') }}" rel="stylesheet">
@endpush

@section('title', 'Registrar-se - Clínica Bem Viver')

@section('content')
    <!-- Conteúdo de Registro -->
    <div class="container">
        <div class="registro-container">
            <h1>Registrar-se</h1>
            <form method="POST" action="{{ route('usuarios.registro') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
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

                <div class="form-group">
                    <label for="password_confirmation">Confirmar Senha</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit">Registrar-se</button>
            </form>

            <p>Já tem uma conta? <a href="{{ route('usuarios.login') }}">Faça login aqui</a>.</p>
        </div>
    </div>
@endsection