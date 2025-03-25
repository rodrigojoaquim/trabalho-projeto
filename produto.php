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
            if(isset($carrinho)){
                carrinho($user,$carrinho);
            }else{
                echo '<div id = "sem-sessao"> Inicie sessão para ver o carrinho </div>';
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
                <img src="<?php echo $produto['img']; ?>" width = "400px" >
                <div id = "text">
                    <div id = "nome-produto">
                        <?php echo $produto['nome']; ?>
                    </div>
                    <div id = "descricao-produto">
                        <?php echo $produto['descricao']; ?>
                    </div>
                    <div id = "preco-produto">
                        <?php echo $produto['preco']; ?> €
                    </div>
                    <div id="btn">
                        <input type="number" id ="quantidade" name = quantidade value = "1">
                        <div id = "btns" style="display:grid">
                            <button type="button" onclick="aumentar()"><i class='fa fa-angle-up' style='font-size:24px'></i></button>
                            <button type="button" onclick="diminuir()"><i class='fa fa-angle-down' style='font-size:24px'></i></button>
                        </div>
                        <button type="submit" id = "btn-compra" name = "adicionar" onclick="adicionar(<?php echo $produto['id_produto'];?>,quantidade)">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>
            <div id = "descricao">
                <?php echo $produto['descricao_comp']; ?>
            </div>
        </section>
        <footer>
            <hr>
            <a>ELETROZONE</a>
            <br>
            <div>© ELETROZONE</div>
            <br>
            <div> 
                Legal Stuff | Privacy Policy | Security | Website Accessibility | Manage Cookies
            </div>
            <hr>
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
    const quantidade = document.getElementById('quantidade');
    let open = false;

    if (document.documentElement.scrollHeight === window.innerHeight){
        center.style.marginRight = "17px";
    }

    // verifica se foi pressionado o enter
    pesquisa.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {           
            let value = pesquisa.value;
            window.location.href = "pesquisa.php?pesquisa=" + encodeURIComponent(value);
        }
    });

    //estilo do carrinho para abrir e fechar
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
            carrinho.style.transform = "translateX(400px)";
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

    // se o valor posto na quantidade foi invalido define para 1
    quantidade.addEventListener("change", function(){
        if(Number(quantidade.value) === 0 || quantidade.value<1 ){
            quantidade.value = 1;
        }
    })

    //aumeta e diminui o valor quando é carregado nos botões
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

    //chama a função para adicionar ao carrinho no ficheiro conection.php
    function adicionar(id_pod,quantidade){
        fetch("class/conection.php?acao=adicionar&id_pod="+id_pod+"&quantidade="+quantidade.value)
        atualizarCarrinho()
    }

    // quando clico no X do carrinho chama esta função que vai chamar a função retirar no fichero conection.php
    function retirar(id_pod){
        fetch("class/conection.php?acao=retirar&id_pod="+id_pod)
        atualizarCarrinho()
    }

    // é chamada para ir atualizar o carrinho quando é retirado o produto    
    function atualizarCarrinho() {
        fetch("class/conection.php?acao=atualizar")
            .then(response => response.text())
            .then(html => {
                carrinho.innerHTML = html;
            });
    }
</script>
</html>