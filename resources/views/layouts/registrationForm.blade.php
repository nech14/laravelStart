
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
            <h1>Регистрация на занятие в спортзал</h1>
            <form action="{{ route('reg.store') }}" method="post">
                @csrf

                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Телефон:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="date">Дата занятия:</label>
                <input type="date" id="date" name="date" required>

                <label for="time">Время занятия:</label>
                <input type="time" id="time" name="time" required>

                <input type="submit" value="Зарегистрироваться">
            </form>
        </main>
                
        @include('includes.footer')
    </body>
</html>
