<?php



	include("../View/classeCabecalho.php");
	include("../View/classeForm.php");
	include("../View/classeModal.php");
	include("../View/classeLogin.php");
	
	$parametros["action"]="validacao.php";
	$parametros["method"]="post";
	
	$f = new Form($parametros);
	
	$parametros=null;
	$parametros["type"]="email";
	$parametros["name"]="email";
	$parametros["class"]="form-control";
	$parametros["required"]="required";
	$parametros["placeholder"]="Digite o usuário...";
	$f->add_input($parametros);

	$parametros=null;
	$parametros["type"]="password";
	$parametros["name"]="senha";
	$parametros["class"]="form-control password";
	$parametros["required"]="required";	
	$parametros["data_cript"]="sha1, md5";	
	$parametros["placeholder"]="Digite a senha...";
	$f->add_input($parametros);
	
	if(isset($_GET["erro"])){
		echo "Login e/ou senha inválidos.<hr />";
	}
	
	$parametros=null;
	$parametros["logo"]="../img/to-do.jpg";
	$login = new Login($parametros,$f);
	$login->exibe();
	
	$parametros=null;
	$parametros["action"]="insere.php?tabela=usuario";
	$parametros["method"]="post";
	
	$f = new Form($parametros);
	
	$parametros=null;
	$parametros["type"]="text";
	$parametros["name"]="nome";
	$parametros["class"]="form-control";
	$parametros["placeholder"]="Digite o nome...";
	$f->add_input($parametros);

	$parametros=null;
	$parametros["type"]="email";
	$parametros["name"]="email";
	$parametros["class"]="form-control";
	$parametros["placeholder"]="Digite o email (login)...";
	$f->add_input($parametros);
	
	$parametros=null;
	$parametros["type"]="radio";
	$parametros["name"]="sexo";
	$parametros["label"]="Sexo";
	$parametros["class"]="form-control";
	$parametros["opcoes"]=array("m"=>"Masculino","f"=>"Feminino");
	$f->add_inputOpcoes($parametros);

	$parametros=null;
	$parametros["type"]="date";
	$parametros["name"]="data_nascimento";
	$parametros["class"]="form-control";
	$parametros["label"]="Data Nascimento: ";
	$f->add_input($parametros);	

	$parametros=null;
	$parametros["type"]="password";
	$parametros["name"]="senha";
	$parametros["class"]="form-control password";
	$parametros["required"]="required";	
	$parametros["data_cript"]="sha1, md5";		
	$parametros["placeholder"]="Digite uma senha... ";
	$f->add_input($parametros);	

	$m = new Modal($f);
	$m->exibe();

?>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
 	<script src="../js/validaform.min.js"></script>   
</body>
</html>