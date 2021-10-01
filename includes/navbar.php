<div class="navbar">
	<div class="logo_div">
		<a href="index.php"><img id="console"  height="70" width="70" src="static/images/console.png"></a>
	</div>
	<ul>
	  <?php 
		// Verifica se não há a variável da sessão que identifica o usuário
		if (isset($_SESSION['id'])) {
			echo '<li><a class="active" href="post.php">Publicar post</a></li>';
		}
	  ?>
	  <li><a class="active" href="index.php">Home</a></li>
	  <li><a href="#news">News</a></li>
	  <li><a href="#contact">Contact</a></li>
	  <li><a href="#about">About</a></li>
	  <?php 
		// Verifica se não há a variável da sessão que identifica o usuário
		if (isset($_SESSION['id'])) {
			echo '<li><a class="active" href="logout.php">Logout</a></li>';
		}
	  ?>
	</ul>
</div>