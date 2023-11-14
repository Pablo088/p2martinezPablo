<?php
 require_once("../../../TAD/BD/conexion.php");
 require_once("../../../TAD/Clases/Alumno.php");
 require_once("../../../TAD/Clases/Persona.php");
 require_once("../../../TAD/Clases/Parametro.php");

 $BD = new BD();

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alumno</title>
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
    <form action="alta_alumno.php" method="post">
        <div id="contenedor" class='mt-3 d-flex justify-content-center'>
            <input type="text" name="dni_alumno" placeholder="DNI">
            <input type="text" name="nombre_alumno" placeholder="Nombre">
            <input type="text" name="apellido_alumno" placeholder="Apellido">
            <input type="date" max="2006-06-01" name="fecha_nacimiento_alumno" placeholder="Fecha de Nacimiento">   
            <input type="submit" value="Agregar" class="btn btn-primary">
        </div>
    </form>
</html>


<?php
//mejorar  
if(!empty($_POST["dni_alumno"]) && !empty($_POST["nombre_alumno"]) && !empty($_POST["apellido_alumno"]) && !empty($_POST["fecha_nacimiento_alumno"])){
    
    
    $dni_alumno = $_POST["dni_alumno"];

    $alumnoDni = Alumno::buscarDNI($dni_alumno);
    $contenedorAlumno = $BD ->Ejecutar($alumnoDni);
    $dni_comparar = $contenedorAlumno -> fetch_assoc();

    if($dni_alumno == $dni_comparar["dni_alumno"]){
        echo"<script> alert('El DNI que ingresaste ya existe');
        location.href ='alta_alumno.php';</script>";
    }

    $nombre_alumno = $_POST["nombre_alumno"];
    $apellido_alumno = $_POST["apellido_alumno"];
    $fecha_nacimiento_alumno = $_POST["fecha_nacimiento_alumno"];


    $alumno = new Alumno($dni_alumno,$nombre_alumno,$apellido_alumno,$fecha_nacimiento_alumno);
    $insertar = Alumno::insertarAlumno($alumno);
    $insertarAlumno = $BD -> Ejecutar($insertar);
    

    if($insertarAlumno){
        ?><script> alert("¡<?php echo $nombre_alumno." ".$apellido_alumno; ?> fue agregado!");
            location.href ="alta_alumno.php";</script><?php
    }

}

?>
