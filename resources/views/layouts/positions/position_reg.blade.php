
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
            <h1>Должность:</h1>
            <form action="{{ route('position.store', ['id' => $id]) }}" method="post">
                @csrf

                <label for="user_id">user_id:</label>
                <input type="number" id="user_id" name="user_id" value="{{old('user_id')}}">
                @error('user_id')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="working_position">Должность:</label>
                <input type="text" id="working_position" name="working_position" value="{{old('working_position')}}">
                @error('working_position')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <label for="city">Город::</label>
                <input type="text" id="city" name="city" value="{{old('city')}}">      
                @error('city')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror  

                <label for="organization">Организация:</label>
                <input type="text" id="organization" name="organization" value="{{old('organization')}}">
                @error('organization')
                <div style="color: red; font-size: 14px">{{$message}}</div>
                @enderror

                <input type="submit" value="Добавить">
            </form>
        </main>
                
        @include('includes.footer')
    </body>
</html>
