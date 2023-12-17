
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Records</title>

        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('css/table.css') }}">

    </head>
    <body>

        @include('includes.header')

        <main>
            <h1> {{ $result }} </h1>
        </main>
        
        @include('includes.footer')
    </body>
</html>
