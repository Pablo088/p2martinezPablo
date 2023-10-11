<?php
        require_once('../../../TAD/BD/conexion.php');

        if(!empty($_POST["dni_alumno"]) && !empty($_POST["nombre_alumno"]) && !empty($_POST["apellido_alumno"]) && !empty($_POST["fecha_nacimiento_alumno"])){
            $dni_alumno = $_POST["dni_alumno"];
            $nombre_alumno = $_POST["nombre_alumno"];
            $apellido_alumno = $_POST["apellido_alumno"];
            $fecha_nacimieto_alumno = $_POST["fecha_nacimiento_alumno"];

            $contenedor = "UPDATE alumno SET dni_alumno ='$dni_alumno',nombre_alumno = '$nombre_alumno',apellido_alumno='$apellido_alumno',fecha_nacimiento_alumno='$fecha_nacimieto_alumno' where dni_alumno = '$dni_alumno'";
            $actualizarAlumno = mysqli_query($connection,$contenedor);

            echo"Alumno actualizado!";
    }
?>