<?php
session_start();
if ($_SESSION['statuslogin'] !== 'true') {
    
    echo "<script type='text/javascript'>alert('Usuário não logado!');";
    echo "javascript:window.location='../usuarios/signup.php';</script>";

} 

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style-deletar.css">
    <link rel="stylesheet" href="../../style/responsive.css">
    <title>IFOUND</title>
</head>

<body>

    <header class="topo"><img src="../../ASSETS/img/main-page-slogan.png" alt="" class="main-page-icon"><span
            class="slogan">Gerencie aqui<br>os seus dispositivos.
        </span></header>

    <div class="content-container">
        <div class="form-container">
            <form action="../../PHP/dispositivos/deletar.php" method="POST" id="formulario">

                <label class="dispositivolbl" for="dispid">ID do dispositivo:<br>
                    <input type="text" id="dispid" name="id" required class="campo" autocomplete="off">
                </label>

                <label class="nomelbl" for="name">Nome do dispositivo:<br>
                    <input type="text" id="name" name="nome" required class="campo" autocomplete="off">
                </label>

                <input type="submit" value="DELETAR" class="botao">

            </form>
        </div>


        <div class="line-container">
            <hr class="linha">
        </div>

        <div class="botoes">
        <br>
            <div class="alter-line">
                <a href="cadastro.php" name="alter" class="botao" id="alterar">CADASTRO
                </a>
                <img src="../../ASSETS/img//adicione.svg" alt="" class="altera"> 
            </div>

            <div class="alter-line">
                <a href="./alterar.php" name="alter" class="botao" id="alterar">ALTERAR
                </a>
                <img src="../../ASSETS/img/alter.svg" alt="" class="altera"> 
            </div>
            
            <div class="vision-line">
                <a href="./visualizar.php" name="visu" class="botao" id="visao">VISUALIZAR
                </a>
                <img src="../../ASSETS/img//visibility.svg" alt="" class="vizaoun">
        </div>

            <div class="delete-line">
                <a href="delete.php" name="delete" class="botao" id="deletar" style="color: #f40900; text-shadow: 4px 4px 3px #ffffff">DELETAR
                </a>
                <img src="../../ASSETS/img/delete.svg" alt="" class="lixo">
            </div>



        </div>

    </div>

    <footer class="volte-container">
        <a href="../../index.html">&lt;Voltar</a>
        <a href="../../logout.php">&lt;Logout</a>
    </footer>
</body>