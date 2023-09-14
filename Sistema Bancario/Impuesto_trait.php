<?php
    trait Impuesto {
        public function impuestoRetiro($saldoRetiro,$cantidad){
            $saldoRetiro = $saldoRetiro / 0.6;
            echo "Por el retiro de ".$cantidad." pesos, también se te va a descontar un 0,6% de tu saldo. Tu saldo ahora es de ".$saldoRetiro;
        }

        public function impuestoTransferencia($saldoTransfiere,$nombre,$cantidad){
            $saldoTransfiere = $saldoTransfiere / 2;
            echo $nombre.", por la transferencia de ".$cantidad." pesos realizada también se te va a descontar un 2% de tu saldo. Tu saldo ahora es de ".$saldoTransfiere;
        }
    }
?>
