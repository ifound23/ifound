<?php
session_start();
require 'connectionDB.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="formStyle.css" media="screen" />
    <title>Document</title>
</head>

<body>
    <div class="login-box">
        <h2>Excluir Usuário</h2>
        <form action="main.php" method="post">
            <div class="user-box">
                <input type="text" name="email" required="">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="senha" required="">
                <label>Senha</label>
            </div>
            <input class="button" name="excluir" value="Excluir" type="submit">
            <ul class="opcoes">
                <li><a href="esquecisenha.php"><label for="">Esqueci minha Senha</label></a></li>
                <li><a href="singup.php"><label for="">Cadastre-se</label></a></li>
            </ul>
        </form>
    </div>
</body>

</html>