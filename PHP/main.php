
<?php
session_start();
require 'usuarios/connectionDB.php';

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
            echo "<script type= 'text/javascript'>alert('Usuário cadastrado com sucesso!');";
            echo "javascript:window.location='../HTML/usuarios/signup.php';</script>";
        } else {
            echo "<script type= 'text/javascript'>alert('Erro ao criar usuário!');";
            echo "javascript:window.location='../HTML/usuarios/signup.php';</script>";
           
        }
    } else {
        // Senhas não conferem, exibe na tela
        echo "<script type= 'text/javascript'>alert('As senhas não conferem');";
        echo "javascript:window.location='../HTML/usuarios/signup.php';</script>";
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
            echo "<script type='text/javascript'>alert('Ocorreu um erro ao alterar a senha!');";
            echo "window.location='../HTML/usuarios/alterarsenha.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Senha alterada com sucesso!');";
            echo "window.location='../HTML/usuarios/alterarsenha.php';</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Email ou senha incorretos');";
        echo "window.location='../HTML/usuarios/alterarsenha.php';</script>";
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
                echo "<script type='text/javascript'>alert('Senha alterada com sucesso: " . $novasenha . "');";
                echo "window.location='../HTML/usuarios/esquecisenha.php';</script>";
                
            } else {
                echo "<script type='text/javascript'>alert('ocorreu um erro ao enviar e-mail com nova senha');";
                echo "window.location='../HTML/usuarios/esquecisenha.php';</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Ocorreu um erro ao atuaizar a senha!');";
                echo "window.location='../HTML/usuarios/esquecisenha.php';</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('E-mail incorreto ou a senha foi excluida!');";
                echo "window.location='../HTML/usuarios/esquecisenha.php';</script>";
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
            echo "<script type= 'text/javascript'>alert('Sua conta foi excluida, não foi possivel fazer login!');";
            echo "javascript:window.location='../HTML/usuarios/login.php';</script>";
        } else {
            // Login bem-sucedido
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['statuslogin'] = 'true';
            header("Location: ../HTML/dispositivos/cadastro.php");
            exit();
        }
    } else {
        // Credenciais inválidas, exibe uma mensagem de erro
        echo "<script type= 'text/javascript'>alert('E-mail ou senha incorretos!');";
        echo "javascript:window.location='../HTML/usuarios/login.php';</script>";
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
            echo "<script type= 'text/javascript'>alert('Conta marcada como excluida com sucesso!');";
            echo "javascript:window.location='../HTML/usuarios/excluir.php';</script>";
        } else {
            echo "<script type= 'text/javascript'>alert('Erro ao marcar conta como excluida!');";
            echo "javascript:window.location='../HTML/usuarios/excluir.php';</script>";
        }
    } else {
        echo "<script type= 'text/javascript'>alert('E-mail ou senha incorretos!');";
        echo "javascript:window.location='../HTML/usuarios/excluir.php';</script>";
    }
}


?>