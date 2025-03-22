<?php
    require_once 'class/conection.php';
    
    if(isset($_POST['login'])){
        $_SESSION['page'] = "/trabalho projeto";
        $newURL="login.php";
        header('Location: '.$newURL);
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
        <?php 
            foreach ($carrinho as $key){
                echo $key['nome'].'<br>';
            }
        ?>
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
                    <form method="post">
                        <button type="submit" id= "account" name = "login">
                            <i class='fa fa-user-circle'></i>
                            <?php echo $output;?>
                        </button>
                        <button type="button" id= "car" onclick = "carrinhos()">
                            <i class='fa fa-shopping-cart'> </i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id ="blur">
        <section id="inicio">
            <div id = "front">
                <img src="img/arduino.png">
            </div>
            <div id="section">
                <div>
                    <p id="titulo">Novidades</p>
                </div>
                <div id="container">
                    <?php 
                        for ($i = 0; $i < 5; $i++) {
                            echo '  <div id="item" onclick = "item('.$novidade[$i]['id_produto'].')">
                                        <div id="image">
                                            <img src="'.$novidade[$i]['img'].'">
                                        </div>
                                        <div id="nome">
                                            '.$novidade[$i]['nome'].'
                                        </div>
                                        <div id="preco">
                                            '.$novidade[$i]['preco'].'€
                                        </div>
                                    </div>';
                        }
                    ?>
                </div>
            </div>
            <div id="section">
                <br><br><br>
                <div>
                    <p id="titulo">Descontos</p>
                </div>
                <div id="container">
                    <?php 
                        for ($i = 0; $i < 5; $i++) {
                            echo '  <div id="item" onclick = "item('.$descontos[$i]['id_produto'].')">
                                        <div id="image">
                                            <img src="'.$descontos[$i]['img'].'">
                                        </div>
                                        <div id="nome">
                                            '.$descontos[$i]['nome'].'
                                        </div>
                                        <div id="preco">
                                            '.$descontos[$i]['preco'].'€
                                        </div>
                                    </div>';
                        }
                    ?>
                </div>
            </div>
            <div id="section">
                <br><br><br>
                <div>
                    <p id="titulo">Eletronicos</p>
                </div>
                <div id="container">
                    <?php 
                        for ($i = 0; $i < 5; $i++) {
                            echo '  <div id="item" onclick = "item('.$eletronicos[$i]['id_produto'].')">
                                        <div id="image">
                                            <img src="'.$eletronicos[$i]['img'].'">
                                        </div>
                                        <div id="nome">
                                            '.$eletronicos[$i]['nome'].'
                                        </div>
                                        <div id="preco">
                                            '.$eletronicos[$i]['preco'].'€
                                        </div>
                                    </div>';
                        }
                    ?>
                </div>
            </div>
        </section>
        <footer>
            teste
        </footer>
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

    pesquisa.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {           

            let value = pesquisa.value;
            window.location.href = "pesquisa.php?pesquisa=" + encodeURIComponent(value);
        }
    });
    carrinho.style.transition = "all 1.5s";
    function carrinhos(){
        carrinho.style.transform = "translateX(0px)";
        blur.style.filter = "brightness(50%) blur(5px)";
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
            center.style.marginRight = "0px";
            open = false;
            body.style.background = "rgb(0,0,0,0)";
        }
    });

    function item(index){
        window.location.href = "produto.php?id=" + encodeURIComponent(index);
    }
</script>
</html>