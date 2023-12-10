
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
            <h1>Комментарий:</h1>

            <?php 
                $data = json_decode($json, true); 
                echo '<pre><code style="white-space: pre-wrap;">' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . '</code></pre>';
            ?>
            <form action="{{ route('comment.edit', ['id' => json_decode($json)->id]) }}" method="get">
                <button>Edit</button>
            </form>
            <form action="{{ route('comment.delete', ['id' => json_decode($json)->id]) }}" method="get">
                <button>Delete</button>
            </form>
        </main>
        

        @include('includes.footer')
    </body>
</html>
