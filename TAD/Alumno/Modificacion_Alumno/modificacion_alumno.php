<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Alumno</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body class="bg-success bg-opacity-50">
    <h1 class='mt-3 d-flex justify-content-center'>Elegí al alumno que quieras modificar</h1>
    <form action="modificacion_alumno.php" method="post">
        <div class='mt-3 d-flex justify-content-center'>
            <input type="text" name="dni_alumno" placeholder="DNI">
            <input type="text" id="nombre_alumno" name="nombre_alumno" placeholder="Nombre" value="">
            <input type="text" id="apellido_alumno" name="apellido_alumno" placeholder="Apellido" value="">
            <input type="date" id="fecha_nacimiento_alumno" name="fecha_nacimiento_alumno" placeholder="Fecha de Nacimiento" value="">
            <input type="submit" value="Modificar" class="btn btn-primary">
        </div>
    </form>
    <div id="botones">
        <a href="/pagina_principal.html"><button class="btn btn-secondary">Volver a inicio</button></a>
        <a href="/Alumno/pagina_alumno.php"><button class="btn btn-secondary">Volver atrás</button></a>
    </div>
</body>
</html>

<?php
    require_once('../../../TAD/BD/conexion.php');

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
        echo("<input type='button' name='actualizar' value='modificar' onclick='modificar()'>");
        echo"</div>";
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

        echo "<div class='mt-1 d-flex justify-content-center'>¡Los datos del alumno fueron modificados exitosamente!</div>";
    }
?>

<script>
    function modificar(){
        const nombre_alumno=document.getElementById("nombre_alumno");
        const apellido_alumno=document.getElementById("apellido_alumno");
        const nacimiento_alumno=document.getElementById("fecha_nacimiento_alumno");

    }
</script>