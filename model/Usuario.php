<?php
class Usuario
{
    private $id;
    private $nome;
    private $conn;

    // public function __construct(connection $conexaoBanco ){

    // }

    /**
     * ...
     * getters e setters
     * ...
     *
     */

    public function save()
    {
        $servername = "localhost";
        $username = "laiquesantana";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=senac_estudos", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }

          $stmt = $this->conn->prepare("INSERT INTO `usuarios`( `nome`, `email`, `data_nascimento`, `data_criacao`) VALUES ()");
           
          $stmt->execute();
    }

    public function update($id)
    {
        // logica para atualizar usuario no banco
    }

    public function remove($id)
    {
        // logica para remover usuario do banco
    }

    public function listAll()
    {
        try {
         
            $servername = "localhost";
            $username = "laiquesantana";
            $password = "root";
    
            try {
                $conn = new PDO("mysql:host=$servername;dbname=senac_estudos", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               // echo "Connected successfully";
              } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
              }
               
              
            $stmt = $conn->prepare("SELECT id, nome, email,data_nascimento FROM usuarios");
           
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * ...
     * outros métodos de abstração de banco
     * ...
     *
     */
}
