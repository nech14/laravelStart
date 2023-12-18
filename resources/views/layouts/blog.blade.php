
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Registration form</title>

        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <style type="text/css">

            main{
                display: flex;
                flex-wrap: wrap;
                flex-direction: row;
                justify-content: space-evenly;
                align-content: flex-start;
                width: 80%;
            }

            .card{
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                border: 2px solid black;
                border-radius: 10px;
                width: 380px;
                height: 200px;
                padding: 10px;
                margin: 10px;
            }

            .card:hover{
                background-color: rgba(52, 152, 219, 0.1); /* синий цвет с прозрачностью */
                transform: scale(1.1);
            }

            .card_name{           
                font-size: 18pt;              
                margin: 5px;
            }

            .card_text{         
                font-size: 16pt;
                text-indent: 20px;
            }

            .card_info{
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: flex-end;
            }

            .card_avtor{                
                font-size: 12pt;
                margin: 5px;
            }

            .card_date{
                font-size: 12pt;
                margin: 10px;
            }
        </style>
        
       
    </head>
    <body>

        @include('includes.header')

        <main>
            
            @foreach($posts as $post)
                <a class="item_a" href="blog_post/{{$post->id}}"> 
                    <div class="card">
                        
                        <p class="card_name"> {{$post->name}} </p> 
                        <p class="card_text">{{mb_substr($post->text, 0, 50)}}... </p> 
                        <div class="card_info">
                            <p class="card_avtor"> Автор: {{$post->user->lastname}} {{$post->user->name}} </p> 
                            <p class="card_date"> Дата: {{$post->publiched_at}} </p>  
                        </div>                            
                        
                    </div>                    
                </a>
            @endforeach
            
        </main>
                
        @include('includes.footer')
    </body>
</html>
