<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=Cliente','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e) {
 echo "Erro na conexão no banco Cliente: " . $e->getMessage();
}
?>