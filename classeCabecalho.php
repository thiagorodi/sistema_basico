<?php

	include("../Model/classeUsuario.php");

	include("interfaceExibicao.php");

	class Cabecalho implements Exibicao{
	
		private $charset;
		private $title;
		private $links;
		private $scripts;
		
		public function __construct($parametros){
			$this->charset = $parametros["charset"];
			$this->title = $parametros["title"];
			if(isset($parametros["links"])){
				$this->links = $parametros["links"];
			}
			if(isset($parametros["scripts"])){
				$this->scripts = $parametros["scripts"];
			}
		}
		
		public function exibe(){
			session_start();
			echo '<!DOCTYPE html>
					<html>
					<head>
					<title>'.$this->title.'</title>
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<meta charset="utf-8"/>';
				
			if($this->links!=null){
					foreach($this->links as $i=>$l){
						echo "<link rel='stylesheet' href='$l' />
						";
					}
			}
			 
			if($this->scripts!=null){
					foreach($this->scripts as $i=>$s){
						echo "<script type='text/javascript' src='$s'></script>";
					}
			}
			echo '</head>
				<body>';
					 if(isset($_SESSION["usuario"])){
						echo '<nav class="navbar navbar-dark bg-dark navbar-inverse navbar-static-top">
						<div class="container">
							<div class="navbar-header">
								<a href="../Controller/index.php" class="navbar-brand logotipo">
									<img src="" alt="IFSP ESPORTES"/>
								</a>

								<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
									<span class="navbar-toggler-icon"></span>
								</button>
							</div>';
					 }
		}
		
		public function exibe_menu(){
			
			echo "<div class='collapse' id='menu'>
						<div class='bg-dark p-4'>
							<ul class='nav navbar-nav'>
								<li>
									<a href='listar_cliente.php'>
										Cliente
									</a>
								</li>
								<li>
									<a href='listar_funcionario.php'>
										Funcionario
									</a>
								</li>
								<li>
									<a href='listar_fornecedor.php'>
										Fornecedor
									</a>
								</li>
								<li>
									<a href='listar_produto.php'>
										Produto
									</a>
								</li>
								<li>
									<a href='listar_estoque.php'>
										Estoque
									</a>
								</li>								
								<li>
									<a href='listar_marca.php'>
										Marca
									</a>
								</li>
								<li>
									<a href='listar_venda.php'>
										Venda
									</a>
								</li>
								<li>
									<a href='logout.php'>
										Sair
									</a>
								</li>
							</ul>
						</div>	
					</div>
				</div>";
			if(isset($_SESSION["usuario"])){
				echo"</nav>";
			}
		}
	
	}
	
	
	$parametros["charset"]="utf-8";
	$parametros["title"]="Produtos Esportivos";
	$parametros["links"][] = "../css/estiloTable.css";
	$parametros["links"][] = "../css/bootstrap.min.css";
	$parametros["links"][] = "../css/login.css";
	$parametros["links"][] = "../css/todo.css";
	//$parametros["links"][] = "https:/fonts.googleapis.com/icon?family=Material+Icons";
	$parametros["scripts"][] = "../js/jquery-3.3.1.min.js";
	$parametros["scripts"][] = "../js/bootstrap.min.js";
	//$parametros["scripts"][] = "js/todo.js";
	
	$c = new Cabecalho($parametros);
	$c->exibe();	
	
?>


	