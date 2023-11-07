CREATE DATABASE IF NOT EXISTS ifound;

-- Use o banco de dados ifound
USE ifound;

-- Crie a tabela user para armazenar informações de usuários
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(250),
    nome VARCHAR(250),
    senha VARCHAR(50),
    status_conta VARCHAR(15)
);

-- Crie a tabela dispositivo para armazenar informações de dispositivos e relacione com a tabela user usando a coluna user_id
CREATE TABLE ifound (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES user(id)
);


