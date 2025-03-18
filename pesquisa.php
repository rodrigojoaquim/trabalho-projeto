<?php
    $host = "localhost"; // Ou IP do servidor da base de dados
    $dbname = "loja";
    $usuario = "root"; // Altera conforme as credenciais
    $senha = ""; // Adiciona a senha se houver

    session_start();
    $produtos = [];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    } 

    if (isset($_GET['pesquisa'])) {
        $mensagem = urldecode($_GET['pesquisa']);
        $query = "SELECT * From produtos where nome LIKE '%$mensagem%'";
        try {
            $stmt = $pdo->query($query);
            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro ao buscar produtos: " . $e->getMessage());
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <div id = "carrinho">
            teste
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
                    <button type="button" id= "carro" onclick = "carrinhos()">
                        <i class='fa fa-shopping-cart'> </i>
                        Carrinho
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id = "blur">
        <section id="inicio">
            <br><br><br>
            <?php 
                if ($produtos == null){
                    echo 'nenhum produto encontrado';
                }else{
                    $j = 0;
                    echo '<div id="container">';
                    foreach ($produtos as $key) {
                        if($j == 4){
                            echo '  <div id="item" style="margin-right:0px;">
                                        <div id="image">
                                            <img src="'.$key['img'].'">
                                        </div>
                                        <div id="nome">
                                            '.$key['nome'].'
                                        </div>
                                        <div id="preco">
                                            '.$key['preco'].'€
                                        </div>
                                    </div>';
                        }else{
                            echo '  <div id="item">
                                        <div id="image">
                                            <img src="'.$key['img'].'">
                                        </div>
                                        <div id="nome">
                                            '.$key['nome'].'
                                        </div>
                                        <div id="preco">
                                            '.$key['preco'].'€
                                        </div>
                                    </div>';
                        }
                        $j++;
                        if($j == 5){
                            echo '</div>';
                            echo '<div id="container">';
                            $j = 0;
                        }
                    }
                }
                
            ?>
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
            carrinho.style.transform = "translateX(250px)";
            blur.style.filter = "brightness(100%) blur(0px)";
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
</script>
</html>