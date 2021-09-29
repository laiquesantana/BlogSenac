 <?php

/*
 funcionalidades faltantes:
 Pagina de cadastro
 Pagina para cadastrar um artigo
 E exibir esse artigo no index.php 
*/
/* $classe = 'UsuarioController';

require_once 'controller/UsuarioController.php';


$usuario =  new UsuarioController();

$usuario->listar();


// include_once 'connection.php';
// include_once 'model/Cliente.php';


// $con = new connection();
// $info = new Cliente($con);



// $obj->listar(); */
session_start();

$_SESSION['formKey'] = sha1(rand());

?>
<!-- head -->
	<?php include('includes/head.php') ?>
<!-- head -->

<body class="">
 		<div class="container"></div>
	<!-- container - wraps whole page -->
	<div class="container">


		<!-- navbar -->

        <?php include('includes/navbar.php') ?>
		<!-- // navbar -->

        <!-- banner -->
        <?php include('includes/banner.php') ?>
		<!-- banner -->

		<!-- Page content -->
		<div class="content">
			<h2 class="content-title">Recent Articles</h2>
			<hr>
		</div>

		<!-- footer -->

		</div>
        <div class="footer bg-dark">
			<p>Todos os direitos reservados &copy; <?php echo date('Y'); ?></p>
		</div>
		<!-- footer -->

 
</body>
</html>