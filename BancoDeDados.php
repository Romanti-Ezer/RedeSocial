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
			
        
			if ($PDO <> null){
				$PDO->exec("set names utf8");
				$sql = "SELECT * FROM usuario WHERE email=:email;";
				$stmt = $PDO->prepare($sql);
				$stmt->bindParam(':email', $email_param);
				$result = $stmt->execute();
				
				if ($stmt->rowCount() == 1){
					echo "<h1>E-mail já cadastrado!</h1>";
					echo "<p>Volte a página inicial para fazer login</p>";
					$url = "index";
				} else{
					$sql = "INSERT INTO usuario(nome,email,senha) VALUES (:nome, :email, :senha);";
					$stmt = $PDO->prepare($sql);
					$stmt->bindParam(':nome', $nome_param);
					$stmt->bindParam(':email', $email_param);
					$stmt->bindParam(':senha', $senha_param);
					$result = $stmt->execute();
			
					echo "<h1>Usuário cadastrado com sucesso!</h1>";
					echo "<p>Aproveite nossa plataforma.</p>";
					
					$url = "perfil";
					$this->carregarID($PDO,$email_param);
				}
				
				header( "refresh:3;url=$url.php" ); 
				echo "<p>Você será redirecionado em 3s. Caso não tenha sido redirecionado, clique <a href='$url.php'>aqui</a>.</p>";
			} else{
				echo "<h1>Erro ao cadastrar o usuário</h1>";
				echo "<p>Não há conexão com o banco de dados!</p>";
				
				header( "refresh:3;url=index.php" ); 
				echo '<p>Você será redirecionado em 3s. Caso não tenha sido redirecionado, clique <a href="index.php">aqui</a>.';
			}
		}
		catch (PDOException $e)
        {
            echo "Erro ao cadastrar usuário: ". $e->getMessage()."FINAL";
        }
	}
	public function salvar($id,$nome, $nome_escola, $local_escola,$local_casa,$relacao,$img){
		try
		{
			$PDO = $this->conectar();    
			$PDO->exec("set names utf8");
			$sql = "UPDATE usuario SET nome=:nome,
											nome_escola=:nome_escola,
											local_escola=:local_escola,
											local_casa=:local_casa,
											relacao=:relacao,
											img=:img WHERE id_usuario=:id";
			$stmt = $PDO->prepare($sql);
			$stmt->bindParam(':id', $id,PDO::PARAM_INT);
			$stmt->bindParam(':nome', $nome);
			$stmt->bindParam(':nome_escola', $nome_escola);
			$stmt->bindParam(':local_escola', $local_escola);
			$stmt->bindParam(':local_casa', $local_casa);
			$stmt->bindParam(':relacao', $relacao);
			$stmt->bindParam(':img', $img);
			$result = $stmt->execute();
			echo "<body onload=\"alert('Alterado com sucesso');window.location='Perfil.php';\">";
			 
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
				
				if ($stmt->rowCount() == 1){
					echo "<h1>Usuário autenticado!</h1>";
					echo "<p>Aproveite nossa plataforma.</p>";
					$url = "perfil.php";
					
					$this->carregarID($PDO, $email_param);
				} else{
					echo "<h1>Dados incorretos, tente novamente<h1>";
					$url = "index.php";
				}
				
				header( "refresh:3;url=$url" ); 
				echo "<p>Você será redirecionado em 3s. Caso não tenha sido redirecionado, clique <a href='$url'>aqui</a>.";
			} else{
				echo "<h1>Erro ao autenticar o usuário</h1>";
				echo "<p>Não há conexão com o banco de dados!</p>";
				
				header( "refresh:3;url=index.php" ); 
				echo '<p>Você será redirecionado em 3s. Caso não tenha sido redirecionado, clique <a href="index.php">aqui</a>.';
			}
		}
		catch (PDOException $e)
        {
            echo "Erro ao autenticar usuário: ". $e->getMessage();
        }
    }
	
	private function carregarID($PDO_param, $email_param){
		$PDO = $PDO_param;
		$PDO->exec("set names utf8");
		$sql = "SELECT id_usuario FROM usuario WHERE email=:email;";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':email', $email_param);
		$result = $stmt->execute();				
		$user = $stmt->fetch(PDO::FETCH_OBJ);
		session_start();
		$_SESSION['uid'] = ($user->id_usuario);	
	}
	
	public function carregarDados($id_usuario){
		$PDO = $this->conectar();
		$PDO->exec("set names utf8");
		$sql = "SELECT * FROM usuario WHERE id_usuario=:id;";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':id', $id_usuario);
		$result = $stmt->execute();				
		$user = $stmt->fetch(PDO::FETCH_OBJ);
		
		return $user;
	}
    
}