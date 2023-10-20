<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alumno</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body class="bg-info bg-opacity-50">
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
            <input type="date" name="fecha_nacimiento_alumno" placeholder="Fecha de Nacimiento">
            <input type="submit" value="Agregar" class="btn btn-primary">
        </div>
    </form>

</body>
</html>


<?php
    require_once("../../../TAD/BD/conexion.php");

    if(!empty($_POST["dni_alumno"]) && !empty($_POST["nombre_alumno"]) && !empty($_POST["apellido_alumno"]) && !empty($_POST["fecha_nacimiento_alumno"])){
        $dni_alumno = $_POST["dni_alumno"];
        $contenedor = "select dni_alumno from alumno where dni_alumno = '$dni_alumno'";
        $dni_verificar = mysqli_query($connection,$contenedor);
        $dni_comparar = $dni_verificar -> fetch_assoc();
        if($dni_alumno == $dni_comparar["dni_alumno"]){
            echo"<script> alert('El DNI que ingresaste ya existe');
            location.href ='alta_alumno.php';</script>";
        }

        $nombre_alumno = $_POST["nombre_alumno"];
        $apellido_alumno = $_POST["apellido_alumno"];
        $fecha_nacimiento_alumno = $_POST["fecha_nacimiento_alumno"];

        date_default_timezone_set(timezoneId:"America/Argentina/Buenos_Aires");
        $fecha_actual = date("Y-m-d");
        $edad_alumno = $fecha_actual - $fecha_nacimiento_alumno;

        $minimo = "select edad_minima from parametros";
        $edad_minima_alumno = mysqli_query($connection, $minimo);
        $edad_minima = $edad_minima_alumno -> fetch_assoc();


        if ($edad_alumno < $edad_minima){
            echo"<script> alert('La edad del alumno no es suficiente para pasar la inscripcion');
            location.href ='alta_alumno.php';</script>"; 
        }else{
        
        $contenedor = "INSERT INTO alumno (dni_alumno,nombre_alumno,apellido_alumno,fecha_nacimiento_alumno) values('$dni_alumno','$nombre_alumno','$apellido_alumno','$fecha_nacimiento_alumno')";
        $alumno = mysqli_query($connection,$contenedor);
        

        if($alumno){
            ?><script> alert("¡<?php echo $nombre_alumno." ".$apellido_alumno; ?> fue agregado!");
              location.href ="alta_alumno.php";</script><?php
        } }
    }
?>
