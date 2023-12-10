
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Records</title>

        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">        
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        
    </head>
    <body>

        @include('includes.header')

        <main>
            <h1>Пользователь:</h1>
            <pre>{{$json}}</pre>

            <form action="{{ route('user.id.edit', ['id' => json_decode($json)->id]) }}" method="get">
                <button>Edit</button>
            </form>
            <form action="{{ route('user.id.delete', ['id' => json_decode($json)->id]) }}" method="get">
                <button>Delete</button>
            </form>
        </main>
        

        @include('includes.footer')
    </body>
</html>
