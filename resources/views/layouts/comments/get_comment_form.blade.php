
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Registration form</title>

        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
        <style type="text/css">
            body{
                display: flex;
                flex-direction: column;
                align-items: center;
                margin: 0;
                width: 100%;
                min-height: 100vh;
            }
            form{
                display: flex;
                flex-direction: column;
                padding: 10px 0 30px 0;
            }
            main{
                flex: 1;
            }
        </style>
    </head>
    <body>

        @include('includes.header')

        <main>
            <h1>Комментарий</h1>
            <form action="{{ route('comment.get') }}" method="post">
                @csrf       

                <label for="id">comment_id:</label>
                <input type="number" id="id" name="id">

                <input type="submit" value="Найти">
            </form>
        </main>
                
        @include('includes.footer')
    </body>
</html>
