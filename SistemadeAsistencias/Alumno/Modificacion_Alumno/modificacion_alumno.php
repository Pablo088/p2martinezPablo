<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Alumno</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
    <form action="modificacion_alumno.php" method="post">
        <div style="display: flex;justify-content: center;" class="mt-3">
        <input type="text" name="dni_alumno" placeholder="DNI">
            <input type="text" id="alumno_nombre" name="nombre_alumno" placeholder="Nombre" value="">
            <input type="text" name="apellido_alumno" placeholder="Apellido">
            <input type="date" name="fecha_nacimiento_alumno" placeholder="Fecha de Nacimiento">
            <input type="submit" value="Modificar" class="btn btn-outline-primary">
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
        echo("<input type='button' name='actualizar' value='modificar' onclick='modificar()'>");
    }

    if(!empty($_POST["dni_alumno"]) && !empty($_POST["nombre_alumno"]) && !empty($_POST["apellido_alumno"]) && !empty($_POST["fecha_nacimiento_alumno"]) && !empty($_POST["apellido_alumno_original"]) && !empty($_POST["apellido_alumno_original"])){
       
        $dni_alumno = $_POST["dni_alumno"];
        $nombre_alumno = $_POST["nombre_alumno"];
        $apellido_alumno = $_POST["apellido_alumno"];
        $fecha_nacimiento_alumno = $_POST["fecha_nacimiento_alumno"];
        
        $contenedor = "UPDATE alumno SET dni_alumno=:dni_alumno,nombre_alumno=:nombre_alumno,apellido_alumno=:apellido_alumno,fecha_nacimiento_alumno=:fecha_nacimiento_alumno WHERE nombre_alumno=:nombre_alumno_original and apellido_alumno = :apellido_alumno_original";
        $alumno = $connection -> prepare($contenedor);
    
        $alumno -> bindParam(":dni_alumno",$dni_alumno);
        $alumno -> bindParam(":nombre_alumno",$nombre_alumno);
        $alumno -> bindParam(":apellido_alumno",$apellido_alumno);
        $alumno -> bindParam(":fecha_nacimiento_alumno",$fecha_nacimiento_alumno);
        $alumno -> bindParam(":nombre_alumno_original",$nombre_original);
        $alumno -> bindParam(":apellido_alumno_original",$apellido_alumno);
        $alumno -> execute();

        header("location:modificacion_alumno.php");
    }
?>

<script>
    function modificar(){
        
    }
</script>