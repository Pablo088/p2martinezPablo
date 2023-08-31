<?php
    class CuentaBancaria{
        public $numeroCuenta;
        public $saldo;
        public $titular;
        
        public function __construct($numeroCuenta,$titular,$saldo){
            $this -> numeroCuenta = $numeroCuenta;
            $this -> titular = $titular;
            $this -> saldo = $saldo;
    }
    public function Depositar($cantidad){
        if($cantidad>0){
        $this -> saldo= $this -> saldo += $cantidad;
    }
    public function Retirar($cantidad){
        if (($this -> saldo)>$cantidad){
        $this -> saldo=$this ->saldo -= $cantidad;
    }
}
?>
