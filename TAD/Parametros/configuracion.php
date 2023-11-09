<?php

    require_once('../../TAD/BD/conexion.php');
    require_once('../Clases/Parametro.php');

    $BD = new BD();

    if (isset($_POST["enviar"])){
        if (!empty($_POST["cantidad_dias"]) && !empty($_POST["promedio_promocion"]) && !empty($_POST["promedio_regularidad"]) && !empty($_POST["edad_minima"])){
            $cantidad_dias = $_POST["cantidad_dias"];
            $promedio_promocion = $_POST["promedio_promocion"];
            $promedio_regularidad = $_POST["promedio_regularidad"];
            $edad_minima = $_POST["edad_minima"];
            
           $parametro = Parametro::modificarParametros($cantidad_dias,$promedio_promocion,$promedio_regularidad,$edad_minima);
           $contenedor = $BD->Ejecutar($parametro);
           
            if($contenedor){
               echo" <script> alert('¡Los datos fueron modificados!');
                  location.href ='/Parametros/pagina_parametros.php';</script>";
            } 
        }
    }

?>
