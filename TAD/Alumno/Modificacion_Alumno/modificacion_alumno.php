<?php
    require_once('../../../TAD/BD/conexion.php');
        if(!empty($_GET["dni"])){
            $dni_alumno = $_GET["dni"];
            $listadoAlumno = "Select * from alumno where dni_alumno='$dni_alumno'";
            $contenedor = mysqli_query($connection,$listadoAlumno);
            $alumno = mysqli_fetch_assoc($contenedor);
    
            $nombre_alumno = $alumno["nombre_alumno"];
            $apellido_alumno = $alumno["apellido_alumno"];
            $fecha_nacimiento_alumno = $alumno["fecha_nacimiento_alumno"];
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Alumno</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body class="bg-info bg-opacity-50">
    <form action="/Alumno/Modificacion_Alumno/modificar_alumno.php" method="post">
        <div class='mt-3 d-flex justify-content-center'>
            <input type="text" name="dni_alumno" value="<?php echo $dni_alumno?>">
            <input type="text" name="nombre_alumno" value="<?php echo $nombre_alumno?>">
            <input type="text" name="apellido_alumno" value="<?php echo $apellido_alumno?>">
            <input type="date" name="fecha_nacimiento_alumno" value="<?php echo $fecha_nacimiento_alumno?>">
            <input type="submit" name="enviar" class="btn btn-primary" value="Modificar">
        </div>
    </form>
    <div class="m-4 container d-flex justify-content-center">
            <a href="/pagina_principal.html"><button class="btn btn-secondary">Inicio</button></a>
            <a href="/Alumno/pagina_alumno.php"><button class="btn btn-secondary">Atrás</button></a>
    </div>
</body>
</html>
