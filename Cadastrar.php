<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de usuário</title>
		<link rel="stylesheet" href="src/estilo.css"/>
    </head>
    <body>
        <?php
            require_once 'BancoDeDados.php';
            $bd = new BancoDeDados;
			
			$nome = $_POST['nome']??  "";
			$email = $_POST['email']?? "";
			$senha = $_POST['senha']?? "";
			
			$bd->cadastrar($nome, $email, $senha);
            
        ?>
    </body>
</html>
