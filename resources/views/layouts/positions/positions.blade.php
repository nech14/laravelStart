
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
            <h1>Работники:</h1>
            <table>
                <tr>
                    <th>user_id</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Email</th>
                    <th>Возраст</th>                    
                    <th>Должность</th>
                    <th>Город</th>
                    <th>Название организации</th>
                    <th>Заблокирован</th>
                </tr>
                @foreach($positions as $position)
                    <tr>
                        <td><a class="item_a" href="position/{{$position->user_id}}"> {{$position->user_id}} </a></td>
                        <td> {{$position->user->name}} </td>
                        <td> {{$position->user->lastname}} </td>
                        <td> {{$position->user->email}} </td>
                        <td> {{$position->user->age}} </td>
                        <td> {{$position->working_position}} </td>
                        <td> {{$position->city}} </td>
                        <td> {{$position->organization}} </td>                        
                        <td> {{$position->user->ban == 0 ? "false" : "true"}}  </td>
                    </tr>
                @endforeach
            </table>
        </main>
        
        @include('includes.footer')
    </body>
</html>
