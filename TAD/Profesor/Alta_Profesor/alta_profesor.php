<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Profesor</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
    <h1 style="display: flex; justify-content:center;">Ingresá el nombre y apellido del profesor que queres agregar</h1>
    <form action="alta_profesor.php" method="post">
        <div id="contenedor" style="display: flex;justify-content: center;" class="mt-3">
            <input type="text" name="dni_profesor" placeholder="DNI">
            <input type="text" name="nombre_profesor" placeholder="Nombre">
            <input type="text" name="apellido_profesor" placeholder="Apellido">
            <input type="date" name="fecha_nacimiento_profesor" placeholder="Fecha de Nacimiento">
            <input type="text" name="materia" placeholder="Materia">
            <input type="submit" name="enviar" value="Agregar" class="btn btn-outline-primary">
        </div>
    </form>
    <a href="/pagina_principal.html"><button class="btn btn-outline-secondary">Volver a inicio</button></a>
</body>
</html>


<?php
    require_once('../../../TAD/BD/conexion.php');

    $listadoProfesor = "Select * from profesor";    
    $profesor = mysqli_query($connection,$listadoProfesor);

    foreach($profesor as $listado){
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

        if(isset($_POST["enviar"])){
            if(!empty($_POST["dni_profesor"]) && !empty($_POST["nombre_profesor"]) && !empty($_POST["apellido_profesor"]) && !empty($_POST["fecha_nacimiento_profesor"]) && !empty($_POST["materia"])){
                $dni_profesor = $_POST["dni_profesor"];
                $nombre_profesor = $_POST["nombre_profesor"];
                $apellido_profesor = $_POST["apellido_profesor"];
                $fecha_nacimiento_profesor = $_POST["fecha_nacimiento_profesor"];
                $materia = $_POST["materia"];
                
                $contenedor = "INSERT INTO profesor (dni_profesor,nombre_profesor,apellido_profesor,fecha_nacimiento_profesor,materia) values('$dni_profesor','$nombre_profesor','$apellido_profesor','$fecha_nacimiento_profesor','$materia')";
                $profesor = mysqli_query($connection,$contenedor);
                ?><script>alert("!<?php echo $nombre_profesor." ".$apellido_profesor?> fue registrado con exito!");</script><?php
            }
        }
    }
?>
