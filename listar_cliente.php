<?php


	include("../View/classeCabecalho.php");
	$c->exibe_menu();

	include("../View/classeTabela.php");

	include("../Model/classeBancoDeDados.php");
	
	include("form_cliente.php");

	$tabela[]="cliente";

	$bd = new BancoDeDados($conexao);

	$coluna[]= "ID_CLIENTE as ID";
	$coluna[]= "NOME_CLIENTE as Nome";
	$coluna[]= "CIDADE as Cidade";
	$coluna[]= "ESTADO as Estado";
	$coluna[]= "SEXO as Sexo";
	$coluna[]= "EMAIL as Email";
	$coluna[]= "DATA_NASCIMENTO as 'Data de Nascimento'";


	$condicao = null;
	$ordenacao = "NOME_CLIENTE";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"cliente",0,true);
	
	$t->exibe();

?>