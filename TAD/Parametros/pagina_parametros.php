<?php
    require_once("../../TAD/BD/conexion.php");
    require_once("../Clases/Parametro.php");
    $BD = new BD();

    $parametro = Parametro::getParametros();
    $contenedor = $BD->Ejecutar($parametro);
    $configuracion = $contenedor -> fetch_assoc();

    $cantidad_dias = $configuracion["cantidad_dias"];
    $promedio_promocion = $configuracion["promedio_promocion"];
    $promedio_regularidad = $configuracion["promedio_regularidad"];
    $edad_minima = $configuracion["edad_minima"];


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parametros</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body class="bg-secondary bg-opacity-25">
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand">TAD</a>
        <div class="me-auto">
            <a href="/pagina_principal.html"><button class="btn btn-outline-info">Inicio</button></a>
            <a href="/Alumno/pagina_alumno.php"> <button class="btn btn-outline-info">Alumno</button></a>
            <a href="/Parametros/pagina_parametros.php"><button class="btn btn-outline-light">Configuración</button></a>
        </div>
    </nav>

    <h1 class="d-flex justify-content-center border border-3 border-primary rounded-start mx-5 m-4 bg-black text-white">Configuración</h1>
    <form action="/Parametros/configuracion.php" method="post" class="d-flex justify-content-center m-4 border border-3 border-primary rounded-start mx-5 text-white bg-black">

        <div>
                <h3>Cantidad de Días de Clases</h3>
                <input type="number" name="cantidad_dias" value="<?php echo $cantidad_dias ?>" class="form-control bg-light text-black">
                <h3>Promedio de Promocion</h3>
                <input type="number" name="promedio_promocion" value="<?php echo $promedio_promocion ?>" class="form-control bg-success">
                <h3>Promedio de Regularidad</h3>
                <input type="number" name="promedio_regularidad" value="<?php echo $promedio_regularidad ?>" class="form-control bg-warning">
                <h3>Edad Minima</h3>
                <input type="number" name="edad_minima" value="<?php echo $edad_minima ?>" class="form-control bg-light">
                <p class="d-flex justify-content-center"><input type="submit" name="enviar" class="btn btn-light m-4 btn-lg" value="Guardar"></p>
        </div>
    </form>
</body>
</html>
