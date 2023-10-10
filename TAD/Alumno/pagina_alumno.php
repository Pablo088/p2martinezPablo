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
    <a href="../pagina_principal.html"><button class="btn btn-secondary">Volver atrás</button></a>
</body>
</html>

<?php
     require_once("../../TAD/BD/conexion.php");
         
    $listadoAlumnos = "Select * from alumno";
    $alumnoListado = mysqli_query($connection,$listadoAlumnos);

    foreach($alumnoListado as $listado){
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