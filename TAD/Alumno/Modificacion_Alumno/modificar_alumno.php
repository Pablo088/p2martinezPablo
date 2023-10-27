<?php
        require_once('../../../TAD/BD/conexion.php');

        if(!empty($_POST["dni_alumno"]) && !empty($_POST["dni_antiguo"]) && !empty($_POST["nombre_alumno"]) && !empty($_POST["apellido_alumno"]) && !empty($_POST["fecha_nacimiento_alumno"])){
            $dni_antiguo = $_POST["dni_antiguo"];
            $dni_alumno = $_POST["dni_alumno"];
            $nombre_alumno = $_POST["nombre_alumno"];
            $apellido_alumno = $_POST["apellido_alumno"];
            $fecha_nacimieto_alumno = $_POST["fecha_nacimiento_alumno"];

            date_default_timezone_set(timezoneId:"America/Argentina/Buenos_Aires");
            $fecha_actual = date("Y-m-d");
            $edad_alumno = $fecha_actual - $fecha_nacimiento_alumno;

            $minimo = "select edad_minima from parametros";
            $edad_minima_alumno = mysqli_query($connection, $minimo);
            $edad_minima = $edad_minima_alumno -> fetch_assoc();

            if ($edad_alumno < $edad_minima){
                echo"<script> alert('si');
                location.href ='/Alumno/pagina_alumno.php';</script>"; 
            }else{
                $contenedor = "UPDATE alumno SET nombre_alumno = '$nombre_alumno',apellido_alumno='$apellido_alumno',fecha_nacimiento_alumno='$fecha_nacimieto_alumno',dni_alumno ='$dni_alumno' where dni_alumno = '$dni_antiguo'";
                $actualizarAlumno = mysqli_query($connection,$contenedor);
            
            if($actualizarAlumno){
                ?><script> alert("¡Los datos fueron modificados!");
                  location.href ="/Alumno/pagina_alumno.php";</script><?php
            } 
        }
    }
?>
