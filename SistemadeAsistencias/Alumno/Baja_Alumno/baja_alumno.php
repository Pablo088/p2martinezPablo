<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Alumno</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body class="bg-success bg-opacity-50">
    <h1 class='mt-3 d-flex justify-content-center'>Ingresá el nombre y apellido del alumno que queres borrar</h1>
    <form action="baja_alumno.php" method="post">
        <div class='mt-3 d-flex justify-content-center'>
            <input type="text" name="nombre_alumno_original" placeholder="Nombre">
            <input type="text" name="apellido_alumno_original" placeholder="Apellido">
            <input type="submit" value="Borrar" class="btn btn-primary">
        </div>
    </form>
    <div id="botones">
        <a href="/pagina_principal.html"><button class="btn btn-secondary">Volver a inicio</button></a>
        <a href="/Alumno/pagina_alumno.php"><button class="btn btn-secondary">Volver atrás</button></a>
    </div>
</body>
</html>

<?php
    require_once('../../../SistemaDeAsistencias/BD/conexion.php');

    if(!empty($_POST["apellido_alumno_original"]) && !empty($_POST["apellido_alumno_original"])){
       
        $nombre_original = $_POST["nombre_alumno_original"];
        $apellido_original = $_POST["apellido_alumno_original"];
        
        $contenedor = "DELETE  FROM alumno WHERE nombre_alumno = :nombre_alumno_original and apellido_alumno = :apellido_alumno_original";
        $alumno = $connection -> prepare($contenedor);
    
        $alumno -> bindParam(":nombre_alumno_original",$nombre_original);
        $alumno -> bindParam(":apellido_alumno_original",$apellido_original);
        $alumno -> execute();

        echo "<div class='mt-3 d-flex justify-content-center'>¡El alumno fue eliminado exitosamente!</div>";
    }
?>
