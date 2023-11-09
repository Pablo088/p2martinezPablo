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
    public static function modificarParametros($cantidad,$promedioPromocion,$promedioRegularidad,$edadMinima){
        $parametros = "UPDATE parametros SET cantidad_dias = '$cantidad', promedio_promocion = '$promedioPromocion', promedio_regularidad = '$promedioRegularidad', edad_minima = '$edadMinima' ";
        return $parametros;
    }
}

?>
