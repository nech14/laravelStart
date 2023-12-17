
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
            <h1>Посты:</h1>
            <table>
                <tr>
                    <th>id</th>
                    <th>user_id</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Email</th>
                    <th>Опубликован</th>
                    <th>Дата публикации</th>
                    <th>Название</th>
                    <th>Содержание</th>
                </tr>
                @foreach($posts as $post)
                    <tr>
                        <td><a class="item_a" href="post/{{$post->id}}"> {{$post->id}} </a></td>
                        <td><a class="item_a" href="user/{{$post->user_id}}"> {{$post->user_id}} </a></td>
                        <td> {{$post->user->name}} </td>
                        <td> {{$post->user->lastname}} </td>
                        <td> {{$post->user->email}} </td>                    
                        <td> {{$post->publiched == 0 ? "false" : "true"}}  </td>
                        <td> {{$post->publiched_at}} </td>
                        <td> {{$post->name}} </td>
                        <td> {{$post->text}} </td>
                    </tr>
                @endforeach
            </table>
        </main>
        
        @include('includes.footer')
    </body>
</html>
