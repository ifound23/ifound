<?php
session_start();
require '../../PHP/usuarios/connectionDB.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../style/formStyle.css" media="screen" />
    <title>IFOUND</title>
</head>

<body>
    <div class="login-box">
        <h2>CADASTRO</h2>
        <form action="../../PHP/main.php" method="post">
            <div class="user-box">
                <input type="text" name="nome" required="">
                <label>Usuário</label>
            </div>
            <div class="user-box">
                <input type="email" name="email" id="" required="">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="senha" id="" required="">
                <label>Senha</label>
            </div>
            <div class="user-box">
                <input type="password" name="confirmasenha" id="" required="">
                <label>Confirmar Senha</label>
            </div>
            <input class="button" value="enviar" name="cadastrar" type="submit">
            <ul class="opcoes">
                <li><a href="login.php"><label for="" class="link-voltar">Voltar</label></a></li>
            </ul>
        </form>
    </div>
</body>

</html>