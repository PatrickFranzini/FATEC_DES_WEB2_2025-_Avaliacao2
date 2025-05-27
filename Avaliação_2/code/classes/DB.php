<?php 

class Database {  
   private $host = "localhost";
   private $dbname = "artesanato_db";
   private $username = "root";
   private $password = "";
   private $pdo;

   public function __construct() {
       try {
           $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8";
           $this->pdo = new PDO($dsn, $this->username, $this->password, [
               PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
           ]);
       } catch (PDOException $e) {
           die("Erro ao conectar: " . $e->getMessage());
       }
   }

   public function __destruct() {
       $this->pdo = null;
   }

   public function addProduto($nome, $preco, $descricao, $categoria) {
       $this->execute("INSERT INTO produtos_artesanais (nome_produto, preco, descricao, categoria) VALUES (?, ?, ?, ?)", [
           $nome, $preco, $descricao, $categoria
       ]);
   }

   private function execute($query, $params = []) {
       $stmt = $this->pdo->prepare($query);
       $stmt->execute($params);
       return $stmt;
   }

   
   public function getAllProdutos() {
       $stmt = $this->execute("SELECT * FROM produtos_artesanais");
       return $stmt->fetchAll(PDO::FETCH_ASSOC);  
   }

 
    public function deleteProduto($id) {
    $this->execute("DELETE FROM produtos_artesanais WHERE id = ?", [$id]);
}
}
?>
