<<<<<<< HEAD
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

=======
<?php

session_start();

$userid = $_SESSION['user_id'];

if (isset($userid)) {
    // Se o usuário estiver logado, redirecione para a página restrita
    header("Location: restrita.html");
    exit();
}
else
{
    header("Location: Forms/login.php");
    exit();
}

>>>>>>> 9f2cc7157573fe9e9e77d082f874cdcd2c9b6704
?>