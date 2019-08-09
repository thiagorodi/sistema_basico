<?php


	include("../View/classeCabecalho.php");
	$c->exibe_menu();

	include("../View/classeTabela.php");

	include("../Model/classeBancoDeDados.php");
	
	include("form_marca.php");

	$tabela[]="marca";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_MARCA as ID";
	$coluna[]= "NOME_MARCA as 'Nome da Marca'";
	$coluna[]= "PAIS as 'Pais de origem'";

	$condicao = null;
	$ordenacao = "NOME_MARCA";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"marca",0,true);
	
	$t->exibe();

?>