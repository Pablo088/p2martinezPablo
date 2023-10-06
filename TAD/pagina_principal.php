<?php
   require_once("../TAD/BD/conexion.php");

   $cantidadAlumnos = "Select dni_alumno,apellido_alumno,nombre_alumno From alumno";
   $preparo = $connection -> prepare($cantidadAlumnos);
   $preparo -> execute();
   $alumnos = $preparo -> fetchAll();

   if(!empty($_POST["buscar"])){
    $dniBuscar = $_POST["buscar"];
   }

    foreach($alumnos as $baseAlumno){
        if($dniBuscar == $baseAlumno["dni_alumno"]){
            $nombreAlumno = $baseAlumno["nombre_alumno"];
            $apellidoAlumno = $baseAlumno["apellido_alumno"];
            $cantidadAsistencia = 1;
            date_default_timezone_set(timezoneId:"America/Argentina/Buenos_Aires");
            $fecha_hora = date("Y-m-d H:i");

            $contenedor = "INSERT INTO asistencia (dni_alumno,cantidad_asistencias,fecha_hora) values(:dni_alumno,:cantidad_asistencias,:fecha_hora)";
            $asisteAlumno = $connection -> prepare($contenedor);
            $asisteAlumno -> bindParam(":dni_alumno",$dniBuscar);
            $asisteAlumno -> bindParam(":cantidad_asistencias",$cantidadAsistencia);
            $asisteAlumno -> bindParam(":fecha_hora",$fecha_hora);
            $asisteAlumno -> execute();

            echo"<div class='mt-1 d-flex justify-content-center'>¡Se pudo agregar la asistencia a ".$nombreAlumno." ".$apellidoAlumno." !</div>";
        } 
    }
?>
