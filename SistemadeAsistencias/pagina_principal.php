<?php
   require_once('../../../laragon/www/SistemadeAsistencias/BD/conexion.php');

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
       foreach ($asistencia as $asistencias){
        if($dniBuscar == $baseAlumno["dni_alumno"] && $dniBuscar !== $asistencias["dni_alumno"]){
            $nombreAlumno = $baseAlumno["nombre_alumno"];
            $apellidoAlumno = $baseAlumno["apellido_alumno"];

            $cantidadAsistencia = 1;

            $asistenciaAlumno = "INSERT INTO asistencia (dni_alumno,cantidad_asistencias) values(:dni_alumno,:cantidad_asistencias)";
            $asisteAlumno = $connection -> prepare($asistenciaAlumno);
            $asisteAlumno -> bindParam(":dni_alumno",$dniBuscar);
            $asisteAlumno -> bindParam(":cantidad_asistencias",$cantidadAsistencia);
            $asisteAlumno -> execute();

            echo"<div class='mt-1 d-flex justify-content-center'>¡Se pudo agregar la asistencia a ".$nombreAlumno." ".$apellidoAlumno." !</div>";

        } else if ($dniBuscar == $baseAlumno["dni_alumno"] && $dniBuscar == $asistencias["dni_alumno"]) {
            $cantidadAsistencia = $asistencias["cantidad_asistencias"];
            $cantidadAsistencia = $cantidadAsistencia + 1;
           
            $asistenciaAlumno = "UPDATE asistencia SET cantidad_asistencias = :cantidad_asistencias where dni_alumno = :dni_alumno";
            $asisteAlumno = $connection -> prepare($asistenciaAlumno);
            $asisteAlumno -> bindParam(":cantidad_asistencias",$cantidadAsistencia);
            $asisteAlumno -> bindParam(":dni_alumno",$dniBuscar);
            $asisteAlumno -> execute();
        }
       }
    }
?>
