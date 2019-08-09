<?php


	include("../View/classeCabecalho.php");
	$c->exibe_menu();

	include("../View/classeTabela.php");

	include("../Model/classeBancoDeDados.php");
	
	include("form_produto.php");

	$tabela[]="produto";
	$tabela[]="marca";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_PRODUTO as ID";
	$coluna[]= "NOME_PRODUTO as 'Nome do Produto'";
	$coluna[]= "VALOR_PRODUTO as 'Valor do produto'";
	$coluna[]= "NOME_MARCA as 'Marca do produto'";
			
	$condicao = null;
	$ordenacao = "NOME_PRODUTO";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"produto",0,true);
	
	$t->exibe();

?>