<?php
require_once 'class/conection.php';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Registe-se</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container-reg">
        <div class="login-box">
        <h2>Registe-se</h2>
        <form method="POST">

            <!--Nome-->
            <div class="input-box">
                <input type="text" name="nome" maxlength="30" required>
                <label>Nome</label>
            </div>

            <!--Telemovel-->
            <div class="input-box">
                <input type="text" name="telefone" maxlength="30" required>
                <label>Telemovel</label>
            </div>                
            
            <!--Email-->
            <div class="input-box">
                <input type="email" name="email"  maxlength="40" required>
                <label>Email</label>
            </div>

            <!--Password-->
            <div class="input-box">
                <input type="password" name="senha"  maxlength="15" required>
                <label>Password</label>
            </div>

            <!--Botao de Login-->
            <input type="submit" value="Registrar" class="btn" name="registrar">
        </form>
    </div>
    <div>
        <span id="span-reg" style="--i:0"></span>
        <span id="span-reg" style="--i:1"></span>
        <span id="span-reg" style="--i:2"></span>
        <span id="span-reg" style="--i:3"></span>
        <span id="span-reg" style="--i:4"></span>
        <span id="span-reg" style="--i:5"></span>
        <span id="span-reg" style="--i:6"></span>
        <span id="span-reg" style="--i:7"></span>
        <span id="span-reg" style="--i:8"></span>
        <span id="span-reg" style="--i:9"></span>
        <span id="span-reg" style="--i:10"></span>
        <span id="span-reg" style="--i:11"></span>
        <span id="span-reg" style="--i:12"></span>
        <span id="span-reg" style="--i:13"></span>
        <span id="span-reg" style="--i:14"></span>
        <span id="span-reg" style="--i:15"></span>
        <span id="span-reg" style="--i:16"></span>
        <span id="span-reg" style="--i:17"></span>
        <span id="span-reg" style="--i:18"></span>
        <span id="span-reg" style="--i:19"></span>
        <span id="span-reg" style="--i:20"></span>
        <span id="span-reg" style="--i:21"></span>
        <span id="span-reg" style="--i:22"></span>
        <span id="span-reg" style="--i:23"></span>
        <span id="span-reg" style="--i:24"></span>
        <span id="span-reg" style="--i:25"></span>
        <span id="span-reg" style="--i:26"></span>
        <span id="span-reg" style="--i:27"></span>
        <span id="span-reg" style="--i:28"></span>
        <span id="span-reg" style="--i:29"></span>
        <span id="span-reg" style="--i:30"></span>
        <span id="span-reg" style="--i:31"></span>
        <span id="span-reg" style="--i:32"></span>
        <span id="span-reg" style="--i:33"></span>
        <span id="span-reg" style="--i:34"></span>
        <span id="span-reg" style="--i:35"></span>
        <span id="span-reg" style="--i:36"></span>
        <span id="span-reg" style="--i:37"></span>
        <span id="span-reg" style="--i:38"></span>
        <span id="span-reg" style="--i:39"></span>
        <span id="span-reg" style="--i:40"></span>
        <span id="span-reg" style="--i:41"></span>
        <span id="span-reg" style="--i:42"></span>
        <span id="span-reg" style="--i:43"></span>
        <span id="span-reg" style="--i:44"></span>
        <span id="span-reg" style="--i:45"></span>
        <span id="span-reg" style="--i:46"></span>
        <span id="span-reg" style="--i:47"></span>
        <span id="span-reg" style="--i:48"></span>
        <span id="span-reg" style="--i:49"></span>
    </div>
    <div id="mensagem">
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
                    echo "Email já registado";
                }
            }else{
                echo "Preencha todos os campos";
            }
        }

        ?>
    </div>
</body>