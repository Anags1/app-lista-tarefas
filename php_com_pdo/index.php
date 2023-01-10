<?php

    if(!empty($_POST['usuario']) && !empty($_POST['senha'])) {

        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        // echo phpinfo() and exit;
        $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
        $usuario = 'root';
        $senha = '123';
        
        try {
            $conexao = new PDO($dsn, $usuario, $senha);
        
        $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           // print_r($conexao);
            
            $query = "select * from tb_usuarios where ";
            $query .= " email = ':usuario' ";
            $query .= " AND senha = ':senha' ";

            $statement = $conexao->prepare($query);
     
            //echo '<pre>';
            //print_r($statement);
            //echo '</pre>';

            $statement->bindValue(':usuario', $_POST['usuario']);
            $statement->bindValue(':senha', $_POST['senha']);

            $statement->execute();

           // echo '<pre>';
           // print_r($resultado_query);
           // echo '</pre>';

           // echo '<pre>';
           // print_r($statement);
           // echo '</pre>';
            
            $usuario = $statement->fetch();

            echo '<pre>';
            print_r($usuario);
            echo '</pre>';



            /*
            echo $query;

            //$statement = $conexao->query($query);
            //$usuario = $statement->fetch();
            echo '<hr >';

            echo '<pre>';
            //print_r($usuario);
            echo '</pre>';
           
            $query = "insert into tb_usuarios(nome, email, senha)values(Maria, maria@teste.com, 1234)";
            $conexao->query($query);

            $query = "insert into tb_usuarios(nome, email, senha)values(Julio, julio@teste.com, 1234)";
            $conexao->query($query);

            $query = "insert into tb_usuarios(nome, email, senha)values(davi, davi@teste.com, 1234)";
            $conexao->query($query);
            */


        } catch(PDOException $e) {
            echo 'Erro: '.$e->getCode().' Mensagem '.$e->getMessage();
        }
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body>
        <form method="post" action="index.php">
            <input type="text" placeholder="usuário" name="usuario" /> 
            <input type="password" placeholder="senha" name="senha" />

            <button type="submit">Entrar</button>
        </form>
    </body>
</html>
