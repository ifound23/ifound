<?php

session_start();

$userid = $_SESSION['user_id'];

if (isset($userid)) {
    // Se o usuário estiver logado, redirecione para a página restrita
    header("Location: restrito/html/cadastro.html");
    exit();
}
else
{
    header("Location: Forms/login.php");
    exit();
}

?>