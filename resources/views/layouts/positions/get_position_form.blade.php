
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Registration form</title>

        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">        
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        
    </head>
    <body>

        @include('includes.header')

        <main>
            <h1>Публикация</h1>
            <form action="{{ route('position.get') }}" method="post">
                @csrf       

                <label for="user_id">user_id:</label>
                <input type="number" id="user_id" name="user_id">

                <input type="submit" value="Найти">
            </form>
        </main>
                
        @include('includes.footer')
    </body>
</html>
