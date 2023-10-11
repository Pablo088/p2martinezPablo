<?php
     require_once("../../TAD/BD/conexion.php");
         
    $listadoAlumnos = "Select * from alumno";
    $alumnoListado = mysqli_query($connection,$listadoAlumnos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body style="background-color: rgb(126, 184, 192);">
    <h1 style="display: flex; justify-content: center;color: antiquewhite; margin-top: 10px;" >Agregá, eliminá o modificá el alumno que quieras</h1>
    <div class="mt-3" style="display: flex; justify-content: center;align-items: center;">
        <a href="/Alumno/Alta_Alumno/alta_alumno.php"><button class="btn btn-primary btn-lg">Agregar</button></a>
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table table-info">
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach($alumnoListado as $listado){ ?>
                <tr class="table table-primary">
                    <td><?php echo $listado["dni_alumno"]?></td>
                    <td><?php echo $listado["nombre_alumno"]?></td>
                    <td><?php echo $listado["apellido_alumno"]?></td>
                    <td><?php echo $listado["fecha_nacimiento_alumno"]?></td>
                    <td>
                        <a href='/Alumno/Baja_Alumno/baja_alumno.php?dni=<?php echo $listado["dni_alumno"]?>'><button class='btn btn-primary btn-lg' name='enviar'>Eliminar</button></a>
                        <a href='/Alumno/Modificacion_Alumno/modificacion_alumno.php?dni=<?php echo $listado["dni_alumno"]?>'><button class='btn btn-primary btn-lg' name='enviar'>Modificar</button></a>
        
                    </td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
    <a href="../pagina_principal.html"><button class="btn btn-secondary">Atrás</button></a>
</body>
</html>
