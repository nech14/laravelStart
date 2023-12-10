
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
            <h1>Функции БД:</h1>
            
            <h2>Пользователи:</h2>
            <lu>
                <li>
                    <a class="item_a" href="{{ route('user.create') }}">Добавить пользователя</a>
                </li>
                <li>
                <a class="item_a" href="{{ route('users.index') }}">Вывести всех пользователей</a>
                </li>
                <li>
                    <a class="item_a" href="{{ route('get_user_form') }}">Вывести пользователя по id</a>
                </li>
                <li>
                    <a class="item_a" href="{{ route('get_user_form.json') }}">Вывести пользователя по id в json</a>
                </li>
                <li>
                    <a class="item_a" href="{{ route('users.json') }}">Вывести пользователей в json</a>
                </li>
            </lu>

            <h2>Сотрудники:</h2>
            <lu>
                <li>
                    <a class="item_a" href="{{ route('position.create', ['id' => 'None']) }}">Назначить сотрудника</a>
                </li>
                <li>
                    <a class="item_a" href="{{ route('position.index') }}">Вывести всех сотрудников</a>
                </li>
                <li>
                    <a class="item_a" href="{{ route('get_position_form') }}">Вывести сотрудника по id</a>
                </li>
                <li>
                    <a class="item_a" href="{{ route('get_position_form.json') }}">Вывести сотрудника по id в json</a>
                </li>
                <li>
                    <a class="item_a" href="{{ route('positions.json') }}">Вывести сотрудников в json</a>
                </li>
            </lu>

            <h2>Посты:</h2> 
            <lu>
                <li>
                    <a class="item_a" href="{{ route('post.create', ['id' => 'None']) }}">Создать пост</a>
                </li>
                <li>
                    <a class="item_a" href="{{ route('post.index') }}">Вывести все посты</a>
                </li>
                <li>
                    <a class="item_a" href="{{ route('get_post_form') }}">Вывести публикацию по id</a>
                </li>
                <li>
                    <a class="item_a" href="{{ route('get_post_form.json') }}">Вывести публикацию по id в json</a>
                </li>
                <li>
                    <a class="item_a" href="{{ route('posts.json') }}">Вывести посты в json</a>
                </li>
            </lu>

            <h2>Комментарии:</h2>
            <lu>
                <li>
                    <a class="item_a" href="{{ route('comment.create', ['id' => 'None', 'idc' => 'None']) }}">Создать</a>
                </li>
                <li>
                    <a class="item_a" href="{{ route('comment.index') }}">Вывести все комментарии</a>
                </li>
                <li>
                    <a class="item_a" href="{{ route('get_comment_form') }}">Вывести комментарий по id</a>
                </li>
                <li>
                    <a class="item_a" href="{{ route('get_comment_form.json') }}">Вывести комментарий по id в json</a>
                </li>
                <li>
                    <a class="item_a" href="{{ route('comments.json') }}">Вывести комментарии в json</a>
                </li>
            </lu>
            
            
        </main>
                
        @include('includes.footer')
    </body>
</html>
