<?php
    class CuentaBancaria{
        public $numeroCuenta;
        public $saldo;
        public $titular;
        
        public function __construct($numeroCuenta,$titular){
            $this -> numeroCuenta = $numeroCuenta;
            $this -> titular = $titular;
    }
    function Depositar($cantidad){
        $this -> saldo += $cantidad;
    }
    function Retirar($cantidad){
        $this -> saldo -= $cantidad;
    }
}
?>