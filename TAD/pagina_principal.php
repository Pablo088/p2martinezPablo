<?php
   require_once("../TAD/BD/conexion.php");

   $cantidadAlumnos = "Select * From alumno";
   $alumnos = mysqli_query($connection,$cantidadAlumnos);

if(isset($_POST["enviar"])){
    if(!empty($_POST["buscar"])){
        $dniBuscar = $_POST["buscar"];
       } else{
        echo"Introduzca datos o verifica la existencia de los datos que ingresas";
       }
}

    foreach($alumnos as $baseAlumno){
        if($dniBuscar == $baseAlumno["dni_alumno"]){
            $nombreAlumno = $baseAlumno["nombre_alumno"];
            $apellidoAlumno = $baseAlumno["apellido_alumno"];
            date_default_timezone_set(timezoneId:"America/Argentina/Buenos_Aires");
            $fecha_hora = date("Y-m-d H:i");

            $contenedor = "INSERT INTO asistencia (dni_alumno,fecha_hora) values('$dniBuscar','$fecha_hora')";
            $asisteAlumno = mysqli_query($connection,$contenedor);
            if($asisteAlumno){
                echo"<div class='mt-1 d-flex justify-content-center'>¡Se pudo agregar la asistencia a ".$nombreAlumno." ".$apellidoAlumno." !</div>";
            }
            break;
        } 
    }
?>