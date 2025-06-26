<?php
global $pdo;
require('conexaoBanco-Cliente.php');
try{
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];
    $compra = "";         
    $entregador = "";     
    $hora_pedido = "";

    $sql = "insert into clientes (nome,email,senha,endereco,compra,entregador,hora_pedido) values (:nome, :email,:senha,:endereco,:compra,:entregador,:hora_pedido)";
    $stmt = $pdo->prepare($sql);
    $stmt ->bindValue(":nome", $nome);
    $stmt ->bindValue(":email", $email);
    $stmt ->bindValue(":senha", $senha);
    $stmt ->bindValue(":endereco", $endereco);
    $stmt->bindValue(":compra", $compra);
    $stmt->bindValue(":entregador", $entregador);
    $stmt->bindValue(":hora_pedido", $hora_pedido);
    $stmt->execute();

     if ($stmt->rowCount() > 0) {
        header("Location: ../View/home.html");
        exit;
    } 
    else {
        header("Location: ../Controller/formularioCadastro.html");
        exit;
    }
}
catch(PDOException $e){
    echo "Erro: " . $e->getMessage();
}
?>