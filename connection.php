<?php
class connection extends PDO{

    private $servername = 'localhost';
    private $username = 'laiquesantana';
    private $password ='root';  
    
    public $con = '';
    
    function __construct(){

        $this->connect();   
    }

    function connect(){
    
        try{
    
            $this->con = new PDO("mysql:host=$this->servername;dbname=senac_estudos", $this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
        }catch(PDOException $e){
    
            echo 'We\'re sorry but there was an error while trying to connect to the database';
            file_put_contents('connection.errors.txt', $e->getMessage().PHP_EOL,FILE_APPEND);
    
        }
    }   
}
