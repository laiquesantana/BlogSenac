<?php 
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=blog_senac", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    // define global constants
    define ('ROOT_PATH', realpath(dirname(__FILE__)));
    define('BASE_URL', 'http://localhost/complete-blog-php/');
?>