<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
    <h1 style="display: flex; justify-content: center;color: antiquewhite; margin-top: 10px;" >Agregá, eliminá o modificá el Profesor que quieras</h1>
    <div class="mt-3" style="display: flex; justify-content: center;align-items: center;">
        <a href="/Profesor/Alta_Profesor/alta_profesor.php"><button class="btn btn-outline-primary btn-lg">Agregar</button></a>
        <a href="/Profesor/Baja_Profesor/baja_profesor.php"><button class="btn btn-outline-warning btn-lg">Eliminar</button></a>
        <a href="/Profesor/Modificacion_Profesor/modificacion_profesor.php"><button class="btn btn-outline-primary btn-lg">Modificar</button></a>
    </div>
</body>
</html>

<?php
     require_once("../../TAD/BD/conexion.php");
         
    $listadoProfesor = "Select * from profesor";
    $profesorListado = mysqli_query($connection,$listadoProfesor);

    foreach($profesorListado as $listado){
        echo "<div class='mt-1 d-flex justify-content-center'>";
        echo($listado["dni_profesor"]);
        echo" ";
        echo($listado["nombre_profesor"]);
        echo" ";
        echo($listado["apellido_profesor"]);
        echo" ";
        echo($listado["fecha_nacimiento_profesor"]);
        echo" ";
        echo($listado["materia"]);
        echo" ";
        echo"</div>";
    }
?>