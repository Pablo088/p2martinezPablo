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
    public function Transferir($nombre1,$transfiereSaldo,$cantidadTransferencia,$recibeSaldo,$nombre2){
        if($transfiereSaldo>0){
            $transfiereSaldo = $transfiereSaldo -= $cantidadTransferencia;
            $recibeSaldo = $recibeSaldo += $cantidadTransferencia;
           // echo $nombre1." acaba de transferir ".$cantidadTransferencia." pesos a ".$nombre2;
            echo "Transferencia existosa! ";
            echo "El saldo de ".$nombre1." es de ".$transfiereSaldo.", y el de ",$nombre2." es de ".$recibeSaldo;
        }
    }
}
?>
