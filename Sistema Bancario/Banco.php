<?php
    class Banco{
        public $nombre;
        public $direccion;
        public $listaCuentas = [];

        public function __construct($nombre,$direccion){
            $this -> nombre = $nombre;
            $this -> direccion = $direccion;
    }
    function AgregarCuenta($numeroCuenta){
        $this-> $listaCuentas[] = $numeroCuenta;
    }
    function BuscarCuentaPorTitular(){

    }
}
?>
