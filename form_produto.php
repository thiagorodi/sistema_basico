<?php

	include("../View/classeForm.php");
	include("autenticacao.php");
	include("../Model/conexao.php");
	include("../View/classeModal.php");
		
	$parametros = null;

	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="produto";
        $coluna[]= "nome_produto";
		$coluna[]= "valor_produto";
		$coluna[]= "cod_marca";
		$condicao[] = " id_produto=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=produto&id=".$_GET["id"];
	}
	else{
        $resultado[0]["nome_produto"] = "";
		$resultado[0]["valor_produto"] = "";
		$resultado[0]["cod_marca"] = "";
		$parametros["action"] = "insere.php?tabela=produto";
		$parametros["method"] = "post";
		$f = new Form($parametros);
	}

	$parametros = null;
	$parametros["name"] = "nome_produto";
	$parametros["type"] = "text";
	$parametros["label"] = "Insira o nome do produto";
    $f->add_input($parametros);
    
    $parametros = null;
	$parametros["name"] = "valor_produto";
	$parametros["type"] = "number";
	$parametros["label"] = "Valor do produto";	
    $f->add_input($parametros);
    
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
	
	$m = new Modal($f);
	
	$m->exibe();
	
?>
