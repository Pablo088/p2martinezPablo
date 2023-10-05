<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body style="background-color: rgb(126, 184, 192);">
    <h1 style="display: flex; justify-content: center;color: antiquewhite; margin-top: 10px;" >Agregá, eliminá o modificá el alumno que quieras</h1>
    <div class="mt-3" style="display: flex; justify-content: center;align-items: center;">
        <a href="/Alumno/Alta_Alumno/alta_alumno.php"><button class="btn btn-primary btn-lg">Agregar</button></a>
        <a href="/Alumno/Baja_Alumno/baja_alumno.php"><button class="btn btn-primary btn-lg">Eliminar</button></a>
        <a href="/Alumno/Modificacion_Alumno/modificacion_alumno.php"><button class="btn btn-primary btn-lg">Modificar</button></a>
    </div>
</body>
</html>

<?php
     require_once('../../../www/SistemadeAsistencias/BD/conexion.php');
         
    $listadoAlumnos = "Select * from alumno";
    $preparo = $connection -> prepare($listadoAlumnos);
    $preparo -> execute();
    $alumnos = $preparo ->fetchAll();

    foreach($alumnos as $listado){
        echo "<div class='mt-1 d-flex justify-content-center'>";
        echo($listado["dni_alumno"]);
        echo" ";
        echo($listado["nombre_alumno"]);
        echo" ";
        echo($listado["apellido_alumno"]);
        echo" ";
        echo($listado["fecha_nacimiento_alumno"]);
        echo" ";
        echo"</div>";
    }
?>