<?php
// Verifica se o formulário foi submetido
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os valores do formulário
    $userid = $_SESSION['user_id'];
    $dispid = $_POST['id'];
    $name = $_POST['nome'];

    // Inclui o arquivo de conexão
    require_once './conexao.php';

    // Cria o comando SQL para inserção dos dados
    $sql = "INSERT INTO ifound (id, nome, user_id) VALUES ('$dispid', '$name', '$userid')";

    // Executa o comando SQL
    if ($conn->query($sql) === TRUE) {
        echo "<script type= 'text/javascript'>alert('Cadastro realizado com sucesso!');";
        echo "javascript:window.location='../../HTML/dispositivos/cadastro.php';</script>";
       
    } else {
        echo "<script type= 'text/javascript'>alert('Erro ao cadastrar dispositivo!');";
        echo "javascript:window.location='../../HTML/dispositivos/cadastro.php';</script>";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>

