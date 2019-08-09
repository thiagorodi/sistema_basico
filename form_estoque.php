<?php

	include("../View/classeForm.php");
	include("autenticacao.php");
	include("../Model/conexao.php");
	include("../View/classeModal.php");
	
	$parametros = null;

	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="estoque";
		$coluna[]= "ID_ESTOQUE";
		$coluna[]= "COD_PRODUTO";
		$coluna[]= "QTDE";
		$coluna[]= "VALOR_PRODUTO";
		$condicao[] = " id_estoque=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=estoque&id=".$_GET["id"];
	}
	else{
		$resultado[0]["ID_ESTOQUE"] = "";
		$resultado[0]["COD_PRODUTO"] = "";
		$resultado[0]["QTDE"] = "";
		$resultado[0]["VALOR_PRODUTO"] = "";
		$parametros["action"] = "insere.php?tabela=estoque";
	}

	$parametros["method"] = "post";

	$f = new Form($parametros);

	$consulta = "SELECT ID_PRODUTO as value, NOME_PRODUTO as label FROM PRODUTO";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	$NOME_PRODUTO = null;
	while($linha = $stmt->fetch()){
		$NOME_PRODUTO[] = $linha;
	}
	$parametros = null;
	$parametros["name"] = "COD_PRODUTO";
	$parametros["label"] = "Nome do produto";
	$f->add_select($parametros, $NOME_PRODUTO, null);

	$parametros = null;
	$parametros["name"] = "QTDE";
	$parametros["type"] = "number";
	$parametros["value"] = $resultado[0]["QTDE"];	
	$parametros["label"] = "Quantidade do produto";	
	$f->add_input($parametros);

    $parametros = null;
	$parametros["name"] = "VALOR_PRODUTO";
	$parametros["type"] = "number";
	$parametros["value"] = $resultado[0]["VALOR_PRODUTO"];	
	$parametros["label"] = "Valor do produto";	
	$f->add_input($parametros);
	
	$m = new Modal($f);
	
	$m->exibe();
	
?>
