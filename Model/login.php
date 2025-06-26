<?php
session_start(); 

require 'conexaoBanco-Cliente.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

try {
    $sql = "SELECT * FROM clientes WHERE email = :email AND senha = :senha";
    $stmt = $pdo->prepare($sql); 
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":senha", $senha);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['id'] = $usuario['id'];

        header("Location: ../View/cardapio.php");
        exit;
    } else {
        header("Location: ../Controller/formularioLogin - Cliente.html");
        exit;
    }
} catch (PDOException $e) {
    echo "Erro no login: " . $e->getMessage();
}
?>
