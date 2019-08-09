<?php

include("../View/classeCabecalho.php");
include("../Model/classeBancoDeDados.php");
	
	$operacao = new BancoDeDados($conexao);
	
	$operacao->alterar($_POST,$_GET["tabela"],$_GET["id"]);
	
	
	echo $_GET["tabela"]." alterado(a) com sucesso.";


?>