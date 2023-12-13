<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Usuario</title>
</head>
<body>
    <h1>Cadastro</h1>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <label for="">Email</label>
        <input type="email" name="email">
        <label for="">Nome</label>
        <input type="text" name="name">
        <label for="">Senha</label>
        <input type="password" name="password">
        <button>Enviar</button>
    </form>
</body>
</html>