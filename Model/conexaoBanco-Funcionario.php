<?php
try{
    global $pdo;
    $pdo = new PDO('mysql:host=localhost;dbname=Funcionario','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão com o banco Funcionário bem-sucedida!";
    $sql = $pdo->query("Select *from funcionario");
}
catch(PDOException $e){
     echo "Erro na conexão no banco Funcionario: " . $e->getMessage();
}
?>