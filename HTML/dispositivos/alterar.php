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
    <link rel="stylesheet" href="../../style/style-altera.css">
    <link rel="stylesheet" href="../../style/responsive.css">
    <title>Document</title>
</head>

<body>
    <header class="topo"><img src="../../ASSETS/img/main-page-slogan.png" alt="" class="main-page-icon"><span class="slogan">Gerencie aqui<br>os seus dispositivos.
    </span></header>
    <div class="content-container">
        <div class="form-container">
            <form action="../../PHP/dispositivos/alterar.php" method="POST" id="formulario" class="form-altera">

                <label class="dispositivolbl" for="dispid">ID do dispositivo:<br>
                    <input type="text" id="dispid" name="id" required class="campo" autocomplete="off">
                </label>

                <label class="nomelbl" for="name">Nome do dispositivo:<br>
                    <input type="text" id="name" name="nome" required class="campo"
                    autocomplete="off">
                </label>

                <label for="name" class="nomelbl2">Novo nome do dispositivo:</label>
                <br>
                <input type="text" name="newnome"
                required class="campo"
                autocomplete="off" id="name">


                    <input type="submit" value="ALTERAR" class="botao">
        
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
                <a href="./alterar.php" name="alter" class="botao" id="alterar"style="color: #ffc700; text-shadow: 4px 4px 3px #ffffff">ALTERAR
                </a>
                <img src="../../ASSETS/img/alter.svg" alt="" class="altera"> 
            </div>
            
            <div class="vision-line">
                <a href="./visualizar.php" name="visu" class="botao" id="visao">VISUALIZAR
                </a>
                <img src="../../ASSETS/img//visibility.svg" alt="" class="vizaoun">
        </div>

            <div class="delete-line">
                <a href="delete.php" name="delete" class="botao" id="deletar">DELETAR
                </a>
                <img src="../../ASSETS/img/delete.svg" alt="" class="lixo">
            </div>
        
    </div>

    </div>

    <footer class="volte-container">
        <a href="./cadastro.php">&lt;Voltar</a>
    </footer>
</body>

</html>


