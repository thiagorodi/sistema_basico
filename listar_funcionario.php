<?php


	include("../View/classeCabecalho.php");
	$c->exibe_menu();

	include("../View/classeTabela.php");

	include("../Model/classeBancoDeDados.php");
	
	include("form_funcionario.php");

	$tabela[]="funcionario";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_FUNCIONARIO as ID";
	$coluna[]= "NOME_FUNCIONARIO as Nome";
	$coluna[]= "SEXO as Sexo";
	$coluna[]= "EMAIL as Email";
	$coluna[]= "DATA_NASCIMENTO as 'Data de Nascimento'";


	$condicao = null;
	$ordenacao = "NOME_FUNCIONARIO";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"funcionario",0,true);
	
	$t->exibe();

?>