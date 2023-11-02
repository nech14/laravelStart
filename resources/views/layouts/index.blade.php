
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
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
                justify-content: center;
                flex: 1;
            }

            h1{
                font-size: 5vw;
                padding-bottom: 300px;
            }
        </style>
    </head>
    <body>

        @include('includes.header')

        <main>
            <h1>{!! $result !!}</h1>
        </main>
        
        @include('includes.footer')
    </body>
</html>
