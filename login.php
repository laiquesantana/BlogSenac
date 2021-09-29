<?php
    session_start();
    require_once('config.php');

   
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header("Location: index.php");
        exit;
    }

    if (!isset($_POST['hidden']) || $_POST['hidden'] != $_SESSION['formKey']) {
        header("Location: index.php");
        exit;
    }

    // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
    if (!empty($_POST) && (empty($_POST['email']) or empty($_POST['senha']))) {
        header("Location: index.php");
        exit;
    }


    $usuario =  $_POST['email'];
    $senha =  $_POST['senha'];

 
    $query = "select id, email, nome, senha, usuario from usuarios where email = '{$usuario}' and ativo = 1";

    $result  = $mysqli->query($query);

    if(!mysqli_num_rows($result)) {
        echo "Usuário não encontrado";
         // para não exceder o número máximo de conexões;
        $result ->close();
        $mysqli->close();
        exit;
    } else {
        //Coloca os dados retornados pelo banco em um array chamado $data
        while ($r = mysqli_fetch_assoc($result)) {
            $data[] = $r;
        }
    }

    if (password_verify($senha, $data[0]['senha'])) {
        echo "Logado com sucesso!";
    } else {
        echo "Senha ou email incorreto!";
         // para não exceder o número máximo de conexões;
        $result ->close();
        $mysqli->close();
        exit;
    }

    // para não exceder o número máximo de conexões;
    $result ->close();
    $mysqli->close();

    $_SESSION['formKey'] = sha1(rand());

    // Salva os dados encontrados na variável $resultado

    // Se a sessão não existir, inicia uma
    if (!isset($_SESSION)) {
        session_start();
    }

    $usuario = $data[0];


    // Salva os dados encontrados na sessão
    $_SESSION['UsuarioID'] = $usuario['id'];
    $_SESSION['UsuarioNome'] = $usuario['nome'];
    $_SESSION['UsuarioEmail'] = $usuario['email'];
    $_SESSION['Usuario'] = $usuario['usuario'];
    // Redireciona o visitante
    header("Location: acessoRestrito.php");
    exit;
    
