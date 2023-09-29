<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alumno</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
    <h1 style="display: flex; justify-content:center;">Ingresá el nombre y apellido del alumno que queres agregar</h1>
    <form action="alta_alumno.php" method="post">
        <div id="contenedor" style="display: flex;justify-content: center;" class="mt-3">
            <input type="text" name="dni_alumno" placeholder="DNI">
            <input type="text" name="nombre_alumno" placeholder="Nombre">
            <input type="text" name="apellido_alumno" placeholder="Apellido">
            <input type="date" name="fecha_nacimiento_alumno" placeholder="Fecha de Nacimiento">
            <input type="submit" value="Agregar" class="btn btn-outline-primary">
        </div>
    </form>
    <a href="/pagina_principal.html"><button class="btn btn-outline-secondary">Volver a inicio</button></a>
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

    

    if(!empty($_POST["dni_alumno"]) && !empty($_POST["nombre_alumno"]) && !empty($_POST["apellido_alumno"]) && !empty($_POST["fecha_nacimiento_alumno"])){
        $dni_alumno = $_POST["dni_alumno"];
        $nombre_alumno = $_POST["nombre_alumno"];
        $apellido_alumno = $_POST["apellido_alumno"];
        $fecha_nacimiento_alumno = $_POST["fecha_nacimiento_alumno"];
        
        $contenedor = "INSERT INTO alumno (dni_alumno,nombre_alumno,apellido_alumno,fecha_nacimiento_alumno) values(:dni_alumno,:nombre_alumno,:apellido_alumno,:fecha_nacimiento_alumno)";
        $alumno = $connection -> prepare($contenedor);
        
        $alumno -> bindParam(":dni_alumno",$dni_alumno);
        $alumno -> bindParam(":nombre_alumno",$nombre_alumno);
        $alumno -> bindParam(":apellido_alumno",$apellido_alumno);
        $alumno -> bindParam(":fecha_nacimiento_alumno",$fecha_nacimiento_alumno);
        $alumno -> execute();

        header("location:alta_alumno.php");
    }
?>
