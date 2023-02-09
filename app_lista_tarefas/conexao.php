<?php 
    class Conexao {

        public $host = 'localhost';
        public $dbname = 'php_com_pdo';
        public $user = 'root';
        public $pass = '123';
        public $port = '3306';

        public function conectar() {
            try {
                $conexao = new PDO(
                    "mysql:host={$this->host};port={$this->port};dbname={$this->dbname}",
                    $this->user,
                    $this->pass
                );
                return $conexao;

            } catch(PDOException $e) {
                echo '<p>'.$e->getMessage().'</p>';
            }
        }
    }
?>
