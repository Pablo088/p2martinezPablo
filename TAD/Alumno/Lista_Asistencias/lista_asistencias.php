<?php
    require_once("../../../TAD/BD/conexion.php");
    $contenedorPromedio = "select * from parametros";
    $promedios = mysqli_query($connection,$contenedorPromedio);
    $promedioAlumno = $promedios -> fetch_assoc();
    $promedio_promocion = $promedioAlumno["promedio_promocion"];
    $promedio_regularidad = $promedioAlumno["promedio_regularidad"];
    $cantidad_dias = $promedioAlumno["cantidad_dias"];
    
    $contenedorAlumno = "select * from alumno";
    $alumnos = mysqli_query($connection,$contenedorAlumno);
    $alumno = $alumnos -> fetch_assoc();
    $dni = $alumno["dni_alumno"];
    
    $contenedorAsistencias = "select count(dni_alumno) from asistencia where dni_alumno = '$dni'";
    $asistencias = mysqli_query($connection,$contenedorAsistencias);
    $asistencia = $asistencias -> fetch_assoc();

    $contador = $asistencia["count(dni_alumno)"];
    $contador = (100 * $contador) / $cantidad_dias;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Alumnos</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body style="background-color: rgb(126, 184, 192);">
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
               
                    foreach($alumnos as $alumno){
                        if($contador >= $promedio_promocion){
                ?>
                <tr class="table table-success">
                    <td><?php echo $alumno["dni_alumno"]?></td>
                    <td><?php echo $alumno["nombre_alumno"]?></td>
                    <td><?php echo $alumno["apellido_alumno"]?></td>
                    <td><?php echo $alumno["fecha_nacimiento_alumno"]?></td>
                    <td class="d-flex justify-content-center">Promocion (<?php echo $contador."%" ?>)</td>
                </tr>
                <?php  }else if($contador >= $promedio_regularidad && $contador < $promedio_promocion){ ?>
                    <tr class="table table-warning">
                        <td><?php echo $alumno["dni_alumno"]?></td>
                        <td><?php echo $alumno["nombre_alumno"]?></td>
                        <td><?php echo $alumno["apellido_alumno"]?></td>
                        <td><?php echo $alumno["fecha_nacimiento_alumno"]?></td>
                        <td class="d-flex justify-content-center">Regular (<?php echo $contador."%" ?>)</td>
                    </tr>
                <?php   } else if($contador < $promedio_regularidad){  ?>
                    <tr class="table table-danger">
                        <td><?php echo $alumno["dni_alumno"]?></td>
                        <td><?php echo $alumno["nombre_alumno"]?></td>
                        <td><?php echo $alumno["apellido_alumno"]?></td>
                        <td><?php echo $alumno["fecha_nacimiento_alumno"]?></td>
                        <td class="d-flex justify-content-center">Libre (<?php echo $contador."%" ?>)</td>
                    </tr>
                    <?php  }} ?>
            </tbody>
        </table>
    </div>
</body>
</html>