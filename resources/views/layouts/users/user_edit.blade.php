
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
            <h1>Пользователь</h1>
            <form action="{{ route('user.id.update', ['id' => $user->id ]) }}" method="post">
                @csrf

                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" value="{!! $user->name !!}"> 
                @error('name')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="lastname">Фамилия:</label>
                <input type="text" id="lastname" name="lastname" value="{{ $user->lastname }}">
                @error('lastname')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}">      
                @error('email')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror          

                <label for="age">Возраст:</label>
                <input type="number" id="age" name="age" value="{{ $user->age }}">
                @error('age')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="password">Пароль:</label>
                <input type="text" id="password" name="password" value="{{ $user->password }}">
                @error('password')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <input type="submit" value="Обновить">
            </form>
        </main>
                
        @include('includes.footer')
    </body>
</html>
