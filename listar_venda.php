<?php


	include("../View/classeCabecalho.php");
	$c->exibe_menu();

	include("../View/classeTabela.php");

	include("../Model/classeBancoDeDados.php");
	
	include("form_venda.php");

	$tabela[]="VENDA";
	$tabela[]="CLIENTE";
	$tabela[]="PRODUTO";
	$tabela[]="MARCA";
	$tabela[]="TIPO_PAGAMENTO";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_VENDA as Nome";
	$coluna[]= "NOME_CLIENTE as Nome";
	$coluna[]= "FORMA_PAGAMENTO as Pagamento";
	$coluna[]= "NOME_PRODUTO as Produto";
	$coluna[]= "DATA_VENDA as Data";
	$coluna[]= "produto.VALOR as Valor";
			
	$condicao = null;
	$ordenacao = "ID_VENDA";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$t = new Tabela($m,"venda",0,true);
	
	$t->exibe();

?>

    <script src="../js/pagamento.js"></script>

</body>
</html>