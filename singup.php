<?php
require_once 'class/conection.php';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Registe-se</title>
    <link rel="stylesheet" href="css/css.css">
</head>

<body>
    <div id = "blurnav">
        <div id = "nav">
            <div id="center">
                <a id="logo" href="/trabalho projeto">
                    <img src="img/logo.png" width="150vw">
                </a>
            </div>
        </div>
    </div>
    <div id = "login">
        <div id="login-box">
            <h2>Registe-se</h2>
            <form method="POST">

            <div id="input-box">
                <input type="text" name="nome" maxlength="30" required>
                <label>Nome</label>
            </div>

            <div id="input-box">
                <input type="text" name="telefone" maxlength="30" required>
                <label>Telemovel</label>
            </div>                
            
            <div id="input-box">
                <input type="email" name="email"  maxlength="40" required>
                <label>Email</label>
            </div>

            <div id="input-box">
                <input type="password" name="senha"  maxlength="15" required>
                <label>Password</label>
            </div>

            <input type="submit" value="Registrar" id="btn-login" name="registrar">
            </form>
        </div>
    </div>
    <?php
    if(isset($_POST['registrar']))
    {
        $nome=addslashes($_POST['nome']);
        $telefone=addslashes($_POST['telefone']);
        $email=addslashes($_POST['email']);
        $senha=addslashes($_POST['senha']);

        //verificar se está preenchido

        if(!empty($nome)&&!empty($telefone)&&!empty($email)&& !empty($senha))
        {
            if(registar($nome,$telefone,$email,$senha))
            {
                echo "Registado com sucesso, aceda para entrar!";
                $newURL="login.php";
                header('Location: '.$newURL);			
            }else{
                echo '<script type="text/javascript">
                alert("Email ja registrado");
                </script>'; 
            }
        }else{
            echo '<script type="text/javascript">
                alert("Preencha todos os campos");
                </script>'; 
        }
    }

    ?>
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
</body>