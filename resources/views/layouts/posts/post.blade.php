
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
            <h1>Публикация:</h1>

            <?php 
                $data = json_decode($json, true); 
                echo '<pre><code style="white-space: pre-wrap;">' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . '</code></pre>';
                $id = $data[0]['id'];
                $nameBatton = $data[0]['publiched'] == 0 ?  "Publish" : "Withdraw from publication";
            ?>
            <form action="{{ route('post.edit', ['id' => $id]) }}" method="get">
                <button>Edit</button>
            </form>
            <form action="{{ route('post.publish', ['id' => $id]) }}" method="get">

                <button>{{$nameBatton}}</button>
            </form>
            <form action="{{ route('post.delete', ['id' => $id]) }}" method="get">
                <button>Delete</button>
            </form>
        </main>
        

        @include('includes.footer')
    </body>
</html>
