<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login do usuário</title>
		<link rel="stylesheet" href="src/estilo.css"/>
    </head>
    <body>
        <?php
            require_once 'BancoDeDados.php';
            $bd = new BancoDeDados;
			
			$email = $_POST['email']?? "";
			$senha = $_POST['senha']?? "";
			
			$bd->login($email, $senha);
            
        ?>
    </body>
</html>