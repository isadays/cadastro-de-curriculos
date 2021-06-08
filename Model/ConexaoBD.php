<?php

// Development
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

// Production
//class ConexaoBD{
//
//    private $servername = "localhost";
//    private $username = "id16982950_juarezenlatados";
//    private $password = "3{!ID2O8rme/[wi9";
//    private $dbname = "id16982950_projeto_final";
//
//    public function conectar()
//    {
//        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
//        return $conn;
//    }
//
//}