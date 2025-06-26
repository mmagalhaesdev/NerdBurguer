<?php
    require 'conexaoBanco-Funcionario.php';
    $email = $_POST['email'];
    $senha = $_POST['senha'];

   global $pdo;

        try {
            $sql = "SELECT * FROM funcionario WHERE email = :email AND senha = :senha";
            $stmt = $pdo->prepare($sql); 
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":senha", $senha);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                header("Location: ../Controller/tabela.php");
                exit;
            } 
            else {
                header("Location: ../Controller/formularioLogin -Funcionário.html");
                exit;
            }
        } catch (PDOException $e) {
            echo "Erro no login: " . $e->getMessage();
        }
    
?>