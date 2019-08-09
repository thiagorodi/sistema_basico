<?php

	include("../View/classeCabecalho.php");
	include("../Model/classeBancoDeDados.php");
	$c->exibe_menu();
	$operacao = new BancoDeDados($conexao);

	$operacao->remocao($_GET["tabela"],$_GET["id"]);


	echo $_GET["tabela"]." removido(a) com sucesso.";


?>