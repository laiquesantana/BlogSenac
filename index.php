 <?php

/* $classe = 'UsuarioController';

require_once 'controller/UsuarioController.php';


$usuario =  new UsuarioController();

$usuario->listar();


// include_once 'connection.php';
// include_once 'model/Cliente.php';


// $con = new connection();
// $info = new Cliente($con);



// $obj->listar(); */
?>
<?php require_once('config.php') ?>
<!DOCTYPE html>
<html>
<head>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Noto+Serif|Tangerine" rel="stylesheet">
    <!-- Styling for public area -->
    <link rel="stylesheet" href="static/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blog | Home </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>

<body class="">
 		<div class="container"></div>
	<!-- container - wraps whole page -->
	<div class="container">


		<!-- navbar -->

        <?php include('includes/navbar.php') ?>
		<!-- // navbar -->
        <!-- banner -->
        <?php include('includes/banner.php') ?>
		<!-- Page content -->
		<div class="content">
			<h2 class="content-title">Recent Articles</h2>
			<hr>
			<!-- more content still to come here ... -->
		</div>
		<!-- // Page content -->

		<!-- footer -->

		</div>
        <div class="footer bg-dark">
			<p>Todos os direitos reservados &copy; <?php echo date('Y'); ?></p>
		</div>
	
	<!-- // container -->

 
</body>
</html>