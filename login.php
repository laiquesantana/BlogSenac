<?php
session_start();
  
   
  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) && (empty($_POST['email']) OR empty($_POST['senha']))) {
      header("Location: index.php"); 
      exit;
  }

        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
                $conn = new PDO("mysql:host=$servername;dbname=senac_estudos", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            
            $usuario =  $_POST['email'];
            $senha =  $_POST['senha']; 
            
            $query = "select id, email, nome, usuario from usuarios where email = '{$usuario}' and senha = sha1('{$senha}')";

        $stmt = $conn->prepare($query);
        
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (empty($result)) {
            // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
            echo "Login inválido!"; exit;
        } else {
            // Salva os dados encontrados na variável $resultado
      
            // Se a sessão não existir, inicia uma
            if (!isset($_SESSION)){
                session_start(); 
            } 

            $usuario = $result[0];


            // Salva os dados encontrados na sessão
            $_SESSION['UsuarioID'] = $usuario['id'];
            $_SESSION['UsuarioNome'] = $usuario['nome'];
            $_SESSION['UsuarioEmail'] = $usuario['email'];
            $_SESSION['Usuario'] = $usuario['usuario'];
            // Redireciona o visitante
            header("Location: acessoRestrito.php"); exit;

          
        }
  
 
  ?>