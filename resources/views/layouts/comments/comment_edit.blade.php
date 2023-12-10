
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
            <form action="{{ route('comment.update', ['id' => $comment->id]) }}" method="post">
                @csrf

                <label for="user_id">user_id:</label>
                <input type="number" id="user_id" name="user_id" value="{!! $comment->user_id !!}">
                @error('user_id')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="commentable_id">Комментируемый:</label>
                <input type="number" min="0" id="commentable_id" name="commentable_id" value="{!! $comment->commentable_id !!}">
                @error('commentable_id')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="rating">оценка:</label>
                <input type="number" min="0" max="10" id="rating" name="rating" value="{!! $comment->rating !!}">      
                @error('rating')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror  

                <label for="comment">Комментарий:</label>
                <input type="comment" id="comment" name="comment" value="{!! $comment->comment !!}">
                @error('comment')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <input type="submit" value="Добавить">
            </form>
            
        </main>
                
        @include('includes.footer')
    </body>
</html>
