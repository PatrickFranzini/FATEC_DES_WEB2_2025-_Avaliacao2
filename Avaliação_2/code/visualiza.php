<?php
require_once 'classes/login.php';
require_once 'classes/DB.php'; 

$auth = new login();
$auth->verificar_logado();

$db = new Database();
$produtos = $db->getAllProdutos();
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Produtos Cadastrados</h1>
</div>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Nome do Produto</th><th>Preço</th><th>Descrição</th><th>Categoria</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($produtos as $produto): ?> 
        <tr>
            <td><?= htmlspecialchars($produto['nome_produto']) ?></td> 
            <td><?= htmlspecialchars($produto['preco']) ?></td>
            <td><?= htmlspecialchars($produto['descricao']) ?></td>
            <td><?= htmlspecialchars($produto['categoria']) ?></td>
            <td> 
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
