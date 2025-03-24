<?php
    $host = "localhost"; // Ou IP do servidor da base de dados
    $dbname = "loja";
    $usuario = "root"; // Altera conforme as credenciais
    $senha = ""; // Adiciona a senha se houver
    $user = NULL;
    $output = "Login";

    session_start();

    if(isset($_SESSION['sessao'])){
        $sessao = $_SESSION['sessao'];
    }


    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }

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

    if (isset($sessao)&& isset($_SESSION['time'])&&isset($_SESSION['username']) ){
        if($sessao){
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
    if (isset($_GET['id'])) {
        $idprod = urldecode($_GET['id']);
        $query = "SELECT * From produtos where id_produto = $idprod";
        try {
            $stmt = $pdo->query($query);
            $produto = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro ao buscar produtos: " . $e->getMessage());
        }
    }

    try {
        if($user != null){
            $stmt = $pdo->query("SELECT produtos.nome,  produtos.img, produtos.id_produto, produtos.preco, carrinho.quantidade  FROM user JOIN carrinho ON user.id_user = carrinho.user_id JOIN produtos ON carrinho.product_id = produtos.id_produto where user.id_user = ".$_SESSION['id']);
            $carrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        die("Erro ao buscar produtos: " . $e->getMessage());
    }

    function adicionar($id, $id_prod, $quantidade){

        global $pdo;

        $sql=$pdo->prepare("INSERT INTO carrinho (user_id, product_id,quantidade) VALUES (:u, :p, :q)");
        $sql->bindValue(":u", $id);
        $sql->bindValue(":p", $id_prod);
        $sql->bindValue(":q", $quantidade);
        $sql->execute();
        return true;
    }

    function carrinho($user,$carrinho){
        if($user != NULL){
            echo '<div id = "carrinho-todo">';
            echo '<div id = "prod-carrinho">';
            foreach ($carrinho as $key){
                echo '  <div id = "item-carrinho">
                            <img src="'.$key['img'].'" height=100>
                            <div id = "nome-carrinho">'.$key['nome'].'</div>
                            <div id = "preco-carrinho">
                                <button type="button" id = "btn-carrinho"><i class="fa fa-close"></i></button>
                                <div>'.$key['quantidade'].'</div>
                                <div>'.$key['preco']*$key['quantidade'].' €</div>
                            </div>
                        </div>';
            }
            echo '</div>';
            echo '</div>';
        }
    }

    function login($email, $senha)
	{
        global $pdo;

		$nome=$pdo->prepare("SELECT id_user, nome FROM user WHERE email=:e AND senha=:s");
        $nome->bindValue(":e",$email);
		$nome->bindValue(":s",md5($senha));
		$nome->execute();
		if($nome->rowCount()>0)
		{
			//entrar no sistema (sessão)
			$dado=$nome->fetch();
			$_SESSION['username']=$dado['nome'];
            $_SESSION['id']=$dado['id_user'];
			return true; //registado com sucesso
		}
		else
		{
			return false; //não foi possivel registar
		}
	}
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
?>