<?php
    require_once("../TAD/BD/conexion.php");
    require_once("../TAD/Clases/Alumno.php");
    require_once("../TAD/Clases/Persona.php");

    $BD = new BD();

    if(!empty($_POST["dni_alumno"]) && !empty($_POST["fecha"])){
        $dni_alumno = $_POST["dni_alumno"];
        $fecha = $_POST["fecha"];

        $insertar = Alumno::insertarAsistencia($dni_alumno,$fecha);
        $contenedor = $BD -> Ejecutar($insertar);
        if($contenedor){
            echo"<script> alert('¡Se pudo cargar la asistencia!');
            location.href ='pagina_asistencia_tardia.html';</script>";
        }
    }
?>