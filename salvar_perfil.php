<?php
    require_once 'BancoDeDados.php';
    session_start();
    $bd = new BancoDeDados;
    
    $dados = $bd->carregarDados($_SESSION['uid']);
    
    $nome = @$_POST["nome"];
    $nome_escola = @$_POST["nome_escola"];
    $local_escola = @$_POST["local_escola"];
    $local_casa = @$_POST["local_casa"];
    $relacao = @$_POST["relacao"];
    $descricao = @$_POST["descricao"];
    
    $img_name = "";
    
    if(!empty(@$_FILES['arq']['name'])) {
        try{
			$img_name = "imgs/".time("Hisu").".jpg";
			move_uploaded_file(@$_FILES["arq"]["tmp_name"],$img_name) or die(exit());
		}
		catch (Exception $e){
			echo "Erro: ".$e->getMessage();
		}
	}
    else
    {
        $img_name = $dados->img;
    }
    
    $bd->salvar($_SESSION["uid"],$nome, $nome_escola, $local_escola,$local_casa,$relacao,$img_name,$descricao);

?>