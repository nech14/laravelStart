
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
            <h1>Пользователи:</h1>
            <table>
                <tr>
                    <th>id</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Email</th>
                    <th>Возраст</th>
                    <th>Заблокирован</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td><a class="item_a" href="{{$user->id}}"> {{$user->id}} </a></td>
                        <td> {{$user->name}} </td>
                        <td> {{$user->lastname}} </td>
                        <td> {{$user->email}} </td>
                        <td> {{$user->age}} </td>
                        <td> {{$user->ban == 0 ? "false" : "true"}}  </td>
                    </tr>
                @endforeach
            </table>
        </main>
        
        @include('includes.footer')
    </body>
</html>
