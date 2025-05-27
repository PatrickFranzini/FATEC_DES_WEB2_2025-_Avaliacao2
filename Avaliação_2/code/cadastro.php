<?php
require_once 'classes/login.php';
require_once 'classes/DB.php'; 
$auth = new login();
$auth->verificar_logado();

$db = new Database(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        !isset($_POST['nome'], $_POST['preco'], $_POST['descricao'], $_POST['categoria']) ||
        empty(trim($_POST['nome'])) ||
        empty(trim($_POST['preco'])) ||
        empty(trim($_POST['descricao'])) ||
        empty(trim($_POST['categoria']))
    ) {
        $erro = "Todos os campos são obrigatórios.";
    } else {
        $db->addProduto($_POST['nome'], $_POST['preco'], $_POST['descricao'], $_POST['categoria']);
        header("Location: index.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        .form-container {
            width: 400px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }
        .form-container h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .btn-group {
            margin-top: 20px;
            text-align: center;
        }
        .btn {
            padding: 8px 16px;
            margin: 0 5px;
            cursor: pointer;
        }
        .btn-success {
            background-color: green;
            color: white;
            border: none;
        }
        .btn-secondary {
            background-color: gray;
            color: white;
            border: none;
        }
        .error {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>CADASTRAR PRODUTO</h2>
    <?php if (isset($erro)): ?>
        <div class="error"><?php echo $erro; ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="form-group">
            <label>Nome do Produto</label>
            <input type="text" name="nome" required>
        </div>
        <div class="form-group">
            <label>Preço</label>
            <input type="number" step="0.01" name="preco" required>
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <textarea name="descricao" required></textarea>
        </div>
        <div class="form-group">
            <label>Categoria</label>
            <input type="text" name="categoria" required>
        </div>
        <div class="btn-group">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>
