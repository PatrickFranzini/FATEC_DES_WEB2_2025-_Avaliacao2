<?php
require_once 'classes/DB.php';
require_once 'classes/login.php';
class DB extends Database {

    public function deleteProduto($id) {
        $this->execute("DELETE FROM produtos_artesanais WHERE id = ?", [$id]);
    }

    public function getAllProdutos() {
        return $this->getAllProdutos();
    }
}
?>
<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Nome do Produto</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Categoria</th>
            <th>Ações</th>
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
                    <a href="?id=<?= $produto['id'] ?>" 
                       onclick="return confirm('Tem certeza que deseja excluir este produto?');" 
                       class="btn btn-danger btn-sm">
                       Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
