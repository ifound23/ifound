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
        <h2>Alterar Senha</h2>
        <form action="main.php" method="post">
            <div class="user-box">
                <input type="email" name="email" id="" required="">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="senha" name="senha" id="" required="">
                <label>Senha</label>
            </div>
            <div class="user-box">
                <input type="senha" name="novasenha" id="" required="">
                <label>Nova Senha</label>
            </div>
            <input class="button" value="enviar" name="mudarsenha" type="submit">
            <ul class="opcoes">
                <li><a href="esquecisenha.php"><label for="">Esqueci a senha</label></a></li>
                <li><a href="login.php"><label for="">Voltar</label></a></li>
            </ul>
        </form>
    </div>
</body>

</html>