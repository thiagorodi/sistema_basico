<?php

    include("../model/classeBancoDeDados.php");

    $op=new BancoDeDados($conexao);

    $tabela[] = "produto";
    $coluna[] = "VALOR_PRODUTO";
    $condicao[] = "id_produto=".$_POST["COD_PRODUTO"];
    $ordenacao = null;

  
    $r = $op->select($tabela,$coluna,$condicao,$ordenacao);

    $valor = $r[0]["VALOR_PRODUTO"];

    echo $valor;

?>