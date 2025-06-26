<?php

session_start();
require('../Model/conexaoBanco-Cliente.php');

$id_cliente = isset($_SESSION['id']) ? $_SESSION['id'] : 1;
$mensagem ='';
$mostrar_alerta = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produto'])) {
    $produto = $_POST['produto'];
    $sql = "UPDATE clientes SET compra = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$produto, $id_cliente])) {
        header("Location: ../View/home.html");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylec.css">
    <title>Cardápio</title>
</head>
<body>
<header>
    <div class="container">
        <div class="menu">
            <ul>
                <li><a href="../Controller/formularioCadastro.html">Cadastro</a></li>
                <li><a href="../Controller/formularioLogin -Funcionário.html">Funcionários</a></li>
                <li><a href="home.html">Home</a></li>
            </ul>
        </div>
    </div>
</header>
<br><br>
<section style="padding-left: 50px; padding-right: 10px; text-align: justify;">
    <h1>Apresentação da Sessão Cardápio</h1><br><br>
    <p>Bem-vindo ao nosso Cardápio NerdBurguer, onde cada prato é uma verdadeira homenagem ao universo dos games! Aqui você encontra uma seleção especial de hambúrgueres artesanais, bebidas refrescantes, batatas crocantes e sobremesas temáticas, todas preparadas com ingredientes frescos e muito sabor. Navegue pelas nossas opções e descubra combinações únicas que vão elevar sua experiência gamer a um novo nível de sabor e diversão. Prepare-se para um verdadeiro level up no seu paladar!</p>
</section><br><br>
<?$mensagem = $mensagem ?>
<section>
    <form method="POST">
        <div class="t1">
            <div class="comida" style=" padding-left: 50px; padding-right: 10px;">
                <div class="imagem">
                    <img src="img/burguer1.jpeg">
                </div>
                <div class="text" style=" padding-right: 150px;">
                    <h1>Mario Burguer</h1>
                    <p>Hambúrguer vegetariano com cogumelos grelhados, queijo suiço, rúcula e maionese de ervas.</p>
                </div>
                <div class="comprar">
                    <button type="submit" name="produto" value="Mario Burguer">Comprar</button>
                </div>
            </div>
            <div class="comida" style="padding-left: 100px;padding-right: 50px;">
                <div class="imagem">
                    <img src="img/burguer2.jpeg">
                </div>
                <div class="text">
                    <h1>Mana Potion</h1>
                    <p>Blueberry com toque de hortelã, feito com frutas frescas e ingredientes naturais.</p>
                </div>
                <div class="comprar">
                    <button type="submit" name="produto" value="Mana Potion">Comprar</button>
                </div>
            </div>
        </div><br><br>
        <div class="t2">
            <div class="comida" style=" padding-left: 50px; padding-right: 50px;">
                <div class="imagem">
                    <img src="img/burguer3.jpeg">
                </div>
                <div class="text"  style=" padding-right: 150px;">
                    <h1>Power-Up Fries</h1>
                    <p>Batatas fritas crocantes temperadas com ervas finas e queijo parmesão ralado...</p>
                </div>
                <div class="comprar">
                    <button type="submit" name="produto" value="Power-Up Fries">Comprar</button>
                </div>
            </div>
            <div class="comida" style=" padding-left: 50px; padding-right: 50px;">
                <div class="imagem">
                    <img src="img/burguer4.jpeg">
                </div>
                <div class="text"  style=" padding-right: 150px;">
                    <h1>Power-Up Fries</h1>
                    <p>Batatas fritas crocantes temperadas com ervas finas e queijo parmesão ralado...</p>
                </div>
                <div class="comprar">
                    <button type="submit" name="produto" value="Power-Up Fries">Comprar</button>
                </div>
            </div>
        </div>
    </form>
</section>
<section class="nav">
    <div class="navbar">
        <p>&copy; 2025 NerdBurguer. Todos os direitos reservados.</p>
        <p>Level up no sabor, respawn na diversão!</p>
    </div>
</section>
</body>
</html>
