<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <h2>
        @auth
            {{Auth::user()->email}} {{--Só pegas as informações se estiver logado --}}
        @endauth

    </h2>

    <form action="{{ route('logout')}}" method="post">
        @csrf
        <button>Sair</button>
    </form>
</body>
</html>