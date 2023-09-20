<?php
    require_once('./BD/conexion.php');

    $listadoAlumnos = "Select * from alumno";
    $preparo = $connection -> prepare($listadoAlumnos);
    $preparo -> execute();
    $alumnos = $preparo ->fetchAll();

    foreach($alumnos as $listado){
        echo($listado["dni_alumno"]);
        echo"<br> ";
        echo($listado["nombre_alumno"]);
        echo"<br> ";
        echo($listado["apellido_alumno"]);
        echo"<br> ";
        echo($listado["fecha_nacimiento_alumno"]);
        echo"<br> ";
    }
?>
