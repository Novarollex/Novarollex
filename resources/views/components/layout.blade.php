<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/Images/browser.png">
     <link rel="stylesheet" href="/css/bootstrap.css">
     <script src="js/jquery.js"></script>
    <title>CulinaryOasis</title>
    <style>
      @font-face {
        font-family: 'Cic';
        src: url('/fonts/Raleway-Italic-VariableFont_wght.ttf');
      }
      @media (max-width: 993px){

        .logotip{
          height:100px;
          margin-left:-20%;
        }

        p{
          color:red;
        }
      }
      @media (max-width: 376px){

        form{
            margin-top:3%;
            width:200px;
            padding:40px;
            margin-left:39%;
        }


        .nav-bar{
          width:20%
        }

        p{
          color:blue;
        }

        .carousel{
          margin-left:-200px;
          width:500px;
          height:0px;
        }


      }
        form{
            margin-top:3%;
            max-width:300px;
            border:1px solid black;
            border-radius:10px;
            padding:40px;
            margin-left:42%;
        }
        .nav-link{
            color:blue;
        }
        .carousel-inner{
          max-width:350px;

          margin-left:40%;
          height:310px;
        }
        .carousel-control-prev{
          margin-left:27%;
        }
        .carousel-control-next{
          margin-right:25%;
        }
        .carousel{
          margin-top:1.5%;
        }
        .comp{
          width:60%;
          margin-top:3%;
          font-family:'cic';
          font-size:35px;
          margin-left:23%;
        }
        .comp img{
          margin-left:13%;
        }
        .cards{
          display:flex;
          flex-wrap:wrap;
          margin-left:4%;
        }
        .zaki{
          display:flex;
        }
        .lk{
          border:1px solid black;
          margin-left:13%;
          margin-top:2%;
          min-width:30%;
          max-width:30%;
          height:auto;
          padding:40px;
          border-radius:20px;
        }
        .message{
          position:absolute;
          top:14.7%;
          left:14%;
        }
        .navbar{
          max-width:100%;
          min-width:50%;
          background-color:black;
        }
        .batman{
          width:65%;
          margin-left:25%;
        }
        .nav-link{
          margin-top:-2%;
          color:white;
        }
        .filtrs a{
          text-decoration:none;
          color:white;
          border:1px solid black;
          padding:7px;
          background-color:black;
        }

        .filtrs{
          margin-top:50px;
          margin-left:4%;
        }

        .filtrs a:hover{
          color:black;
          background-color:white;
        }
        .lks{
          display:flex;
          color:red;
        }
        .components{
          display:flex;
        }
        .cs{
          display:flex;
        }
        .cs p{
          margin-left:20px;
        }
        .mname{
          position: absolute;
          display:flex;
          border:1px solid black;
          margin-left:2%;
          height:max-content;
          top:125px;
        }

        .pfck{
          border:1px black solid;
          height:30%;
          padding:15px;
          margin-top:1%;
          margin-left:25%;
          width:20%;
        }

        .pfck_hun{
          border:1px black solid;
          height:30%;
          padding:15px;
          margin-top:-15%;
          margin-left:48%;
          width:20%;
        }

        .main{
          border:1px solid black;
          width:25%;
          margin-top:2%;
          margin-left:27%;
          padding:10px;
        }
        .carousel-item p, h5{
          color:black;
          text-align:center;
        }
        a {
          text-decoration:none;
        }
        .corzina{
          border:1px black solid;
          width:45%;
          padding:20px;
          border-radius:20px;
          margin-top:2%;
          margin-left:28%;
        }
        .lk{
          display:flex;
          margin-left:36%;
        }
        .drop_zaki{
          margin-bottom:109px;
        }
        .infa{
          margin-bottom:66px;
        }
        .infoks{
          margin-left:10%;
        }
        .page{
          margin-top:5%;
          margin-left:10%;
          display:flex;
          display:inline-block;
        }
        .card_admin{
          display:flex;
          flex-wrap:wrap;
        }
        .page p{
          margin-left:5%;
        }
        .redaction{
          margin-left:44%;
        }
        .row_f{
          margin-top:2%;
        }
        .links{
          display:flex;
        }

        .links a{
          margin-top:3%;
          margin-bottom:3%;
          margin-left:7%;
        }
        .card_img{
          position:absolute;
          margin-left:60%;
        }
        .deliv{
          width:550px;
          border:1px solid black;
          border-radius:10px;
          padding:40px;
        }
        .shifts{
          display:flex;
          flex-wrap:wrap;
        }
    </style>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg ">
  <div class="container-fluid batman">
    <a class="navbar-brand" href="/"><img src="/Images/logo3.png" class="logo" alt="" style="width:auto;max-height:70px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

      <li class="nav-item">
          <a class="nav-link" href="/">О нас</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/cat">Каталог</a>
        </li>

        @if((empty(session()->get('role'))) and (empty(session()->get('admin'))))
        <li class="nav-item">
          <a class="nav-link" href="/reg">Регистрация</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/auth">Авторизация</a>
        </li>
        @endif

        @if(session()->get('role') == 'Пользователь')
        <li class="nav-item">
          <a class="nav-link" href="/zaki">Мои заказы</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/page">{{session()->get('user')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/mass">Корзина</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/exit">Выход</a>
        </li>
        @else
        @endif

        @if(session()->get('role') == 'Доставщик')
        <li class="nav-item">
          <a class="nav-link" href="/pers_lk">{{session()->get('user')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/exit">Выход</a>
        </li>
        @endif

        @if(!empty(session()->get('admin')))
        <li class="nav-item">
          <a class="nav-link" href="/admin"> Админ панель</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/exit">Выход</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
    </header>
    <main>
    {{$sps}}
    </main>
    <footer>

    </footer>
</body>
<script src="/js/bootstrap.bundle.js"></script>
<script>$( function() { $('.telega').click(function(){
            var val = $(this).val();
            $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
            $.ajax({
                    url: '/add/' + val,
                    method: "GET",
                    dataType: "text",
                    success: function(){
                    },
                    error: function(){
                    }

                });
            $val = null;
           });
        });
    function myFunc() {
    let quan = document.getElementById('member').value
    let container = document.getElementById('container')
    while(container.hasChildNodes()){
        container.removeChild(container.lastChild)
    }
    for(let i = 0; i < quan; i++){
                // Append a node with a random text
                container.appendChild(document.createTextNode("Ингридент №" + (i+1)));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");
                input.placeholder="Белки"
                input.required=true
                input.name="Белки" + (i+1)
                var input2 = document.createElement("input");
                input2.placeholder="Жиры"
                input2.required=true
                input2.name="Жиры" + (i+1)
                var input3 = document.createElement("input");
                input3.placeholder="Углеводы"
                input3.required=true
                input3.name="Углеводы" + (i+1)
                var input4 = document.createElement("input");
                input4.placeholder="К-калории"
                input4.required=true
                input4.name="К-калории" + (i+1)
                var input5 = document.createElement("input");
                input5.placeholder="Название ингридиента"
                input5.required=true
                input5.name="Название" + (i+1)
                var input6 = document.createElement("input");
                input6.required=true
                input6.placeholder="Масса"
                input6.name="Масса" + (i+1)
                container.appendChild(input);
                container.appendChild(input2);
                container.appendChild(input3);
                container.appendChild(input4);
                container.appendChild(input5);
                container.appendChild(input6);
                // Append a line break 
                container.appendChild(document.createElement("br"));
    }
  }
</script>
</html>