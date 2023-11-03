<?php
    require_once("../../../TAD/BD/conexion.php");
    require_once("../../Clases/Parametro.php");
    require_once("../../Clases/Persona.php");
    require_once("../../Clases/Alumno.php");
    
    $BD = new BD();

    $contenedorPromedio = Parametro::getParametros();
    $promedios = $BD -> Ejecutar($contenedorPromedio);

    $promedioAlumno = $promedios -> fetch_assoc();
    $promedio_promocion = $promedioAlumno["promedio_promocion"];
    $promedio_regularidad = $promedioAlumno["promedio_regularidad"];
    $cantidad_dias = $promedioAlumno["cantidad_dias"];
    
    $contenedorAsistencias = Alumno::contadorAsistencias();
    $asistencias = $BD -> Ejecutar($contenedorAsistencias);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Alumnos</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body style="background-image: url('../../Imagenes/Fondo_de_pantalla.png') ; background-repeat: no-repeat; background-position: center top; background-size: cover ;max-width: 100%; max-height: 100%; ">
<nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand">TAD</a>
        <div class="me-auto">
            <a href="/pagina_principal.html"><button class="btn btn-outline-info">Inicio</button></a>
            <a href="/Alumno/pagina_alumno.php"> <button class="btn btn-outline-light">Alumno</button></a>
            <a href="/Parametros/pagina_parametros.php"><button class="btn btn-outline-info">Configuración</button></a>
        </div>
    </nav>

  <div class="m-5" style="display: flex; justify-content: center;align-items: center;">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table table-info">
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php  
               
                    foreach($asistencias as $asistencia){
                        $contador = $asistencia["count(asistencia.dni_alumno)"];
                        $contador = (100 * $contador) / $cantidad_dias;
                        if($contador >= $promedio_promocion){
                ?>
                <tr class="table table-success">
                    <td><?php echo $asistencia["dni_alumno"]?></td>
                    <td><?php echo $asistencia["nombre_alumno"]?></td>
                    <td><?php echo $asistencia["apellido_alumno"]?></td>
                    <td><?php $fecha_nacimiento = date("d/m/Y", strtotime($asistencia["fecha_nacimiento_alumno"]));
                        echo $fecha_nacimiento?></td>
                    <td class="d-flex justify-content-center">Promocionado (<?php echo $contador."%" ?>)</td>
                </tr>
                <?php  }else if($contador >= $promedio_regularidad && $contador < $promedio_promocion){ ?>
                    <tr class="table table-warning">
                        <td><?php echo $asistencia["dni_alumno"]?></td>
                        <td><?php echo $asistencia["nombre_alumno"]?></td>
                        <td><?php echo $asistencia["apellido_alumno"]?></td>
                        <td><?php $fecha_nacimiento = date("d/m/Y", strtotime($asistencia["fecha_nacimiento_alumno"]));
                        echo $fecha_nacimiento?></td>
                        <td class="d-flex justify-content-center">Regular (<?php echo $contador."%" ?>)</td>
                    </tr>
                <?php   } else if($contador < $promedio_regularidad){  ?>
                    <tr class="table table-danger">
                        <td><?php echo $asistencia["dni_alumno"]?></td>
                        <td><?php echo $asistencia["nombre_alumno"]?></td>
                        <td><?php echo $asistencia["apellido_alumno"]?></td>
                        <td><?php $fecha_nacimiento = date("d/m/Y", strtotime($asistencia["fecha_nacimiento_alumno"]));
                        echo $fecha_nacimiento?></td>
                        <td class="d-flex justify-content-center">Libre (<?php echo $contador."%" ?>)</td>
                    </tr>
                    <?php  }}?>
            </tbody>
        </table>
    </div> 
</body>
</html>
