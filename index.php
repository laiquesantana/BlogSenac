 <?php

session_start();

// fazer paginação do resultado

/*
	salvar data de publicação no arquivo post
	salvar a imagem dentro da pasta static/images e salvar o caminho da imagem no banco.
*/

$_SESSION['formKey'] = sha1(rand());
require_once('config.php');


 
$query = "select * from posts ";

$result  = $mysqli->query($query);

$posts = null;

if(mysqli_num_rows($result)) {
	
	while ($r = mysqli_fetch_assoc($result)) {
		$posts[] = $r;
	}
} 



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
			<h2 class="content-title">Artigos recentes</h2>
			<hr>
			<div class="row">
			<?php
				if (isset($posts)) {
					foreach ($posts as $chave => $publicacao) {
						echo '  <div class="col-sm-6 mb-4">
						<img src="static/images/'.$publicacao['imagem'].'" class="card-img-top" alt="...">
						<div class="card">
						  <div class="card-body">
							<h5 class="card-title">'. $publicacao['titulo']. '</h5>
							<p class="card-text">'.$publicacao['subtitulo'].'</p>
							<a href="#" class="btn btn-primary">Saiba mais...</a>
						  </div>
						</div>
					  </div>';
					}
				}
			
			?>
			</div>

		</div>

		<!-- footer -->

		</div>
        <div class="footer bg-dark">
			<p>Todos os direitos reservados &copy; <?php echo date('Y'); ?></p>
		</div>
		<!-- footer -->

 
</body>
</html>