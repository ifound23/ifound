<?php

try {
    $PDO = new PDO('mysql:host=localhost;dbname=ifound;', 'root', '');
} catch (PDOException $e) {
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
};
