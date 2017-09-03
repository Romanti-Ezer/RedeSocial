<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bem-vindo</title>
        <link rel="stylesheet" href="src/estilo.css"/>
    </head>
    <body>
        <?php
			require_once 'BancoDeDados.php';
			session_start();
			if (isset($_SESSION['uid'])){
				echo "<a href='logout.php' class='btn'>Encerrar Sessão</a><a href='editar_perfil.php' class='btn'>Editar Perfil</a><br/>";
				echo "<h1>Bem-vindo!</h1>";
				
				$bd = new BancoDeDados;
				$dados = $bd->carregarDados($_SESSION['uid']);
				
				echo "<div class='perfil'>";
				echo "<img src='{$dados->img}'></img>";
				echo "<h2>{$dados->nome}</h2>";
				echo "<p>{$dados->descricao}</p>";
				echo "<p><b>Email</b>: {$dados->email}</p>";
				echo "<p><b>Onde estuda</b>: {$dados->nome_escola} - {$dados->local_escola}</p>";
				echo "<p><b>Onde vive</b>: {$dados->local_casa}</p>";
				echo "<p>{$dados->relacao}</p>";
				echo "</div>";
				
				
			} else{
				echo "<h1>Você não está logado!</h1>";
				echo "<p>Volte a página inicial</p>";
				header( "refresh:3;url=index.php" ); 
				echo '<p>Você será redirecionado em 3s. Caso não tenha sido redirecionado, clique <a href="index.php">aqui</a>.';
			}
		?>
    </body>
</html>
