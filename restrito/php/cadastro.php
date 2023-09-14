<?php
// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os valores do formulário
    $dispid = $_POST['id'];
    $name = $_POST['nome'];

    // Inclui o arquivo de conexão
    require_once 'conexao.php';

    // Cria o comando SQL para inserção dos dados
    $sql = "INSERT INTO ifound (id, nome) VALUES ('$dispid', '$name')";

    // Executa o comando SQL
    if ($conn->query($sql) === TRUE) {
        echo "<script type= 'text/javascript'>alert('Cadastro realizado com sucesso!');";
        echo "javascript:window.location='../html/cadastro.html';</script>";
    } else {
        echo "<script type= 'text/javascript'>alert('Erro ao cadastrar dispositivo!');";
        echo "javascript:window.location='../html/cadastro.html';</script>";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
