<?php
   require_once("../TAD/BD/conexion.php");

if(isset($_POST["enviar"])){
    if(!empty($_POST["buscar"])){
        $dniBuscar = $_POST["buscar"];
       } else{
        echo"Introduzca datos o verifica la existencia de los datos que ingresas";
       }
}

$cantidadAlumnos = "Select * From alumno where dni_alumno = '$dniBuscar'";
$resultado = mysqli_query($connection,$cantidadAlumnos);
$alumnos = $resultado -> fetch_assoc();

        if($dniBuscar == $alumnos["dni_alumno"]){
            $nombreAlumno = $alumnos["nombre_alumno"];
            $apellidoAlumno = $alumnos["apellido_alumno"];
            date_default_timezone_set(timezoneId:"America/Argentina/Buenos_Aires");
            $fecha_hora = date("Y-m-d H:i");

            $contenedor = "INSERT INTO asistencia (dni_alumno,fecha_hora) values('$dniBuscar','$fecha_hora')";
            $asisteAlumno = mysqli_query($connection,$contenedor);
            if($asisteAlumno){
                ?><script>alert("Se pudo agregar la asistencia para <?php echo $nombreAlumno." ".$apellidoAlumno ?>");
                location.href="pagina_principal.html";
                </script><?php
        } 
    }
?>
