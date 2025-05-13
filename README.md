Sistema de Cadastro de Produtos Artesanais
Este é um sistema web simples desenvolvido em PHP para cadastro e gerenciamento de produtos artesanais, com conexão a um banco de dados MySQL.

📁 Estrutura do Projeto
4f2f666e-8291-4c36-a258-4d9feda3688d.php: Página de cadastro de produtos. Possui um formulário HTML e validação básica.

76b50ccd-687b-4bcd-8172-e2ce3d6f829e.php: Classe Database, que realiza a conexão com o banco de dados e oferece métodos para inserir, buscar e deletar produtos.

classes/login.php: Referenciado mas não fornecido. Presume-se que faça a autenticação de usuários.

⚙️ Funcionalidades
Cadastro de produtos com:

Nome

Preço

Descrição

Categoria

Validação dos campos obrigatórios

Inserção dos dados no banco artesanato_db, tabela produtos_artesanais

Redirecionamento automático após o cadastro

Sistema básico de autenticação (requer a classe login.php)

🧱 Requisitos
PHP 7.0 ou superior

MySQL

Servidor local (como XAMPP, WAMP ou similar)

🔌 Configuração
Crie o banco de dados:

sql
Copiar
Editar
CREATE DATABASE artesanato_db;
Crie a tabela necessária:

sql
Copiar
Editar
CREATE TABLE produtos_artesanais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(255) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    descricao TEXT NOT NULL,
    categoria VARCHAR(100) NOT NULL
);
Ajuste o arquivo de configuração da classe Database se necessário (usuário, senha, host).

Importe ou crie o arquivo login.php na pasta classes/ para o controle de sessões.

📌 Observações
O sistema faz uso de sessões para verificação de login, portanto o arquivo login.php precisa implementar métodos como verificar_logado().

O projeto não possui rotas ou MVC estruturado, sendo ideal para fins educacionais ou protótipos simples.
