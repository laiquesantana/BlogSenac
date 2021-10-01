<?php
require_once('config.php');

if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['id'])) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: index.php");
  exit;
}

$_SESSION['formKey'] = sha1(rand());

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $query = $mysqli->prepare("INSERT INTO posts ( titulo, conteudo, subtitulo, id_usuario) VALUES (?,?,?, ?)");
  $query->bind_param("sssi", $titulo, $conteudo, $subtitulo ,$id_usuario);

  // set parameters and execute
  $titulo = $_POST["titulo"];
  $subtitulo = $_POST["subtitulo"];
  $conteudo = $_POST["conteudo"];
  $id_usuario = $_SESSION["id"];

  /* execute prepared statement */
  $query->execute();
}


?>
<?php include('includes/head.php') ?>

<body>
  <?php include('includes/navbar.php') ?>
  <div class="container">
    <section class="vh-100" style="background-color: #eee;">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-md-12">
                <div class="row justify-content-center">
                  <div class="col-md-12 col-lg-12 col-xl-12 order-2 order-lg-1">

                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Publicar</p>
                    <form class="mx-1 mx-md-4" method="POST" enctype='multipart/form-data' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Titulo</label>
                          <input type="text" name="titulo" id="form3Example1c" class="form-control" />
                       
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Sub título</label>
                          <input type="text" name="subtitulo" id="form3Example1c" class="form-control" />
                   
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">conteudo</label>
                          <textarea name="conteudo" id="form3Example1c" class="form-control" style="height: 300px"></textarea>
             
                        </div>
                      </div>

                      
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                         <label class="form-label" for="form3Example1c">Imagem</label>
                          <input type="file" name="imagem" id="form3Example1c" class="form-control" />
        
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                         <label class="form-label" for="form3Example1c">Data de publicação</label>
                          <input type="text" name="data_publicacao" id="form3Example1c" class="form-control" />
        
                        </div>
                      </div>

                      
                      <div class="d-flex col-md-3 justify-content-center mx-4 mb-3 mb-lg-4">
                        <input type="submit" class="btn btn-primary btn-lg" value="Registrar" />
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="footer bg-dark">
    <p>Todos os direitos reservados &copy; <?php echo date('Y'); ?></p>
  </div>


</body>

</html>