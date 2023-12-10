
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
            <h1>Комментарий</h1>
            <form action="{{ route('comment.store', ['id' => $id, 'idc' => $idc]) }}" method="post">
                @csrf

                <label for="user_id">user_id:</label>
                <input type="number" id="user_id" name="user_id" value="{!! $id !!}">
                @error('user_id')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="commentable_type">Тип комментируемого:</label>
                <select name="commentable_type" id="commentable_type" name="commentable_type">
                    <option value="user">Пользователь</option>
                    <option value="post" selected>Пост</option>
                </select>
                @error('commentable_type')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="commentable_id">Комментируемый:</label>
                <input type="number" min="0" id="commentable_id" name="commentable_id" value="{{old('commentable_id')}}">
                @error('commentable_id')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="rating">оценка:</label>
                <input type="number" min="0" max="10" id="rating" name="rating" value="{{old('rating')}}">      
                @error('rating')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror  

                <label for="comment">Комментарий:</label>
                <input type="comment" id="comment" name="comment" value="{{old('comment')}}">
                @error('comment')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <input type="submit" value="Добавить">
            </form>
        </main>
                
        @include('includes.footer')
    </body>
</html>
