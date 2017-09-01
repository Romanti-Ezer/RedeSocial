
	
	<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bem-vindo</title>
        <link rel="stylesheet" href="src/estilo.css"/>
    </head>
    <body>
        
        <?php
			session_start();
			if (isset($_SESSION['uid'])){
				unset ($_SESSION['usu']);
				session_destroy();
				echo "<h1>Sessão finalizada!</h1>";
			} else{
				echo "<h1>Você não está logado!</h1>";
				echo "<p>Volte a página inicial</p>";	
			}
			header( "refresh:3;url=index.php" ); 
			echo '<p>Você será redirecionado em 3s. Caso não tenha sido redirecionado, clique <a href="index.php">aqui</a>.';
		?>
    </body>
</html>
