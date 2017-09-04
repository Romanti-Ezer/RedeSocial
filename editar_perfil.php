<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bem-vindo</title>
        <link rel="stylesheet" href="src/estilo.css"/>
    </head>
    <body>
	<form action="salvar_perfil.php" method="POST" enctype="multipart/form-data" class="for_alterar">
        <?php
			require_once 'BancoDeDados.php';
			session_start();
			if (isset($_SESSION['uid'])){
				echo "<a href='logout.php' class='btn'>Encerrar Sessão</a><a href='perfil.php' class='btn'>Voltar</a><br/>";
				echo "<h1>Bem-vindo!</h1>";
				
				$bd = new BancoDeDados;
				$dados = $bd->carregarDados($_SESSION['uid']);
				
				echo "<div class='perfil'>
				 <img src='{$dados->img}'></img>
				 <p><input type=\"file\" name=\"arq\"></p>
				 <p>Nome<input type=\"text\" value=\"{$dados->nome}\" name=\"nome\"></p>
				 <p><b>Email</b>: {$dados->email}</p>
				 <p>Nome da escola<input type=\"text\" value=\"{$dados->nome_escola}\" name=\"nome_escola\"></p>
				 <p>Local da escola<input type=\"text\" value=\"{$dados->local_escola}\" name=\"local_escola\"></p>
				 <p>Onde vive<input type=\"text\" value=\"{$dados->local_casa}\" name=\"local_casa\"></p>
				 <p>Relação<input type=\"text\" value=\"{$dados->relacao}\" name=\"relacao\"></p>
				 <p>Descrição<textarea name=\"descricao\" id=\"textarea\">{$dados->descricao}</textarea></p>
				 <center><button>Salvar</button></center>
				 </div>
				 </form>";
				
				
			} else{
				echo "<h1>Você não está logado!</h1>";
				echo "<p>Volte a página inicial</p>";
				header( "refresh:3;url=index.php" ); 
				echo '<p>Você será redirecionado em 3s. Caso não tenha sido redirecionado, clique <a href="index.php">aqui</a>.';
			}
		?>
		
    </body>
</html>
