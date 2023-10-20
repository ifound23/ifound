CREATE DATABASE IF NOT EXISTS ifound;

-- Use o banco de dados ifound
USE ifound;
CREATE TABLE ifound (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES user(id)
);


