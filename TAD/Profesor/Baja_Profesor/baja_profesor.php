<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar profesor</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
    <form action="baja_profesor.php" method="post">
        <div>
            <h1 style="display: flex; justify-content:center;">Ingresá el nombre y apellido del profesor que queres borrar</h1>
            <input type="text" name="nombre_profesor_original" placeholder="Nombre">
            <input type="text" name="apellido_profesor_original" placeholder="Apellido">
            <input type="submit" value="Borrar" class="btn btn-outline-primary">
        </div>
    </form>
    <a href="/pagina_principal.html"><button class="btn btn-outline-secondary">Volver a inicio</button></a>
</body>
</html>

<?php
    require_once('../../../SistemaDeAsistencias/BD/conexion.php');

    if(!empty($_POST["apellido_profesor_original"]) && !empty($_POST["apellido_profesor_original"])){
       
        $nombre_original = $_POST["nombre_profesor_original"];
        $apellido_original = $_POST["apellido_profesor_original"];
        
        $contenedor = "DELETE  FROM profesor WHERE nombre_profesor = :nombre_profesor_original and apellido_profesor = :apellido_profesor_original";
        $profesor = mysqli_query($connection,$contenedor);

        header("location:baja_profesor.php");
    }
?>
