<div class="banner">
	<div class="welcome_msg">
		<div id="fundo"><h1>Faça parte da nossa comunidade</h1></div>
	
		<a href="register.php" class="btn">Registre-se!</a>
	</div>
	<div class="login_div " id="formulario">

		<form action="login.php" method="post" >
			<label for="txUsuario">Email</label>
			<input type="text" name="email" id="txUsuario" maxlength="150" />
			<label for="txSenha">Senha</label>
			<input type="password" name="senha" id="txSenha" />
			<input type="hidden" name="hidden" <?php echo "value='" . $_SESSION['formKey'] . "'" ?>>
			<input type="submit" value="Entrar" />
		</form>
	</div>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6"> <a href="#" class="btn btn-primary facebook"> <span>Login with Facebook</span> <i class="fa fa-facebook"></i> </a> </div>
<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6"> <a href="#" class="btn btn-primary google-plus"> Login with Google <i class="fa fa-google-plus"></i> </a> </div><div class="login_wrapper">