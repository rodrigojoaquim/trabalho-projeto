<?php
    require_once 'class/conection.php';
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <h2>Login</h2>
            <form method="POST">
                
                <!--Email-->
                <div id="input-box">
                    <input type="email" name="Email" required>
                    <label>Email</label>
                </div>

                <!--Password-->
                <div id="input-box">
                    <input type="password" name="senha" required>
                    <label>Password</label>
                </div>

                <!--Botao de Login-->
                <button type="submit" id="btn-login" name="loggin">Login</button>

                <!--Signup-->
                <div id="signup-link">
                    <a href="singup.php">Signup</a>
                </div>
            </form>
        </div>
    </div>
    <div id="mensagem">
    <?php
		//verificar se clicou no botão
		if(isset($_POST['loggin']))
		{
			$email=addslashes($_POST['Email']);
			$senha=addslashes($_POST['senha']);
			//verificar se está preenchido

			if(!empty($email)&&!empty($senha))
			{
                if(login($email,$senha))
                {
                    echo "Login bem";
                    $newURL=$_SESSION['page'];
                    header('Location: '.$newURL);
                    $_SESSION['time']=time();
                    $_SESSION['sessao'] = true;
                    
                }else{
                    echo "Credenciais Erradas";
                }
			}else{
				echo "Preencha todos os campos";
			}
		}
	?>
    </div>
    
</body>