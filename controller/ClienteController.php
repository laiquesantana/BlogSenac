<?php
require_once 'model/Cliente.php';

class ClienteController {

 public function listar() {

 $cliente = new Cliente();
 $clientes = $cliente->listAll();
 return $clientes;
 $_REQUEST['clientes'] = $clientes;
 require_once 'view/cliente_view.php';
 }
}

?>