<?php
    $host = "localhost"; // Ou IP do servidor da base de dados
    $dbname = "loja";
    $usuario = "root"; // Altera conforme as credenciais
    $senha = ""; // Adiciona a senha se houver
    $user = NULL;
    $output = "Login";

    //inicia a sessão para passar dados de uma pagina para a outra
    session_start();

    // conecta a base de dados
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }

    //vai buscar os produtos para meter nos destaques da pagina principal
    try {
        $stmt = $pdo->query("SELECT * FROM produtos where class = 'novidade'");
        $novidade = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = $pdo->query("SELECT * FROM produtos where class = 'descontos'");
        $descontos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = $pdo->query("SELECT * FROM produtos where class = 'eletronicos'");
        $eletronicos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        die("Erro ao buscar produtos: " . $e->getMessage());
    }

    //verifica se ja passou o tempo para dar loggout da conta
    if (isset($_SESSION['sessao'])&& isset($_SESSION['time'])&&isset($_SESSION['username']) ){
        if($_SESSION['sessao']){
            $time = $_SESSION['time'];
            $user = $_SESSION['username'];
            if ($user != NULL && time() < $time + 1000){
                $output = $user;
            }else{
                $output = "Login";
                echo '<script type="text/javascript">
                alert("Sessão Expirada");
                </script>'; 
                $_SESSION['sessao'] = false;
                $user = NULL;
            }
        }        
    }
    
    // verifica se existe o parametro de pesquisa e executa a query para fazer a pesquisa
    if (isset($_GET['pesquisa'])) {
        $mensagem = urldecode($_GET['pesquisa']);
        $pesquisa = "SELECT * From produtos where nome LIKE '%$mensagem%'";
        try {
            $stmt = $pdo->query($pesquisa);
            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro ao buscar produtos: " . $e->getMessage());
        }
    }

    // verifica se existe o parametro de id para is buscar as informações do produto
    if (isset($_GET['id'])) {
        $idprod = urldecode($_GET['id']);
        $query = "SELECT * From produtos where id_produto = $idprod";
        try {
            $stmt = $pdo->query($query);
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro ao buscar produtos: " . $e->getMessage());
        }
    }

    //faz a pesquisa para ter as informações do carrinho da conta
    function adicionarcarrinho(){
        global $user;
        global $pdo;
        global $carrinho;

        try {
            if($user != null){
                $stmt = $pdo->query("SELECT produtos.nome,  produtos.img, produtos.id_produto, produtos.preco, carrinho.quantidade  FROM user JOIN carrinho ON user.id_user = carrinho.user_id JOIN produtos ON carrinho.product_id = produtos.id_produto where user.id_user = ".$_SESSION['id']);
                $carrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            die("Erro ao buscar produtos: " . $e->getMessage());
        }
    }

    adicionarcarrinho();

    // quando chamada adiciona o produto ao carrinho
    function adicionar($id, $id_prod, $quantidade){

        global $pdo;

        $stmt = $pdo->query('SELECT quantidade FROM carrinho  where user_id = '.$id.' AND product_id = '.$id_prod);
        $numero = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$numero){//verifica se o produto ja existe no carrinho da conta, se sim adiciona a quantidade se nao cria o registro
            $sql=$pdo->prepare("INSERT INTO carrinho (user_id, product_id,quantidade) VALUES (:u, :p, :q)");
            $sql->bindValue(":u", $id);
            $sql->bindValue(":p", $id_prod);
            $sql->bindValue(":q", $quantidade);
            $sql->execute();
        }else{
            $sql=$pdo->prepare("UPDATE carrinho SET quantidade = :q where user_id = :u AND product_id = :p");
            $sql->bindValue(":u", $id);
            $sql->bindValue(":p", $id_prod);
            $sql->bindValue(":q", $quantidade+$numero['quantidade']);
            $sql->execute();
        }
        return true;
    }

    // quando chamada retorna o html do carrinho
    function carrinho($user,$carrinho){
        if($user != NULL){
            if (count($carrinho)>0){
                $preco = 0;
                echo '<div id = "carrinho-todo">';
                echo '<div id = "prod-carrinho">';
                foreach ($carrinho as $key){
                    $preco = $preco + $key['preco'] * $key['quantidade'];
                    echo '  <div id = "item-carrinho">
                                <img src="'.$key['img'].'" height=100>
                                <div id = "nome-carrinho">'.$key['nome'].'</div>
                                <div id = "preco-carrinho">
                                    <button type="button" id = "btn-carrinho" onclick = retirar('.$key['id_produto'].')><i class="fa fa-close"></i></button>
                                    <div>'.$key['quantidade'].'</div>
                                    <div>'.$key['preco']*$key['quantidade'].' €</div>
                                </div>
                            </div>';
                }
                echo '</div>';
                echo '</div>';
                echo '  <div id = "preco-container">
                            <div>O preço total é:</div>
                            <div id = "preco">'.$preco.'€</div>
                        </div>
                        <div id = "div-btn">
                            <button type="button" id = "btn-comprar">Fazer Checkout</button>
                        </div>';
            }else{//carrinho vazio
                echo '  <div id= "carrinho-vazio">
                            <div id = "carrinho-vazio-img">
                                <div>
                                    <b>O teu cesto</b> está vazio
                                </div>
                            </div>
                        </div>';
            }
        }
    }

    //verifica se a password e email estão corretos e retorna o nome de utilizador e o seu id
    function login($email, $senha)
	{
        global $pdo;

		$nome=$pdo->prepare("SELECT id_user, nome FROM user WHERE email=:e AND senha=:s");
        $nome->bindValue(":e",$email);
		$nome->bindValue(":s",md5($senha));
		$nome->execute();
		if($nome->rowCount()>0)
		{
			
			$dado=$nome->fetch();
			$_SESSION['username']=$dado['nome'];
            $_SESSION['id']=$dado['id_user'];
			return true;
		}
		else
		{
			return false;
		}
	}

    // verifica se ja existe alguem com o email registrado e cria o registro se nao houver
    function registar($nome, $telefone, $email, $senha)
	{
        global $pdo;

        $sql=$pdo->prepare("SELECT id_user from user where email=:e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        if ($sql->rowCount()>0)
        {
            return false;
        }
        else
        {
            $sql=$pdo->prepare("INSERT INTO user (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            return true;
        }
    }

    // quando chamado retira o produto do carrinho
    function retirar($id_pod,$id_user){
        global $pdo;
        $stmt = $pdo->query('DELETE FROM carrinho WHERE product_id = '.$id_pod.' AND user_id = '.$id_user);
    }

    //verifica se o parametro acao existe e o seu valor para poder chamar a função correta
    if (isset($_GET["acao"]) && $_GET["acao"] == "retirar") {
        retirar($_GET['id_pod'],$_SESSION['id']);
    }
    if (isset($_GET["acao"]) && $_GET["acao"] == "atualizar") {
        adicionarcarrinho();
        echo carrinho($user,$carrinho);
    }
    if(isset($_GET['acao'])&& $_GET["acao"] == "adicionar" && isset($_GET['quantidade'])){
        adicionar( $_SESSION['id'],$_GET['id_pod'],$_GET['quantidade']);
    }
?>