<?php

require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $dispid = $_POST['id'];
  $name = $_POST['nome'];
  $newname = $_POST['newnome'];

  if (empty($dispid) || empty($name)) {
    echo "<script type='text/javascript'>alert('Digite seu usuário e senha.');";
    echo "window.location='../html/alterar.html';</script>";
  } else {
    $sql_verify = "SELECT * FROM ifound WHERE id = '$dispid' AND nome = '$name'";
    $result = $conn->query($sql_verify);

    if ($result->num_rows > 0) {
      $sql_update = "UPDATE ifound SET nome = '$newname' WHERE nome = '$name' AND id = '$dispid'";
      if ($conn->query($sql_update) === TRUE) {
        echo "<script type='text/javascript'>alert('Alteração bem sucedida!');";
        echo "window.location='../html/alterar.html';</script>";
      } else {
        echo "<script type='text/javascript'>alert('Erro ao alterar dispositivo!');";
        echo "window.location='../html/alterar.html';</script>";
      }
    } else {
      echo "<script type='text/javascript'>alert('ID ou Nome do dispositivo incorretos!');";
      echo "window.location='../html/alterar.html';</script>";
    }
  }
} 

$conn->close();

?>
