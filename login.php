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
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
        <div class="container-log">
            <div class="login-box">
            <h2>Login</h2>
            <form method="POST">
                
                <!--Email-->
                <div class="input-box">
                    <input type="email" name="Email" required>
                    <label>Email</label>
                </div>

                <!--Password-->
                <div class="input-box">
                    <input type="password" name="senha" required>
                    <label>Password</label>
                </div>

                <!--Botao de Login-->
                <button type="submit" class="btn" name="loggin">Login</button>

                <!--Signup-->
                <div class="signup-link">
                    <a href="singup.php">Signup</a>
                </div>
            </form>
            </div>
    <div>
        <span id="span-log" style="--i:0"></span>
        <span id="span-log" style="--i:1"></span>
        <span id="span-log" style="--i:2"></span>
        <span id="span-log" style="--i:3"></span>
        <span id="span-log" style="--i:4"></span>
        <span id="span-log" style="--i:5"></span>
        <span id="span-log" style="--i:6"></span>
        <span id="span-log" style="--i:7"></span>
        <span id="span-log" style="--i:8"></span>
        <span id="span-log" style="--i:9"></span>
        <span id="span-log" style="--i:10"></span>
        <span id="span-log" style="--i:11"></span>
        <span id="span-log" style="--i:12"></span>
        <span id="span-log" style="--i:13"></span>
        <span id="span-log" style="--i:14"></span>
        <span id="span-log" style="--i:15"></span>
        <span id="span-log" style="--i:16"></span>
        <span id="span-log" style="--i:17"></span>
        <span id="span-log" style="--i:18"></span>
        <span id="span-log" style="--i:19"></span>
        <span id="span-log" style="--i:20"></span>
        <span id="span-log" style="--i:21"></span>
        <span id="span-log" style="--i:22"></span>
        <span id="span-log" style="--i:23"></span>
        <span id="span-log" style="--i:24"></span>
        <span id="span-log" style="--i:25"></span>
        <span id="span-log" style="--i:26"></span>
        <span id="span-log" style="--i:27"></span>
        <span id="span-log" style="--i:28"></span>
        <span id="span-log" style="--i:29"></span>
        <span id="span-log" style="--i:30"></span>
        <span id="span-log" style="--i:31"></span>
        <span id="span-log" style="--i:32"></span>
        <span id="span-log" style="--i:33"></span>
        <span id="span-log" style="--i:34"></span>
        <span id="span-log" style="--i:35"></span>
        <span id="span-log" style="--i:36"></span>
        <span id="span-log" style="--i:37"></span>
        <span id="span-log" style="--i:38"></span>
        <span id="span-log" style="--i:39"></span>
        <span id="span-log" style="--i:40"></span>
        <span id="span-log" style="--i:41"></span>
        <span id="span-log" style="--i:42"></span>
        <span id="span-log" style="--i:43"></span>
        <span id="span-log" style="--i:44"></span>
        <span id="span-log" style="--i:45"></span>
        <span id="span-log" style="--i:46"></span>
        <span id="span-log" style="--i:47"></span>
        <span id="span-log"  style="--i:48"></span>
        <span id="span-log" style="--i:49"></span>
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