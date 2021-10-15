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


  $tipoImagensAceitos = array("jpg", "jpeg", "gif", "png");
 
  // gera a data do tipo datetime
  $date = new DateTime($_POST['data_publicacao'],  new DateTimeZone('America/Sao_Paulo'));
  $date = $date->format('Y-m-d H:i:s');

  $path = $_FILES['imagem']['name']; // captura o nome da imagem
  
  $ext = pathinfo($path, PATHINFO_EXTENSION); // captura a extensão da imagem

  $nome = uniqid().'.'.$ext; // gera um nome unico para a imagem


 $caminhoDestinoImagem = __DIR__.'/static/images/'.$nome; // contem o caminho onde vai ser salvo a imagem


  if ( !!$_FILES['imagem']['tmp_name'] ) // is the file uploaded yet?
  {
      
      if ( in_array( $ext, $tipoImagensAceitos) ) // is this file allowed
      {
         move_uploaded_file($_FILES['imagem']['tmp_name'],$caminhoDestinoImagem ); // move a imagem da pasta tmp para a pasta destino
      }
      else
      {
        die("Extensão não permitida");
      }
  }

  $query = $mysqli->prepare("INSERT INTO posts ( titulo, conteudo, subtitulo, data_publicacao, id_usuario,imagem) VALUES (?,?,?,?,?,?)");
  $query->bind_param("sssiis", $titulo, $conteudo, $subtitulo,$data_publicacao ,$id_usuario,$imagem);

  // set parameters and execute
  $titulo = $_POST["titulo"];
  $subtitulo = $_POST["subtitulo"];
  $conteudo = $_POST["conteudo"];
  $id_usuario = $_SESSION["id"];
  $imagem = $nome;
  $data_publicacao = $date;

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
                          <input type="datetime-local" name="data_publicacao" id="form3Example1c" class="form-control" />
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



</body>

</html>