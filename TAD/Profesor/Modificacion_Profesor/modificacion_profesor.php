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

    if(!empty($_POST["dni_profesor"]) && !empty($_POST["nombre_profesor"]) && !empty($_POST["apellido_profesor"]) && !empty($_POST["fecha_nacimiento_profesor"]) && !empty($_POST["apellido_profesor_original"]) && !empty($_POST["materia"])){
       
        $dni_profesor = $_POST["dni_profesor"];
        $nombre_profesor = $_POST["nombre_profesor"];
        $apellido_profesor = $_POST["apellido_profesor"];
        $fecha_nacimiento_profesor = $_POST["fecha_nacimiento_profesor"];
        $materia = $_POST["materia"];
        
        $contenedor = "UPDATE profesor SET dni_profesor='$dni_profesor',nombre_profesor='$nombre_profesor',apellido_profesor='$apellido_profesor',fecha_nacimiento_profesor='$fecha_nacimiento_profesor',materia='$materia'";
        $profesor = mysqli_query($connection,$contenedor);

        header("location:modificacion_profesor.php");
    }
?>
