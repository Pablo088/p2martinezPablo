<?php
   require_once("../TAD/BD/conexion.php");

   $cantidadAlumnos = "Select dni_alumno,apellido_alumno,nombre_alumno From alumno";
   $preparo = $connection -> prepare($cantidadAlumnos);
   $preparo -> execute();
   $alumnos = $preparo -> fetchAll();

   $cantidadAsistencia = "Select * From asistencia";
   $prepara = $connection -> prepare($cantidadAsistencia);
   $prepara -> execute();
   $asistencia = $prepara -> fetchAll();

   if(!empty($_POST["buscar"])){
    $dniBuscar = $_POST["buscar"];
   }

    foreach($alumnos as $baseAlumno){
        $nombreAlumno = $baseAlumno["nombre_alumno"];
        $apellidoAlumno = $baseAlumno["apellido_alumno"];
       foreach ($asistencia as $asistencias){
        if($dniBuscar == $asistencias["dni_alumno"] or $dniBuscar !== $asistencias["dni_alumno"]){
            $cantidadAsistencia = 1;

            $asistenciaAlumno = "INSERT INTO asistencia (dni_alumno,cantidad_asistencias) values(:dni_alumno,:cantidad_asistencias)";
            $asisteAlumno = $connection -> prepare($asistenciaAlumno);
            $asisteAlumno -> bindParam(":dni_alumno",$dniBuscar);
            $asisteAlumno -> bindParam(":cantidad_asistencias",$cantidadAsistencia);
            $asisteAlumno -> execute();

            echo"<div class='mt-1 d-flex justify-content-center'>¡Se pudo agregar la asistencia a ".$nombreAlumno." ".$apellidoAlumno." !</div>";

        } 
       }
    }
?>