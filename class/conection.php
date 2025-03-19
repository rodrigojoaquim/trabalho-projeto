<?php
    $host = "localhost"; // Ou IP do servidor da base de dados
    $dbname = "loja";
    $usuario = "root"; // Altera conforme as credenciais
    $senha = ""; // Adiciona a senha se houver

    session_start();

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
    function login($email, $senha)
	{
        global $pdo;

		$nome=$pdo->prepare("SELECT nome FROM user WHERE email=:e AND senha=:s");
        $nome->bindValue(":e",$email);
		$nome->bindValue(":s",md5($senha));
		$nome->execute();
		if($nome->rowCount()>0)
		{
			//entrar no sistema (sessão)
			$dado=$nome->fetch();
			session_start();
			$_SESSION['username']=$dado['nome'];
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