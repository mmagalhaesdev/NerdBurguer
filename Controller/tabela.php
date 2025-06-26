<?php
require '../Model/conexaoBanco-Cliente.php';

function listarClientes($pdo) {
    $stmt = $pdo->query("SELECT * FROM clientes ORDER BY id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarClientePorId($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function atualizarCliente($pdo, $id, $nome, $email, $endereco, $compra) {
    $stmt = $pdo->prepare("UPDATE clientes SET nome=?, email=?, endereco=?, compra=? WHERE id=?");
    $stmt->execute([$nome, $email, $endereco, $compra, $id]);
}

function excluirCliente($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM clientes WHERE id=?");
    $stmt->execute([$id]);
}

if (isset($_GET['excluir'])) {
    $idExcluir = intval($_GET['excluir']);
    excluirCliente($pdo, $idExcluir);
    header("Location: clientes.php");
    exit;
}

if (isset($_POST['atualizar'])) {
    $id = intval($_POST['id']);
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $compra = $_POST['compra'] ?? '';

    atualizarCliente($pdo, $id, $nome, $email, $endereco, $compra);
    header("Location: clientes.php");
    exit;
}

$clienteEditar = null;
if (isset($_GET['editar'])) {
    $idEditar = intval($_GET['editar']);
    $clienteEditar = buscarClientePorId($pdo, $idEditar);
    if (!$clienteEditar) {
        die("Cliente não encontrado.");
    }
}


$clientes = listarClientes($pdo);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Gerenciar Clientes</title>
    <link rel="stylesheet" href="../View/css/style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        button {
            padding: 5px 12px;
            border: none;
            cursor: pointer;
        }
        .btn-editar {
            background-color: #4CAF50;
            color: white;
        }
        .btn-excluir {
            background-color: #f44336;
            color: white;
        }
        form {
            width: 90%;
            margin: 20px auto;
            padding: 15px;
            border: 1px solid #ccc;
            background: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 6px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
<header>
        <div class="container">
             <div class="menu">
                <ul>
                    <li><a href="../Controller/formularioCadastro.html">Cadastro</a></li>
                    <li><a href="../Controller/formularioLogin - Cliente.html">Delivery</a></li>
                    <li><a href="../View/home.html">Home</a></li>
                </ul>
             </div>

        </div>
    </header>
    <br>
    <br>
<h2 style="text-align:center;">Lista de Clientes</h2>

<table>
    <tr>
        <th>ID</th><th>Nome</th><th>Email</th><th>Endereço</th><th>Compra</th><th>Ações</th>
    </tr>
    <?php if (count($clientes) > 0): ?>
        <?php foreach ($clientes as $c): ?>
        <tr>
            <td><?= htmlspecialchars($c['id']) ?></td>
            <td><?= htmlspecialchars($c['nome']) ?></td>
            <td><?= htmlspecialchars($c['email']) ?></td>
            <td><?= htmlspecialchars($c['endereco']) ?></td>
            <td><?= htmlspecialchars($c['compra']) ?></td>
            <td>
                <a href="?editar=<?= $c['id'] ?>"><button class="btn-editar">Editar</button></a>
                <a href="?excluir=<?= $c['id'] ?>" onclick="return confirm('Confirma exclusão?')">
                    <button class="btn-excluir">Excluir</button>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6" style="text-align:center;">Nenhum cliente cadastrado.</td></tr>
    <?php endif; ?>
</table>

<?php if ($clienteEditar): ?>
    <h2 style="text-align:center;">Editar Cliente ID <?= $clienteEditar['id'] ?></h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?= $clienteEditar['id'] ?>" />
        <label>
            Nome:
            <input type="text" name="nome" value="<?= htmlspecialchars($clienteEditar['nome']) ?>" required />
        </label>
        <label>
            Email:
            <input type="email" name="email" value="<?= htmlspecialchars($clienteEditar['email']) ?>" required />
        </label>
        <label>
            Endereço:
            <input type="text" name="endereco" value="<?= htmlspecialchars($clienteEditar['endereco']) ?>" />
        </label>
        <label>
            Compra:
            <input type="text" name="compra" value="<?= htmlspecialchars($clienteEditar['compra']) ?>" />
        </label>
        <button type="submit" name="atualizar">Salvar Alterações</button>
    </form>
<?php endif; ?>

</body>
</html>
