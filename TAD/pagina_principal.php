<?php
   require_once("../TAD/BD/conexion.php");
if(isset($_POST["enviar"])){
    if(!empty($_POST["buscar"])){
        $dniBuscar = $_POST["buscar"];
       } else{
        echo"<script> alert('Ingresa un DNI');
        location.href ='pagina_principal.html';</script>";
       }
}

$cantidadAlumnos = "Select * From alumno where dni_alumno = '$dniBuscar'";

$alumnos = $cantidadAlumnos -> fetch_assoc();

        if($dniBuscar == $alumnos["dni_alumno"]){
            $nombreAlumno = $alumnos["nombre_alumno"];
            $apellidoAlumno = $alumnos["apellido_alumno"];
            date_default_timezone_set(timezoneId:"America/Argentina/Buenos_Aires");
            $fecha_hora = date("Y-m-d H:i");

            $contenedor = "INSERT INTO asistencia (dni_alumno,fecha_hora) values('$dniBuscar','$fecha_hora')";
            $asisteAlumno = mysqli_query($connection,$contenedor);
            if($asisteAlumno){
                ?><script> alert("¡Se pudo cargar la asistencia para  <?php echo $nombreAlumno." ".$apellidoAlumno; ?>!");
                  location.href ="pagina_principal.html";</script><?php
        } 
    } else{
        echo"<script> alert('Verifica la existencia del DNI que ingresaste');
        location.href ='pagina_principal.html';</script>";
    }
    //agregar cambios
?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   

