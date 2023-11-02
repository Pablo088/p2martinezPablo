<?php
class Parametro {
    public static function edadMinima() {
        $minimo = "select edad_minima from parametros";
        return $minimo;
    }

    public static function getParametros() {
        $parametro = "select * from parametros";
        return $parametro;
    }
}

?>