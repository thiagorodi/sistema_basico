<?php

	include("../View/classeForm.php");
	include("autenticacao.php");
	include("../Model/conexao.php");
	include("../View/classeModal.php");
	
	$parametros = null;

	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="estoque";
		$coluna[]= "NOME_MARCA";
		$coluna[]= "PAIS";
		$condicao[] = " id_marca=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=marca&id=".$_GET["id"];
	}
	else{
		$resultado[0]["NOME_MARCA"] = "";
		$resultado[0]["PAIS"] = "";
		$parametros["action"] = "insere.php?tabela=marca";
	}

	$parametros["method"] = "post";

	$f = new Form($parametros);

	$parametros = null;
	$parametros["name"] = "NOME_MARCA";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite o nome da marca...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "PAIS";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite o pais de origem...";	
	$f->add_input($parametros);
	
	$m = new Modal($f);
	
	$m->exibe();
	
?>
