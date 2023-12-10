
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
            <h1>Пользователь</h1>
            <form action="{{ route('user.store') }}" method="post">
                @csrf

                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" value="{{old('name')}}">
                @error('name')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="lastname">Фамилия:</label>
                <input type="text" id="lastname" name="lastname" value="{{old('lastname')}}">
                @error('lastname')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{old('email')}}">      
                @error('email')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror          

                <label for="age">Возраст:</label>
                <input type="number" id="age" name="age" value="{{old('age')}}">
                @error('age')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" value="{{old('password')}}">
                @error('password')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <input type="submit" value="Добавить">
            </form>
        </main>
                
        @include('includes.footer')
    </body>
</html>
