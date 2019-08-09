<?php

	include("../Model/conexao.php");
	include("../Model/classeValidacaoUsuario.php");

	$v = new ValidacaoUsuario($conexao,$_POST);

	$v->validar();

?>