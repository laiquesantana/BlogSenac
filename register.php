<?php
require_once('config.php');

$usuariologadosucesso = false;
$usuarioexistente = false;

if (!isset($_SESSION)) session_start();


$_SESSION['formKey'] = sha1(rand());

$name = $email = $senha =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $name = test_input($_POST["nome"]);
  $email = test_input($_POST["email"]);
  $senha = test_input($_POST["senha"]);


  $query = "select  email from usuarios where email = '{$email}' and ativo = 1";

  $result  = $mysqli->query($query);

  if (mysqli_num_rows($result)) {
    $usuarioexistente = true;
  } else {

  $query = $mysqli->prepare("INSERT INTO usuarios ( nome, usuario, senha, email, ativo) VALUES (?, ?, ?, ?, ?)");
  $query->bind_param("ssssi", $nome, $usuario, $senha, $email, $ativo);

  // set parameters and execute
  $nome = $_POST["nome"];
  $usuario = $_POST["usuario"];
  $email = $_POST["email"];
  $senha = password_hash($_POST["senha"], PASSWORD_ARGON2I);
  $ativo = 1;

  /* execute prepared statement */
  $query->execute();
  $query->close();
  $mysqli->close();
  
  $usuarioCadastradoSucesso = true;
 }
}
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
<?php include('includes/head.php') ?>

<body>
  <?php include('includes/navbar.php') ?>

  <?php if ($usuarioCadastradoSucesso) { ?> <div class="alert alert-success" role="alert">
      Cadastrado com sucesso
    </div>
  <?php } ?>

  <?php if ($usuarioexistente) { ?> <div class="alert alert-danger" role="alert">
      Erro! O email já existe.
    </div>
  <?php } ?>

  <div class="container">
    <section class="vh-100" style="background-color: #eee;">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registre-se</p>
                    <form class="mx-1 mx-md-4" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="text" required name="nome" id="form3Example1c" class="form-control" />
                          <label class="form-label" for="form3Example1c">Seu Nome</label>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="text" name="usuario" id="form3Example1c" class="form-control" />
                          <label class="form-label" for="form3Example1c">Seu Usuario</label>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="email" name="email" id="form3Example3c" class="form-control" />
                          <label class="form-label" for="form3Example3c">Seu Email</label>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="password" name="senha" id="form3Example4c" class="form-control" />
                          <label class="form-label" for="form3Example4c">senha</label>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="password" name="confirmar_senha" id="form3Example4cd" class="form-control" />
                          <label class="form-label" for="form3Example4cd">Repita Seu senha</label>
                        </div>
                      </div>

                      <div class="form-check d-flex justify-content-center mb-5">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                        <label class="form-check-label" for="form2Example3">
                          Concordo com os termos de uso<a href="#!">Termos de uso</a>
                        </label>
                      </div>

                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <input type="submit" class="btn btn-primary btn-lg" value="Registrar" />

                      </div>

                    </form>

                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                    <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/draw1.png" class="img-fluid" alt="Sample image">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  </div>
  <div class="footer bg-dark">
    <p>Todos os direitos reservados &copy; <?php echo date('Y'); ?></p>
  </div>


</body>

</html>