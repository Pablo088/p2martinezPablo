<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Profesor</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
    <form action="modificacion_profesor.php" method="post">
        <h1>Ingrese el nombre y apellido del profesor que quiere modificar</h1>
        <div >
            <input type="text" name="nombre_profesor_original" placeholder="Nombre original">
            <input type="text" name="apellido_profesor_original" placeholder="Apellido original">
        </div>
        <div>
        <input type="text" name="dni_profesor" placeholder="DNI">
            <input type="text" name="nombre_profesor" placeholder="Nombre">
            <input type="text" name="apellido_profesor" placeholder="Apellido">
            <input type="date" name="fecha_nacimiento_profesor" placeholder="Fecha de Nacimiento">
            <input type="text" name="materia" placeholder="Materia">
            <input type="submit" value="Modificar" class="btn btn-outline-primary">
        </div>
    </form>
    <a href="/pagina_principal.html"><button class="btn btn-outline-secondary">Volver a inicio</button></a>
</body>
</html>

<?php
    require_once('../../../SistemaDeAsistencias/BD/conexion.php');

    $listadoProfesores = "Select * from profesor";
    $preparo = $connection -> prepare($listadoProfesores);
    $preparo -> execute();
    $profesores = $preparo ->fetchAll();

    foreach($profesores as $listado){
        echo("<br>");
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
    }

    if(!empty($_POST["dni_profesor"]) && !empty($_POST["nombre_profesor"]) && !empty($_POST["apellido_profesor"]) && !empty($_POST["fecha_nacimiento_profesor"]) && !empty($_POST["apellido_profesor_original"]) && !empty($_POST["materia"])){
       
        $nombre_original = $_POST["nombre_profesor_original"];
        $apellido_original = $_POST["apellido_profesor_original"];
        $dni_profesor = $_POST["dni_profesor"];
        $nombre_profesor = $_POST["nombre_profesor"];
        $apellido_profesor = $_POST["apellido_profesor"];
        $fecha_nacimiento_profesor = $_POST["fecha_nacimiento_profesor"];
        $materia = $_POST["materia"];
        
        $contenedor = "UPDATE profesor SET dni_profesor=:dni_profesor,nombre_profesor=:nombre_profesor,apellido_profesor=:apellido_profesor,fecha_nacimiento_profesor=:fecha_nacimiento_profesor,materia=:materia WHERE nombre_profesor=:nombre_profesor_original and apellido_profesor = :apellido_profesor_original";
        $profesor = $connection -> prepare($contenedor);
    
        $profesor -> bindParam(":dni_profesor",$dni_profesor);
        $profesor -> bindParam(":nombre_profesor",$nombre_profesor);
        $profesor -> bindParam(":apellido_profesor",$apellido_profesor);
        $profesor -> bindParam(":fecha_nacimiento_profesor",$fecha_nacimiento_profesor);
        $profesor -> bindParam(":materia",$materia);
        $profesor -> bindParam(":nombre_profesor_original",$nombre_original);
        $profesor -> bindParam(":apellido_profesor_original",$apellido_profesor);
        $profesor -> execute();

        header("location:modificacion_profesor.php");
    }
?>
