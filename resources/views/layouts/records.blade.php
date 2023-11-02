
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
                text-align: center;
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
            <h1>Расписание тренировок</h1>
            {!! $table !!}
        </main>
        
        @include('includes.footer')
    </body>
</html>
