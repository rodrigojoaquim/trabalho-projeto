<?php
    require_once 'class/conection.php';
    
    $id = $_GET['id'];
    if(isset($_POST['login'])){
        $_SESSION['page'] = "produto.php?id=".$id;
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
        <section id ="inicio">
            <div id="img">
                <img src="<?php echo $produto[0]['img']; ?>" width = "350px" >
                <div id = "text">
                    <div id = "nome-produto">
                        <?php echo $produto[0]['nome']; ?>
                    </div>
                    <div id = "descricao-produto">
                        <?php echo $produto[0]['descricao']; ?>
                    </div>
                    <div id = "preco-produto">
                        <?php echo $produto[0]['preco']; ?> €
                    </div>
                    <form method="POST" id="btn">
                        <input type="number" id ="quantidade" value="1" min="1" name = quantidade>
                        <div style="display:grid">
                            <button type="button" onclick="aumentar()"><i class='fa fa-angle-up' style='font-size:24px'></i></button>
                            <button type="button" onclick="diminuir()"><i class='fa fa-angle-down' style='font-size:24px'></i></button>
                        </div>
                        <button type="submit" id = "btn-compra" name = "adicionar">Adicionar ao Carrinho</button>
                    </form>
                </div>
            </div>
            <div id = "descricao">
                <?php echo $produto[0]['descricao_comp']; ?>
            </div>
        </section>
    </div>
</body>
<?php
    if(isset($_POST['adicionar'])){
        adicionar( $_SESSION['id'],$_GET['id'],$_POST['quantidade']);
    }
?>


<script>
    const pesquisa = document.getElementById('pesquisa');
    const carrinho = document.getElementById('carrinho');
    const blur = document.getElementById('blur');
    const nav = document.getElementById('nav');
    const center = document.getElementById('center');
    const inicio = document.getElementById('inicio');
    const body = document.body;
    const quantidade = document.getElementById('quantidade');
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

    quantidade.addEventListener("change", function(){
        if(Number(quantidade.value) === 0 || quantidade.value<1 ){
            quantidade.value = 1;
        }
    })

    function aumentar(){
        quantidade.value = Number(quantidade.value) + 1;
       
    }
    function diminuir(){
        if(quantidade.value>1){
            quantidade.value = Number(quantidade.value) - 1;
        }else{
            quantidade.value = 1
        }
    }
</script>
</html>