<?php
// Dados do banco de dados
$host = 'localhost';
$db = 'dispositivo';
$user = 'root';
$password = '';

// Conexão com o banco de dados
$conn = new mysqli($host, $user, $password, $db);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conn->connect_error);
}
?>