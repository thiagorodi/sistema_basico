<?php


	include("../View/classeCabecalho.php");
	$c->exibe_menu();

	include("../View/classeTabela.php");

	include("../Model/classeBancoDeDados.php");
	
	include("form_fornecedor.php");

	$tabela[]="fornecedor";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_FORNECEDOR as ID";
	$coluna[]= "CIDADE as Cidade";
	$coluna[]= "PAIS as Pais";
	$coluna[]= "MARCA as Marca";
	$coluna[]= "CNPJ as Cnpj";


	$condicao = null;
	$ordenacao = "CIDADE";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"fornecedor",0,true);
	
	$t->exibe();

?>

	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/alterar_cidade.js"></script>

</body>
</html>