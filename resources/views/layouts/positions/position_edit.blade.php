
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
            <h1>Работник</h1>
            <form action="{{ route('position.update', ['id' => $position->user_id]) }}" method="post">
                @csrf

                <label for="working_position">Должность:</label>
                <input type="text" id="working_position" name="working_position" value="{!! $position->working_position !!}">
                @error('working_position')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="city">Название города:</label>
                <input type="text" id="city" name="city" value="{!! $position->city !!}">      
                @error('city')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror  

                <label for="organization">Название организации:</label>
                <input type="comment" id="organization" name="organization" value="{!! $position->organization !!}">
                @error('organization')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" value="{!! $position->user->name !!}"> 
                @error('name')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="lastname">Фамилия:</label>
                <input type="text" id="lastname" name="lastname" value="{{ $position->user->lastname }}">
                @error('lastname')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $position->user->email }}">      
                @error('email')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror          

                <label for="age">Возраст:</label>
                <input type="number" id="age" name="age" value="{{ $position->user->age }}">
                @error('age')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="password">Пароль:</label>
                <input type="text" id="password" name="password" value="{{ $position->user->password }}">
                @error('password')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror


                <input type="submit" value="Изменить">
            </form>
        </main>
                
        @include('includes.footer')
    </body>
</html>
