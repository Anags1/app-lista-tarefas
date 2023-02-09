<?php
    class TarefaService {
        public $conexao;
        public $tarefa;

        public function __construct(Conexao $conexao, Tarefa $tarefa) {

            
            $this->conexao = $conexao->conectar();

            $this->tarefa = $tarefa;
        }

        public function inserir() {
            $query = 'insert into tarefas(tarefa)values(:tarefa)';
            $statement = $this->conexao->prepare($query);
            $statement->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
            $statement->execute();
        }

        public function recuperar() {
            $query = '
                select 
                    t.id, s.status, t.tarefa 
                from
                    tarefas as t
                     left join tb_status as s on (t.id_status = s.id)
             ';
            
            $statement = $this->conexao->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }

        public function atualizar() {
            $query = "update tarefas set tarefa = ? where id = ?";
            $statement = $this->conexao->prepare($query);
            $statement->bindValue(1, $this->tarefa)->__get('tarefa');
            $statement->bindValue(2, $this->tarefa)->__get('id');
            return $statement->execute();
        }

        public function remover() {

        }
  
    }
?>
