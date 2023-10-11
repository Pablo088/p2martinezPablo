<?php
    require_once('../../../TAD/BD/conexion.php');
    if(!empty($_GET["dni"])){
        $dni_alumno = $_GET["dni"];
        $contenedor = "DELETE FROM alumno, asistencia where dni_alumno = '$dni_alumno'";
        $alumno = mysqli_query($connection,$contenedor);

        if($alumno){
            ?><script> alert("¡El alumno fue eliminado!");
            location.href ="/Alumno/pagina_alumno.php";</script><?php
        } 
    }
?>
