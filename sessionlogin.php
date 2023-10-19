
<?php

session_start();

$userid = $_SESSION['user_id'];

if (isset($userid)) {
    // Se o usuário estiver logado, redirecione para a página restrita
    header("Location: HTML/dispositivos/cadastro.php");
    exit();
}
else
{
    header("Location: HTML/usuarios/login.php");
    exit();
}

?>