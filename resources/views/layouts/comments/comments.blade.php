
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Records</title>

        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('css/table.css') }}">

    </head>
    <body>

        @include('includes.header')

        <main>
            <h1>Комментарии:</h1>
            <table>
                <tr>
                    <th>id</th>
                    <th>user_id</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Email</th>
                    <th>Commentable_type</th>
                    <th>Commentable_id</th>
                    <th>Название коментируемого</th>
                    <th>Одобрен</th>
                    <th>Оценка</th>
                    <th>Комментарий</th>
                </tr>
                @foreach($comments as $comment)
                    <tr>
                        <td><a class="item_a" href="comment/{{$comment->id}}"> {{$comment->id}} </a></td>
                        <td><a class="item_a" href="user/{{$comment->user_id}}"> {{$comment->user_id}} </a></td>
                        <td> {{$comment->user->name}} </td>
                        <td> {{$comment->user->lastname}} </td>
                        <td> {{$comment->user->email}} </td>    
                        <td> {{substr($comment->commentable_type, 11)}} </td>                             
                        <td><a class="item_a" href="{{strtolower(substr($comment->commentable_type, 11))}}/{{$comment->commentable_id}}"> {{$comment->commentable_id}} </a></td>               
                        <td> {{$comment->commentable->name}} </td>
                        <td> {{$comment->approved == 0 ? "false" : "true"}}  </td>
                        <td> {{$comment->rating}} </td>
                        <td> {{$comment->comment}} </td>
                    </tr>
                @endforeach
            </table>
        </main>
        
        @include('includes.footer')
    </body>
</html>
