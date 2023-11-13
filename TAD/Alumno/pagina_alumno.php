<?php
     require_once("../../TAD/BD/conexion.php");
     require_once("../../TAD/Clases/Alumno.php");
     require_once("../../TAD/Clases/Persona.php");
         
    $BD = new BD();
    
    $consulta = Alumno::listaAlumnos();
    $contenedor = $BD->Ejecutar($consulta);
    $alumnoListado = $contenedor;
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
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
    <div class="d-flex justify-content-center">
    <a href="/Alumno/Alta_Alumno/alta_alumno.php"><button class="btn btn-outline-primary btn-lg mt-4 ">Agregar Alumno</button></a>
    <a href="/Alumno/Lista_Asistencias/lista_asistencias.php"><button class="btn btn-outline-primary btn-lg mt-4 mx-2">Promedio de Asistencias</button></a>
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
                    <td><?php $fecha_nacimiento = date("d/m/Y", strtotime($listado["fecha_nacimiento_alumno"]));
                        echo $fecha_nacimiento?></td>
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
