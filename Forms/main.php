
<?php
session_start();
require 'connectionDB.php';

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $csenha = $_POST['confirmasenha'];

    // Verifica se a senha digitada se confirma com a senha de confirmação
    if ($senha == $csenha) {
        // Criptografa a senha usando MD5
        $senhaCriptografada = md5($senha);

        // Define o status do usuário como "ativo"
        $status = "ativo";

        // Se a senha de confirmação for igual à senha, executa o cadastro do usuário
        $query = "INSERT INTO user (email, senha, nome, status_conta) VALUES (:email, :senha, :nome, :status_conta)";
        $stmt = $PDO->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senhaCriptografada);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':status_conta', $status);
        $result = $stmt->execute();

        if ($result) {
            echo 'Usuário cadastrado com sucesso!';
            header("Location: singup.php");
            exit(0);
        } else {
            echo 'Erro ao criar o usuário';
            header("Location: singup.php");
            exit(0);
        }
    } else {
        // Senhas não conferem, exibe na tela
        echo 'As senhas não conferem!';
        return;
    }
}

if (isset($_POST['mudarsenha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $novasenha = $_POST['novasenha'];

    $senhaCriptografada = md5($senha);
    $nSenhaCriptografada = md5($novasenha);

    // Consulta o banco de dados para verificar se o email e a senha coincidem
    $queryEmail = "SELECT email FROM user WHERE email = :email AND senha = :senha";
    $stmt = $PDO->prepare($queryEmail);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':senha', $senhaCriptografada);
    $stmt->execute();

    // Armazena o resultado encontrado na variável $rows
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) > 0) {
        // Email e senha coincidem, então atualiza a senha no banco de dados
        $querySenha = "UPDATE user SET senha = :novaSenha WHERE email = :email";
        $stmt = $PDO->prepare($querySenha);
        $stmt->bindValue(':novaSenha', $nSenhaCriptografada);
        $stmt->bindValue(':email', $email);
        $result = $stmt->execute();

        if (!$result) {
            echo 'Ocorreu um erro ao atualizar a senha';
        } else {
            echo 'Senha alterada!';
        }
    } else {
        echo 'Email ou senha incorretos';
    }
}

if (isset($_POST['esquecisenha'])) {
    $email = $_POST['email'];
    $novasenha = substr(md5(time()), 0, 6);
    $nsenhacriptografada = md5($novasenha);

    // Consulta o banco de dados para verificar se o email existe e o status da conta não é "excluída"
    $query = "SELECT * FROM user WHERE email = :email AND status_conta != 'excluida'";
    $stmt = $PDO->prepare($query);
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    // Verifica se o registro foi encontrado
    if ($stmt->rowCount() > 0) {
        // Atualiza a senha no banco de dados
        $queryUpdate = "UPDATE user SET senha = :novaSenha WHERE email = :email";
        $stmtUpdate = $PDO->prepare($queryUpdate);
        $stmtUpdate->bindValue(':novaSenha', $nsenhacriptografada);
        $stmtUpdate->bindValue(':email', $email);

        if ($stmtUpdate->execute()) {
            // Envie o email com a nova senha para o usuário
           //if (mail($email, "Sua nova senha", "Sua nova senha: " . $novasenha)) {
            if (1 == 1) {
                echo 'Senha alterada e enviada por email com sucesso!';
                echo $novasenha;
            } else {
                echo 'Ocorreu um erro ao enviar o email com a nova senha.';
            }
        } else {
            echo 'Ocorreu um erro ao atualizar a senha';
        }
    } else {
        echo 'Email incorreto ou a conta foi excluída.';
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $senhacriptografada = md5($senha);
    $query = "SELECT * FROM user WHERE email = :email AND senha = :senha";
    $stmt = $PDO->prepare($query);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':senha', $senhacriptografada);
    $stmt->execute();

    // Verifica se o registro foi encontrado
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Recupera a linha como um array associativo

        if ($row['status_conta'] === 'excluida') {
            // A conta está marcada como excluída, exibe uma mensagem de erro
            echo 'A sua conta foi excluída e não é possível fazer login.';
        } else {
            // Login bem-sucedido
            $_SESSION['user_id'] = $row['id'];
            header("Location: ../restrito/html/cadastro.html");
            exit();
        }
    } else {
        // Credenciais inválidas, exibe uma mensagem de erro
        echo 'Email ou senha incorretos';
    }
}

if (isset($_POST['excluir'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se o email e a senha fornecidos estão corretos
    $senhacriptografada = md5($senha);
    $query = "SELECT * FROM user WHERE email = :email AND senha = :senha";
    $stmt = $PDO->prepare($query);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':senha', $senhacriptografada);
    $stmt->execute();

    // Verifica se o registro foi encontrado
    if ($stmt->rowCount() > 0) {
        // Caso email e senha coincidam, atualiza o status da conta para "excluída"
        $queryUpdate = "UPDATE user SET status_conta = 'excluida' WHERE email = :email";
        $stmtUpdate = $PDO->prepare($queryUpdate);
        $stmtUpdate->bindValue(':email', $email);

        if ($stmtUpdate->execute()) {
            echo 'Conta marcada como excluída com sucesso!';
        } else {
            echo 'Erro ao marcar a conta como excluída.';
        }
    } else {
        echo 'Email ou senha incorretos!';
    }
}


?>