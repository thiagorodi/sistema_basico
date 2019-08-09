<?php

	include("../View/classeCabecalho.php");
	include("../Model/classeBancoDeDados.php");
	$c->exibe_menu();
	
	$operacao = new BancoDeDados($conexao);
	$operacao->insercao($_GET["tabela"],$_POST);
	
	echo $_GET["tabela"]." cadastrado(a) com sucesso.";

?>
	<script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/validaform.min.js"></script>
</body>
</html>