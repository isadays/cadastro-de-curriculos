<?php

class ConexaoBD{
    
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "projeto_final";

    public function conectar()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        return $conn;
    }   

}

?>