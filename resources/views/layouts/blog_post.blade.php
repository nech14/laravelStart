
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Registration form</title>

        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <style type="text/css">
            main{
                width: 80%;
            }

            .card{
                width: 60%;
            }

            .card_name{
                font-size: 20pt;
            }

            .card_text{
                font-size: 16pt;
                text-indent: 20px;
            }

            .comment_card{
                width: 50%;
                border: 2px solid black;
                border-radius: 20px;
                padding: 5px;
                margin: 10px;
            }

            .card_avtor{
                font-size: 12pt;
            }

            #commentable_type{
                display: none;
            }

            #commentable_id{
                display: none;
            }


            .comment_card {
                border: 1px solid #ccc;
                border-radius: 8px;
                padding: 10px;
                margin: 10px 0;
                background-color: #f9f9f9;
            }

            .item_a {
                text-decoration: none;
                color: #3498db;
            }

            .comment_name {
                font-size: 18px;
                font-weight: bold;
                margin: 0;
                padding-left: 10px;  
            }

            .comment {
                font-size: 16px;
                margin: 10px 0;
                text-indent: 20px;       
                padding-left: 10px;
            }

            .rating {
                font-size: 14px;
                color: #27ae60;
                margin-bottom: 5px;
                padding-left: 10px;
            }

            .comment_date {
                font-size: 14px;
                color: #888;
                padding-left: 10px;
                margin: 0;
            }

            form {
                width: 40%;
                margin: 20px auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 10px;
                background-color: #f9f9f9;
            }

            /* Стили для label */
            label {
                display: block;
                margin-bottom: 8px;
            }

            /* Стили для input и select */
            input,
            select {
                width: 100%;
                padding: 8px;
                margin-bottom: 16px;
                box-sizing: border-box;
            }

            /* Стили для submit-кнопки */
            input[type="submit"] {
                background-color: #3498db;
                color: #fff;
                padding: 10px 15px;
                border: none;
                border-radius: 3px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #207bb5;
            }

            /* Стили для сообщений об ошибке */
            div.error-message {
                color: red;
                font-size: 14px;
                margin-top: 5px;
            }

            textarea {
                width: 100%;
                padding: 8px;
                margin-bottom: 16px;
                box-sizing: border-box;
                resize: vertical; /* Разрешает изменение размера только по вертикали */
                min-height: 50px; /* Минимальная высота textarea */
            }
        </style>
        
       
    </head>
    <body>

        @include('includes.header')

        <main>
            <div class="card">
                        
                <p class="card_name"> {{$post->name}} </p> 
                <p class="card_text"> {{$post->text}} </p> 
                <div class="card_info">
                    <p class="card_avtor"> Автор: 
                        <a class="item_a card_avtor" href="{{route('user.id', ['id' => $post->user_id])}}">
                            {{$post->user->lastname}} {{$post->user->name}}
                        </a>
                    </p> 
                    <p class="card_date"> Дата: {{$post->publiched_at}} </p>  
                </div>                    
                
            </div>     

            <form action="{{ route('comment.store', ['id' => $post->user_id, 'idc' => $post->id]) }}" method="post">
                @csrf

                <label for="user_id">user_id:</label>
                <input type="number" id="user_id" name="user_id" >
                @error('user_id')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <select name="commentable_type" id="commentable_type" name="commentable_type">
                    <option value="post" selected>Пост</option>
                </select>
                <input type="number" min="0" id="commentable_id" name="commentable_id" value="{{$post->id}}">

                <label for="rating">оценка:</label>
                <input type="number" min="0" max="10" id="rating" name="rating" value="{{old('rating')}}">      
                @error('rating')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror  

                <label for="comment">Комментарий:</label>
                <textarea type="comment" id="comment" name="comment"> </textarea>
                @error('comment')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <input type="submit" value="Добавить">
            </form>

            @foreach($comments as $comment)

                <div class="comment_card">
                    <a class="item_a" href="{{route('user.id', ['id' => $comment->user_id])}}"> <p class="comment_name">  {{$comment->user->lastname}} {{$comment->user->name}} </p></a>
                    <p class="comment"> {{$comment->comment}} </p>
                    <p class="rating"> Оценка: {{$comment->rating}} </p>
                    <p class="comment_date"> Дата: {{$comment->created_at}} </p>
                </div>
                
            @endforeach
            
        </main>
                
        @include('includes.footer')
    </body>
</html>
