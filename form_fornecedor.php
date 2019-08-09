<?php

	include("../View/classeForm.php");
	include("autenticacao.php");
	include("../Model/conexao.php");
	include("../View/classeModal.php");
	
	
	$parametros = null;

	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="fornecedor";
		$coluna[]= "cidade";
		$coluna[]= "pais";
		$coluna[]= "marca";
		$coluna[]= "cnpj";
		$condicao[] = " id_fornecedor=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=fornecedor&id=".$_GET["id"];
	}
	else{
		$resultado[0]["cidade"] = "";
		$resultado[0]["pais"] = "";
		$resultado[0]["marca"] = "";
		$resultado[0]["cnpj"] = "";
		$parametros["action"] = "insere.php?tabela=fornecedor";
	}


	$parametros["method"] = "post";
	
	$f = new Form($parametros);

	$parametros = null;
	$parametros["name"] = "cidade";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["cidade"];
	$parametros["placeholder"] = "Digite a cidade do fornecedor...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "pais";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["pais"];
	$parametros["placeholder"] = "Digite o pais do fornecedor...";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "marca";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["marca"];
	$parametros["placeholder"] = "Digite a marca do produto do fornecedor...";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "cnpj";
	$parametros["type"] = "number";
	$parametros["value"] = $resultado[0]["cnpj"];
	$parametros["placeholder"] = "Digite o cnpj do fornecedor...";	
	$f->add_input($parametros);

	$m = new Modal($f);
	
	$m->exibe();
	
?>
