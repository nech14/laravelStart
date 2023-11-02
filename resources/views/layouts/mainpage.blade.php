<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>MainPage</title>
        
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
        <style type="text/css">
            body{
                width: 100%; 
                margin: 0;               
                display: flex;
                flex-direction: column;                
                align-items: center;
                font-size: 1.6vw;
            }
            h1{
                font-size: 3vw;
                text-align: center;
            }
            h2{
                font-size: 2.5vw;
                margin-bottom: 0px;
            }
            .main_welcom_blog{
                width: 100%;
                display: flex;
                align-items: center;
            }
            img{
                width: 100%;
            }
           .imgs{
                display: flex;
                width: 55%;   
                padding-left: 20px;   
                padding-right: 10px;
            }
            .img_text{
                width: 45%;
                padding-left: 10px;
                padding-right: 20px;
            }
            .blog{
                width: 100%;       
                display: flex;
                flex-direction: column;                
                align-items: center; 
                padding-bottom: 20px;
            }
            .blog_info{
                width: 60%;
            }
            .blog:nth-child(2n) {
                background-color: lightgray;
            }
            main{
                flex: 1;
            }
        </style>
    </head>
    <body>

        @include('includes.header')
        <main>
            <div class="main_welcom_blog">
                <div class="imgs"><img src="img/main.jpg" /></div>
                <div class="img_text">
                    <h1>
                        Добро пожаловать в наш тренажерный зал!
                    </h1>
                    <p>
                        Наши услуги помогут вам достичь своих фитнес-целей, независимо от вашего уровня подготовки.
                        Мы предлагаем современное оборудование, индивидуальные тренировки, а также приятную и
                        мотивирующую атмосферу для всех наших клиентов.
                    </p>
                </div>
            </div>
            <div class="blog">
                <h2>Почему выбирают нас:</h2>
                <ul>
                    <li>Широкий выбор оборудования</li>
                    <li>Профессиональные инструкторы</li>
                    <li>Разнообразие групповых занятий</li>
                    <li>Уютная атмосфера</li>
                    <li>Гибкое расписание</li>
                </ul>
            </div>
            <div class="blog">
                <h2>Присоединяйтесь к нам!</h2>
                <div class="blog_info">
                    <p> Сделайте первый шаг к своим фитнес-целям, и мы поможем вам достичь их.</p>
                    <p>Запишитесь на пробное занятие прямо сейчас или свяжитесь с нами, если у вас есть какие-либо вопросы. Мы с нетерпением ждем вас в нашем тренажерном зале!</p>
                </div>
            </div>
        </main>    
        @include('includes.footer')
    </body>
</html>
