<?php
    class CuentaBancaria{
        public $numeroCuenta;
        public $saldo;
        public $titular;
        const limite = 20000;
        
        public function __construct($numeroCuenta,$titular,$saldo){
            $this -> numeroCuenta = $numeroCuenta;
            $this -> titular = $titular;
            $this -> saldo = $saldo;
    }
    public function Depositar($cantidad){
        if($cantidad>0){
        $this -> saldo= $this -> saldo += $cantidad;
        }
    }
    public function Retirar($cantidad){
        if (($this -> saldo)>$cantidad){
        $this -> saldo=$this ->saldo - $cantidad;
        echo "Retiraste ".$cantidad." y tu saldo ahora es de ".$this->saldo;
        }else if (($this->saldo)<$cantidad && self::limite>=$cantidad){
            $this->saldo = $cantidad - self::limite;
            echo "El monto restante de tu sobregiro es de ".$this->saldo.", por lo que vas a tener que depositar los ".$cantidad." que retiraste, dentro de 30 dias";
        }else if (($this->saldo)<$cantidad && self::limite<$cantidad){
            echo"El monto que pedís es mayor al limite de dinero que podes retirar a credito";
        }
    }
    public function Transferir($nombre1,$transfiereSaldo,$cantidadTransferencia,$recibeSaldo,$nombre2){
        if($transfiereSaldo>0){
            $transfiereSaldo = $transfiereSaldo -= $cantidadTransferencia;
            $recibeSaldo = $recibeSaldo += $cantidadTransferencia;

            echo "¡Transferencia existosa! ";
            echo $nombre1." acaba de transferir ".$cantidadTransferencia." pesos a ".$nombre2;
            echo ". Ahora, el saldo de ".$nombre1." es de ".$transfiereSaldo.", y el de ",$nombre2." es de ".$recibeSaldo;
        }
    }
}
?>
