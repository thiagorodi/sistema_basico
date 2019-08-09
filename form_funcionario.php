<?php

	include("../View/classeForm.php");
	include("autenticacao.php");
	include("../Model/conexao.php");
	include("../View/classeModal.php");
		
	$parametros = null;

	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="funcionario";
		$coluna[]= "nome_funcionario";
		$coluna[]= "sexo";
		$coluna[]= "email";
		$coluna[]= "data_nascimento";
		$condicao[] = " id_funcionario=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=funcionario&id=".$_GET["id"];
	}
	else{
		$resultado[0]["nome_funcionario"] = "";
		$resultado[0]["sexo"] = "";
		$resultado[0]["email"] = "";
		$resultado[0]["data_nascimento"] = "";
		$parametros["action"] = "insere.php?tabela=funcionario";
	}


	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "nome_funcionario";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["nome_funcionario"];
	$parametros["placeholder"] = "Digite o nome do cliente...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "sexo";
	$parametros["type"] = "radio";
	$parametros["opcoes"] = array("m"=>"Masc.","f"=>"Fem.");
	$parametros["label"] = "Sexo";
	$parametros["value"] = $resultado[0]["sexo"];	
	$f->add_inputOpcoes($parametros);
	
	$parametros = null;
	$parametros["name"] = "email";
	$parametros["type"] = "email";
	$parametros["value"] = $resultado[0]["email"];	
	$parametros["placeholder"] = "Digite o email do cliente...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "data_nascimento";
	$parametros["type"] = "date";
	$parametros["value"] = $resultado[0]["data_nascimento"];	
	$parametros["label"] = "Data de Nascimento";	
	$f->add_input($parametros);

	
	$m = new Modal($f);
	
	$m->exibe();
	
?>
