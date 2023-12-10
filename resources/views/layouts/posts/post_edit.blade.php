
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
            <h1>Пост</h1>
            <form action="{{ route('post.update', ['id' => $post->id]) }}" method="post">
                @csrf

                <label for="post_id">user_id:</label>
                <input type="number" id="post_id" name="post_id" value="{!! $post->id !!}">
                @error('post_id')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="publiched_at">Дата публикации:</label>
                <input type="datetime-local" id="publiched_at" name="publiched_at" value="{!! json_decode($post)->publiched_at !!}">
                @error('publiched_at')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="name">Название:</label>
                <input type="text" id="name" name="name" value="{!! $post->name !!}">      
                @error('name')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror  

                <label for="text">Содержание:</label>
                <input type="comment" id="text" name="text" value="{!! $post->text !!}">
                @error('text')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <input type="submit" value="Изменить">
            </form>
        </main>
                
        @include('includes.footer')
    </body>
</html>
