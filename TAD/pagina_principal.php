<?php
     require_once("../../TAD/BD/conexion.php");
         
    $listadoAlumnos = "Select * from alumno";
    $alumnoListado = mysqli_query($connection,$listadoAlumnos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body style="background-color: rgb(126, 184, 192);">
    <a href="../pagina_principal.html"><button class="btn btn-secondary">Atrás</button></a>
    <h1 style="display: flex; justify-content: center;color: antiquewhite; margin-top: 10px;" >Agregá, eliminá o modificá el alumno que quieras</h1>
    <div class="d-flex justify-content-center">
    <a href="/Alumno/Alta_Alumno/alta_alumno.php"><button class="btn btn-primary btn-lg">Agregar</button></a>
    </div>
    <div class="m-5" style="display: flex; justify-content: center;align-items: center;">
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
                    <td class="d-flex justify-content-center">
                        <a href='/Alumno/Modificacion_Alumno/modificacion_alumno.php?dni=<?php echo $listado["dni_alumno"]?>'><button class='btn btn-primary btn-lg' name='enviar'>Modificar</button></a>
                        <a href='/Alumno/Baja_Alumno/baja_alumno.php?dni=<?php echo $listado["dni_alumno"]?>'><button onclick="verificar()" class='borrar btn btn-primary btn-lg' name='enviar' >Eliminar</button></a>

                    </td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
    
    <script src="pagina_alumno.js"></script>
</body>
</html>
