<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Alumno</title>
</head>
<body>
    <form action="baja_alumno.php" method="post">
        <div>
            <h3>Ingresá el nombre y apellido del alumno que queres borrar</h3>
            <input type="text" name="nombre_alumno_original" placeholder="Nombre">
            <input type="text" name="apellido_alumno_original" placeholder="Apellido">
            <input type="submit" value="Borrar">
        </div>
    </form>
</body>
</html>

<?php
    require_once('../../../SistemaDeAsistencias/BD/conexion.php');

    $listadoAlumnos = "Select * from alumno";
    $preparo = $connection -> prepare($listadoAlumnos);
    $preparo -> execute();
    $alumnos = $preparo ->fetchAll();

    foreach($alumnos as $listado){
        echo("<br>");
        echo($listado["dni_alumno"]);
        echo" ";
        echo($listado["nombre_alumno"]);
        echo" ";
        echo($listado["apellido_alumno"]);
        echo" ";
        echo($listado["fecha_nacimiento_alumno"]);
        echo" ";
    }

    if(!empty($_POST["apellido_alumno_original"]) && !empty($_POST["apellido_alumno_original"])){
       
        $nombre_original = $_POST["nombre_alumno_original"];
        $apellido_original = $_POST["apellido_alumno_original"];
        
        $contenedor = "DELETE  FROM alumno WHERE nombre_alumno = :nombre_alumno_original and apellido_alumno = :apellido_alumno_original";
        $alumno = $connection -> prepare($contenedor);
    
        $alumno -> bindParam(":nombre_alumno_original",$nombre_original);
        $alumno -> bindParam(":apellido_alumno_original",$apellido_original);
        $alumno -> execute();

        header("location:baja_alumno.php");
    }
?>
