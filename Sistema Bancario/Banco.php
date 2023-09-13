<?php
    class Banco{
        public $nombre;
        public $direccion;
        public $listaCuentas = [];

        public function __construct($nombre,$direccion){
            $this -> nombre = $nombre;
            $this -> direccion = $direccion;
    }
    function agregarCuenta($cuenta){
        $this-> listaCuentas[] = $cuenta;
    }
    function buscarCuentaPorTitular($cuentaTitular){
        foreach($this->listaCuentas as $todasLasCuentas){
            if($cuentaTitular ==($todasLasCuentas->titular)){
                echo "Numero de cuenta: ".$todasLasCuentas->numeroCuenta." - Titular: ".$todasLasCuentas->titular." - Saldo: ".$todasLasCuentas->saldo;
            }
        }
    }     
}
?>
