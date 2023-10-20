<?php
require_once './conexao.php';
session_start();

$success_message = '';
$error_message = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
        $userid = $_SESSION['user_id'];
        $dispid = $_POST['id'];
        $name= $_POST['nome'];

        if (empty($dispid) || empty($name)) {
            $error_message = "Digite digite o nome e id do dispositivo.";
        } else {
            // Comando SQL para verificar se o usuário e a senha correspondem aos dados do banco
            $sql_verify = "SELECT * FROM ifound WHERE id = '$dispid' AND nome = '$name' AND user_id = $userid";
            $result = $conn->query($sql_verify);

            if ($result->num_rows > 0) {
                // Usuário encontrado com a senha correta, então podemos proceder com a exclusão
                $sql_delete = "DELETE FROM ifound WHERE id = '$dispid' AND nome = '$name' AND user_id = $userid";
                if ($conn->query($sql_delete) === TRUE) {
                  echo "<script type= 'text/javascript'>alert('Exclusão bem sucedida!');";
                  echo "javascript:window.location='../../HTML/dispositivos/delete.php';</script>";
                } else {
                  echo "<script type= 'text/javascript'>alert('Erro ao deletar dados do dispositivo!');";
                  echo "javascript:window.location='../../HTML/dispositivos/delete.php';</script>";
                }
            } else {
              echo "<script type= 'text/javascript'>alert('nome do dispositivo ou id incorretos!');";
              echo "javascript:window.location='../../HTML/dispositivos/delete.php';</script>";
            }
        }
    }
   


$conn->close();
?>
