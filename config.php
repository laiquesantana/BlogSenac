<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

    $servername = "localhost";
    $username = "root";
    $password = "";
    
    try {
         // alterar para PDO
         $mysqli = new mysqli($servername,$username, $password, 'senac_estudos');

         /* check connection */
         if (mysqli_connect_errno()) {
             printf("Connect failed: %s\n", mysqli_connect_error());
             exit();
         }

    } catch(Exception $e) {
      echo "Connection failed: " . $e->getMessage();
    }
?>