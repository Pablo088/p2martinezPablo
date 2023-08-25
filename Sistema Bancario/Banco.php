<?php
    class Banco{
        public $nombre;
        public $direccion;
        public $listaCuentas = array();

        public function __construct($nombre,$direccion){
            $this -> nombre = $nombre;
            $this -> direccion = $direccion;
    }
    function AgregarCuenta($cuenta){

    }
    function BuscarCuentaPorTitular($cuenta){

    }
}
?>