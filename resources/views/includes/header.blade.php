
<header>
    
    <img src="{{ asset('img/logo.png') }}" alt="Логотип Вашего зала!" class="logo">
    <nav>
        <a class="logo_a" href="{{ route('mainpage') }}">Главная страница</a>
        <!-- <a class="logo_a" href="{{ route('reg.create') }}">Запись на занятие</a>
        <a class="logo_a" href="{{ route('reg.index') }}">Расписание занятий</a> -->
        <a class="logo_a" href="{{ route('blog') }}">Блог</a>
        <a class="logo_a" href="{{ route('post.create', ['id' => 'None']) }}">Создать пост</a>
        <a class="logo_a" href="{{ route('bd_menu') }}">Меню БД</a>
    </nav>        
     
</header>

