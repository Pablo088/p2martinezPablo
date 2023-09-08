<?php
    class Banco{
        public $nombre;
        public $direccion;
        public $listaCuentas = [];

        public function __construct($nombre,$direccion){
            $this -> nombre = $nombre;
            $this -> direccion = $direccion;
    }
    function agregarCuenta($numeroCuenta){
        $this-> listaCuentas[] = $numeroCuenta;
    }
    function buscarCuentaPorTitular($a,$b){
        if ($a==($this->listaCuentas[1]->titular->nombre)){
            echo ("Dentro");
            var_dump($this->listaCuentas[1]);
      
            foreach ($this->listaCuentas as $totalDeCuentas) {
                //var_dump($cadaCuenta->titular->nombre,$cadaCuenta->titular->apellido);
                if ((($cadaCuenta->titular->nombre) == $a) && (($cadaCuenta->titular->apellido) == $b) ){
                    echo("Cuenta Encontrada<br>");
                    var_dump($cadaCuenta);
                }
            }
        }
    }
}
?>
