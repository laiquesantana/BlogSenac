<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

    $servername = "localhost";
    $username = "root";
    $password = "";
    
    try {
         $mysqli = new mysqli($servername,$username, $password, 'senac_estudos');

         /* check connection */
         if (mysqli_connect_errno()) {
             printf("Connect failed: %s\n", mysqli_connect_error());
             exit();
         }

         /*
          i - integer
          d - double
          s - string
          b - BLOB
         */
        // $query = $mysqli->prepare("INSERT INTO usuarios ( nome, usuario, senha, email, ativo) VALUES (?, ?, ?, ?, ?)");
        // $query->bind_param("ssssi", $nome, $usuario, $senha,$email,$ativo);

        // // set parameters and execute
        // $nome = "Maria joaquina";
        // $usuario = "mariajoaquina";
        // $email = "maria@gmail.com";
        // $senha = password_hash('123456',PASSWORD_ARGON2I);
        // $ativo = 1;

        // /* execute prepared statement */
        // $query->execute();

        // printf("%d Row inserted.\n", $query->affected_rows);

    } catch(Exception $e) {
      echo "Connection failed: " . $e->getMessage();
    }
?>