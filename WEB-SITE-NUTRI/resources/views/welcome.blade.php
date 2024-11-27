<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bem-vindo</title>
    <style>
        body {
            font-family: system-ui, -apple-system, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f3f4f6;
            color: #1f2937;
        }
        .container {
            max-width: 800px;
            padding: 2rem;
            text-align: center;
        }
        .welcome-card {
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 0.25rem;
            margin: 0.5rem;
        }
        .btn:hover {
            background-color: #1d4ed8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-card">
            <h1>Bem-vindo ao Sistema!</h1>
            <p>Parabéns por fazer login. Estamos felizes em ter você aqui!</p>
        </div>
        <nav>
            <a href="/dashboard" class="btn">Dashboard</a>
            <a href="/perfil" class="btn">Meu Perfil</a>
            <a href="/logout" class="btn">Sair</a>
        </nav>
    </div>
</body>
</html>