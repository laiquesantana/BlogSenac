<?php
class Cliente
{
    private $id;
    private $nome;
    private $conn;

    public function __construct(connection $conn) {
        $this->conn = $conn->conn;
    }


    /**
     * ...
     * getters e setters
     * ...
     *
     */

    public function save()
    {
        // logica para salvar cliente no banco
    }

    public function update()
    {
        // logica para atualizar cliente no banco
    }

    public function remove()
    {
        // logica para remover cliente do banco
    }

    public function listAll()
    {
        try {
         
            $stmt = $this->conn->prepare("SELECT id, nome, email FROM usuarios");
           
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            var_dump($result[0]);

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
