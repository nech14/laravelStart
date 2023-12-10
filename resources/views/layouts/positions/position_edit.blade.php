
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
            <form action="{{ route('position.update', ['id' => None]) }}" method="post">
                @csrf

                <label for="user_id">user_id:</label>
                <input type="number" id="position_id" name="user_id" value="{!! $position->user_id !!}">
                @error('user_id')
                <div style="color:я red; font-size: 14px">{{$message}}</div>
                @enderror

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

                <input type="submit" value="Изменить">
            </form>
        </main>
                
        @include('includes.footer')
    </body>
</html>
