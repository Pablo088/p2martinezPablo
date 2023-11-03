<?php
    require_once('../../../TAD/BD/conexion.php');
    require_once("../../../TAD/Clases/Alumno.php");
    require_once("../../../TAD/Clases/Persona.php");
    $BD = new BD();

    if(!empty($_GET["dni"])){
        $dni_alumno = $_GET["dni"];
        $consulta = Alumno::borrarAlumno($dni_alumno);
        $contenedor = $BD -> Ejecutar($consulta);

        if($contenedor){
            ?><script> alert("¡El alumno fue eliminado!");
            location.href ="/Alumno/pagina_alumno.php";</script><?php
        } 
    }
?>
