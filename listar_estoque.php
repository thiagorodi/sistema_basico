<?php


	include("../View/classeCabecalho.php");
	$c->exibe_menu();

	include("../View/classeTabela.php");

	include("../Model/classeBancoDeDados.php");
	
	include("form_estoque.php");

	$tabela[]="estoque";
	$tabela[]="produto";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_ESTOQUE as ID";
	$coluna[]= "NOME_PRODUTO as 'Nome do Produto'";
	$coluna[]= "QTDE as 'Quantidade do Produto'";
	$coluna[]= "estoque.VALOR_PRODUTO as 'Valor do Produto'";

	$condicao = null;
	$ordenacao = "ID_ESTOQUE";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"estoque",true,true);
	
	$t->exibe();

?>