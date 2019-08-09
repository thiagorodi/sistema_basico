<?php

	include("../View/classeForm.php");
	include("autenticacao.php");
	include("../Model/conexao.php");
	include("../View/classeModal.php");
		
	$parametros = null;

	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="venda";
		$coluna[]= "COD_CLIENTE";
		$coluna[]= "COD_TIPO";
		$coluna[]= "COD_MARCA";
		$coluna[]= "COD_PRODUTO";
		$coluna[]= "DATA_VENDA";
		$coluna[]= "VALOR";
		$condicao[] = " id_venda=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=venda&id=".$_GET["id"];
	}
	else{
		$resultado[0]["COD_CLIENTE"] = "";
		$resultado[0]["COD_TIPO"] = "";
		$resultado[0]["COD_MARCA"] = "";
		$resultado[0]["COD_PRODUTO"] = "";
		$resultado[0]["DATA_VENDA"] = "";
		$resultado[0]["VALOR"] = "";
		$parametros["action"] = "insere.php?tabela=venda";
		$parametros["method"] = "post";
		$f = new Form($parametros);
	}

	// TABELA CLIENTE
	$consulta = "SELECT ID_CLIENTE as value, NOME_CLIENTE as label FROM CLIENTE";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	$NOME_CLIENTE = null;
	while($linha = $stmt->fetch()){
		$NOME_CLIENTE[] = $linha;
	}
	$parametros = null;
	$parametros["name"] = "COD_CLIENTE";
	$parametros["label"] = "Cliente";
	$f->add_select($parametros, $NOME_CLIENTE, null);


	// TABELA PAGAMENTO
	$consulta = "SELECT ID_TIPO as value, FORMA_PAGAMENTO as label FROM TIPO_PAGAMENTO";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	$FORMA_PAGAMENTO = null;
	while($linha = $stmt->fetch()){
		$FORMA_PAGAMENTO[] = $linha;
	}
	$parametros = null;
	$parametros["name"] = "COD_TIPO";
	$parametros["label"] = "Pagamento";
	$f->add_select($parametros, $FORMA_PAGAMENTO, null);


	// TABELA MARCA
	$consulta = "SELECT ID_MARCA as value, NOME_MARCA as label FROM MARCA";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	$NOME_MARCA = null;
	while($linha = $stmt->fetch()){
		$NOME_MARCA[] = $linha;
	}
	$parametros = null;
	$parametros["name"] = "COD_MARCA";
	$parametros["label"] = "Marca";
	$f->add_select($parametros, $NOME_MARCA, null);


	// TABELA PRODUTO
	$consulta = "SELECT ID_PRODUTO as value, NOME_PRODUTO as label FROM produto";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	$NOME_PRODUTO = null;
	while($linha = $stmt->fetch()){
		$NOME_PRODUTO[] = $linha;
	}
	$parametros = null;
	$parametros["name"] = "COD_PRODUTO";
	$parametros["label"] = "Produto";
	$f->add_select($parametros, $NOME_PRODUTO, null);	

	//TABELA VENDA
	$parametros = null;
	$parametros["name"] = "DATA_VENDA";
	$parametros["type"] = "date";
	$parametros["placeholder"] = "Insira a data da venda";	
	$f->add_input($parametros);

	//TABELA PRODUTO
	$consulta = "SELECT ID_PRODUTO as value, VALOR_PRODUTO as label FROM produto";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	$VALOR_PRODUTO = null;
	while($linha = $stmt->fetch()){
		$VALOR_PRODUTO[] = $linha;
	}
	$parametros = null;
	$parametros["name"] = "VALOR_PRODUTO";
	$parametros["label"] = "Valor";
	$f->add_select($parametros, $VALOR_PRODUTO, null);
	
	$m = new Modal($f);
	
	$m->exibe();
	
?>
