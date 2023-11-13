<?php
    require_once("../TAD/BD/conexion.php");
    require_once("../TAD/Clases/Alumno.php");
    require_once("../TAD/Clases/Persona.php");
    require_once("../TAD/Clases/Parametro.php");

    $BD = new BD();

    if(!empty($_POST["dni_alumno"]) && !empty($_POST["fecha"])){
        $dni_alumno = $_POST["dni_alumno"];
        $fecha = $_POST["fecha"];

        $contadorAsistencia = Alumno::contadorAsistencias($dni_alumno);
        $contenedorAsistencia = $BD -> Ejecutar($contadorAsistencia);
        $asistencia = $contenedorAsistencia -> fetch_assoc();

        $getParametro = Parametro::getParametros();
        $contenedorParametro = $BD -> Ejecutar($getParametro);
        $parametro = $contenedorParametro -> fetch_assoc();

        if($asistencia["count(dni_alumno)"] >= $parametro["cantidad_dias"]){
            echo"<script> alert('El alumno ya alcanzó el tope de asistencias');
            location.href ='pagina_asistencia_tardia.html';</script>";
        }else{

            $insertar = Alumno::insertarAsistencia($dni_alumno,$fecha);
            $contenedor = $BD -> Ejecutar($insertar);

            if($contenedor){
                echo"<script> alert('¡Se pudo cargar la asistencia!');
                location.href ='pagina_asistencia_tardia.html';</script>";
            }
        }

    }
?>
