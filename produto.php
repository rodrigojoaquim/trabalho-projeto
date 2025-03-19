<?php
    require_once 'class/conection.php';
    $user = NULL;
    $output = "Login";
    $icon="fa fa-arrow-right ms-3";

    if ($_SESSION) {
        $time = $_SESSION['time'];
        $user = $_SESSION['username'];

        if ($user != NULL && time() < $time + 1000) {
            $output = $user;
            $icon="";
        }else {
            $output = "Login";
            session_destroy();
            echo '<script type="text/javascript">
            alert("Sessão Expirada");
            </script>';
            $icon="fa fa-arrow-right ms-3";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <div id = "carrinho">
        <img src="img/no_image.png">
    </div>
    
    <div id = "blurnav">
        <div id = "nav">
            <div id="center">
                <a id="logo" href="/trabalho projeto">
                    <img src="img/logo.png" width="150vw">
                </a>
                <div id="bar">
                    <input id="pesquisa" type="text" placeholder="Pesquisar...">
                    <i class="fa fa-search"></i>
                </div>
                <div id="butoes">
                    <a type="button" id= "account" href = "login.php">
                        <i class='fa fa-user-circle'></i>
                        <?php echo $output;?>
                    </a>
                    <button type="button" id= "car" onclick = "carrinhos()">
                        <i class='fa fa-shopping-cart'> </i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id ="blur">
        <section id ="inicio">

        </section>
    </div>
</body>
<script>
    const pesquisa = document.getElementById('pesquisa');
    const carrinho = document.getElementById('carrinho');
    const blur = document.getElementById('blur');
    const nav = document.getElementById('nav');
    const center = document.getElementById('center');
    const inicio = document.getElementById('inicio');
    const body = document.body;
    let open = false;

    if (document.documentElement.scrollHeight === window.innerHeight){
        center.style.marginRight = "17px";
    }

    pesquisa.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {           

            let value = pesquisa.value;
            window.location.href = "pesquisa.php?pesquisa=" + encodeURIComponent(value);
        }
    });
    carrinho.style.transition = "all 1.5s";
    function carrinhos(){
        carrinho.style.transform = "translateX(0px)";
        blur.style.filter = "brightness(50%)";
        inicio.style.marginTop = "0px";
        inicio.style.paddingTop = "6vw";
        nav.style.filter = "brightness(50%)";
        body.style.overflow = "hidden";
        body.style.marginRight = "17px";
        center.style.marginRight = "17px";
        body.style.background = "rgb(0,0,0,0.5)";
        setTimeout(function(){
            open = true;    
        }, 100);
    }
    document.addEventListener("click", function(event) {

        if (!carrinho.contains(event.target) && open === true) {
            carrinho.style.transform = "translateX(350px)";
            blur.style.filter = "brightness(100%)";
            inicio.style.marginTop = "6vw";
            inicio.style.paddingTop = "0px";
            nav.style.filter = "brightness(100%)";
            body.style.overflow = "visible";
            body.style.marginRight = "0px";
            if (document.documentElement.scrollHeight === window.innerHeight){
                center.style.marginRight = "17px";
            } 
            open = false;
            body.style.background = "rgb(0,0,0,0)";
        }
    });
</script>
</html>