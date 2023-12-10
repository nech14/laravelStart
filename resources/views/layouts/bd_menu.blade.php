
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
                display: flex;
                flex-direction: column;
                align-items: center;
                flex: 1;
            }
            h1{
                font-size: 2.5vw;
            }
            h2{
                font-size: 2vw;
            }
            .item_a{                
                text-decoration: none;
                color: black;
                padding-bottom: 18px; 
                font-size: 1.9vw;
            }
            .item_a:hover{
                color: blue;
            }
        </style>
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
            </lu>
            
            
        </main>
                
        @include('includes.footer')
    </body>
</html>
