<?php
define ('MYSQL_HOST', 'localhost');
define ('MYSQL_USER', 'root');
define ('MYSQL_PASSWORD', '');
define ('MYSQL_DB_NAME', 'rede_social');
            
class BancoDeDados {
    public function conectar(){
        try
        {
            return ($PDO = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD));
        }
        catch (PDOException $e)
        {
            echo "<p>Erro ao conectar-se com o Banco de Dados: ". $e->getMessage()."</p>";
        }
    }
    
    public function cadastrar($nome_param, $email_param, $senha_param){
		try
		{
			$PDO = $this->conectar();
			$sql = "INSERT INTO usuario(nome,email,senha) VALUES (:nome, :email, :senha);";
        
			if ($PDO <> null){
				$stmt = $PDO->prepare($sql);
				$stmt->bindParam(':nome', $nome_param);
				$stmt->bindParam(':email', $email_param);
				$stmt->bindParam(':senha', $senha_param);
				$result = $stmt->execute();
        
				echo "<h1>Usuário cadastrado com sucesso!</h1>";
				echo "<p>Aproveite nossa plataforma.</p>";
				
				header( "refresh:5;url=perfil.php" ); 
				echo '<p>Você será redirecionado em 5s. Caso não tenha sido redirecionado, clique <a href="perfil.php">aqui</a>.';
			} else{
				echo "<h1>Erro ao cadastrar o usuário</h1>";
				echo "<p>Não há conexão com o banco de dados!</p>";
				
				header( "refresh:5;url=index.php" ); 
				echo '<p>Você será redirecionado em 5s. Caso não tenha sido redirecionado, clique <a href="index.php">aqui</a>.';
			}
		}
		catch (PDOException $e)
        {
            echo "Erro ao cadastrar usuário: ". $e->getMessage()."FINAL";
        }
    }
	
	public function login($email_param, $senha_param){
		try
		{
			$PDO = $this->conectar();
			$sql = "SELECT * FROM usuario WHERE email=:email AND senha=:senha;";
        
			if ($PDO <> null){
				$stmt = $PDO->prepare($sql);
				$stmt->bindParam(':email', $email_param);
				$stmt->bindParam(':senha', $senha_param);
				$result = $stmt->execute();
				
				echo "{$stmt->rowCount()}";
				
				if ($stmt->rowCount() == 1){
					echo "<h1>Usuário autenticado!</h1>";
					echo "<p>Aproveite nossa plataforma.</p>";
					$url = "perfil.php";
				} else{
					echo "<h1>Dados incorretos, tente novamente<h1>";
					$url = "index.php";
				}
				
				header( "refresh:5;url=$url" ); 
				echo "<p>Você será redirecionado em 5s. Caso não tenha sido redirecionado, clique <a href='$url'>aqui</a>.";
			} else{
				echo "<h1>Erro ao autenticar o usuário</h1>";
				echo "<p>Não há conexão com o banco de dados!</p>";
				
				header( "refresh:5;url=index.php" ); 
				echo '<p>Você será redirecionado em 5s. Caso não tenha sido redirecionado, clique <a href="index.php">aqui</a>.';
			}
		}
		catch (PDOException $e)
        {
            echo "Erro ao autenticar usuário: ". $e->getMessage()."FINAL";
        }
    }
    
}