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
				echo "<h1>Você já está logado!</h1>";
				header( "refresh:5;url=perfil.php" ); 
				echo '<p>Você será redirecionado para o seu perfil em 3s. Caso não tenha sido redirecionado, clique <a href="perfil.php">aqui</a>.';
			}
		?>
        <h1>Bem-vindo!</h1>
            <div class="formulario">
                <form method="post" action="Cadastrar.php">
                    <h2>Cadastre-se</h2>
                    <input type="text" placeholder="Nome completo" name="nome" required="required"/>
                    <input type="text" placeholder="Endereço de e-mail" name="email" required="required"/>
					<input type="password" placeholder="Senha" name="senha" required="required"/>
                    <a href="#"><button>Criar conta</button></a>					
                </form>
                
                <h2>Já possui uma conta?</h2>
                
                <form method="post" action="Login.php">
                    <input type="text" placeholder="E-mail" name="email" required="required"/>
                    <input type="password" placeholder="Senha" name="senha" required="required"/>
                    <button>Fazer Login</button>      
                </form>
            </div>
    </body>
</html>
