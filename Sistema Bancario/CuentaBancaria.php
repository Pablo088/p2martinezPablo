<?php
    require_once("Impuesto_trait.php");
    class CuentaBancaria{
        public $numeroCuenta;
        public $saldo;
        public $titular;
        const limite = 20000;
        use Impuesto;
        
        public function __construct($numeroCuenta,$titular,$saldo){
            $this -> numeroCuenta = $numeroCuenta;
            $this -> titular = $titular;
            $this -> saldo = $saldo;
    }
    public function Depositar($cantidad){
        $saldoAumenta = $this->saldo;

        if($cantidad>0){
        $saldoAumenta= $saldoAumenta + $cantidad;
        echo "Tu saldo ahora es de ".$saldoAumenta;
        }

    }
    public function Retirar($cantidad){
        $saldoDisminuye = $this->saldo;

        if (($saldoDisminuye)>=$cantidad){
        $saldoDisminuye= $saldoDisminuye - $cantidad;
        echo "Retiraste ".$cantidad." y tu saldo ahora es de ".$saldoDisminuye;
        }
            else if (($saldoDisminuye)<$cantidad && self::limite>=$cantidad){
                $saldoDisminuye = $cantidad - self::limite;
                echo "El monto restante de tu sobregiro es de ".$saldoDisminuye.", por lo que vas a tener que depositar los ".$cantidad." que retiraste, dentro de 30 dias";

            }
                else if (($saldoDisminuye)<$cantidad && self::limite<$cantidad){
                    echo"El monto que pedís es mayor al limite de dinero que podes retirar a credito";
                }

    }

    public function Transferir($nombre1,$transfiereSaldo,$cantidadTransferencia,$recibeSaldo,$nombre2){
        
        if($transfiereSaldo>0){
            $transfiereSaldo = $transfiereSaldo - $cantidadTransferencia;
            $recibeSaldo = $recibeSaldo + $cantidadTransferencia;

            echo "¡Transferencia existosa! ";
            echo $nombre1." acaba de transferir ".$cantidadTransferencia." pesos a ".$nombre2;
            echo ". Ahora, el saldo de ".$nombre1." es de ".$transfiereSaldo.", y el de ",$nombre2." es de ".$recibeSaldo;
        }

    }
//amongus
}
?>
