<?php
require_once 'model/Usuario.php';

class UsuarioController {

 public function listar() {

    $usuarios = new Usuario(); // instância do modelo
    $usuarios = $usuarios->listAll();
    $_REQUEST['usuarios'] = $usuarios;
    require_once 'index.php';
    }
}

?>