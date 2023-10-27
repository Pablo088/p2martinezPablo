<?php
class BD {
    private $host = "localhost";
    private $dbname = "sistema_asistencia";
    private $username = "root";
    private $password = null;
    private $connection;

    public function __construct()
    {
        $this-> connection = new mysqli($this -> host,$this->username,$this->password,$this -> dbname);
    }
    public function Conectar(){
        $this -> connection;
        if(($this->connection) -> connect_errno){
            die("Surgió un error al tratar de conectarse"). ($this->connection) -> connect_errno;
        } 
    }
}
?>
