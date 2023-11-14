<?php
    require_once('../../../TAD/BD/conexion.php');
    require_once('../../../TAD/Clases/Alumno.php');
    require_once('../../../TAD/Clases/Persona.php');
    $BD = new BD(); 
        if(!empty($_GET["dni"])){
            $dni_alumno = $_GET["dni"];
            $listadoAlumno = Alumno::getAlumno($dni_alumno);
            $contenedor = $BD -> Ejecutar($listadoAlumno);
            $alumno = mysqli_fetch_assoc($contenedor);
    
            $nombre_alumno = $alumno["nombre_alumno"];
            $apellido_alumno = $alumno["apellido_alumno"];
            $fecha_nacimiento_alumno = $alumno["fecha_nacimiento_alumno"];
        }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Alumno</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body style="background-image: url('../../Imagenes/Fondo_de_pantalla.png') ; background-repeat: no-repeat; background-position: center top; background-size: cover ;max-width: 100%; max-height: 100%; ">
<nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand">TAD</a>
        <div class=" me-auto">
            <a href="/pagina_principal.html"><button class="btn btn-outline-info">Inicio</button></a>
            <a href="/Alumno/pagina_alumno.php"> <button class="btn btn-outline-light">Alumno</button></a>
            <a href="/Parametros/pagina_parametros.php"><button class="btn btn-outline-info">Configuración</button></a>
        </div>
    </nav>

<form action="/Alumno/Modificacion_Alumno/modificar_alumno.php" method="post">
        <div class='mt-3 d-flex justify-content-center'>
            <input type="hidden" name="dni_antiguo" value="<?php echo $dni_alumno?>">
            <input type="text" name="dni_alumno" value="<?php echo $dni_alumno?>">
            <input type="text" name="nombre_alumno" value="<?php echo $nombre_alumno?>">
            <input type="text" name="apellido_alumno" value="<?php echo $apellido_alumno?>">
            <input type="date" name="fecha_nacimiento_alumno" max="2006-06-01" value="<?php echo $fecha_nacimiento_alumno?>">
            <input type="submit" name="enviar" class="btn btn-primary" value="Modificar">
        </div>
    </form>
</body>
</html>
