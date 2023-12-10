
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Records</title>

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
            
            main{
                flex: 1;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            table, th, td {
                border: 1px solid black;
            }
            th{
                padding: 0 6px 0 6px;
            }
            td{
                padding: 6px;
            }


        </style>
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