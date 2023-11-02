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
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand">TAD</a>
        <div class="me-auto">
            <a href="/pagina_principal.html"><button class="btn btn-outline-info">Inicio</button></a>
            <a href="/Alumno/pagina_alumno.php"> <button class="btn btn-outline-info">Alumno</button></a>
            <a href="/Parametros/pagina_parametros.php"><button class="btn btn-outline-light">Configuración</button></a>
        </div>
    </nav>
    <form action="/Parametros/configuracion.php" method="post">
        <div>
            <div class="align-items-centre">
                <h1>Configuración</h1>
                <h3>Cantidad de días</h3>
                <input type="number" name="cantidad_dias" value="<?php echo $cantidad_dias ?>">
                <h3>Promedio de Promocion</h3>
                <input type="number" name="promedio_promocion" value="<?php echo $promedio_promocion ?>" >
                <h3>Promedio de regularidad</h3>
                <input type="number" name="promedio_regularidad" value="<?php echo $promedio_regularidad ?>" >
                <h3>Edad Minima</h3>
                <input type="number" name="edad_minima" value="<?php echo $edad_minima ?>" >
                <p><input type="submit" name="enviar" class="btn btn-primary mt-4" value="Guardar"></p>
            </div>
        </div>
    </form>
</body>
</html>