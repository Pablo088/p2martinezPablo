<?php
    require_once('../../../TAD/BD/conexion.php');
?>

<?php
    
    $dni_alumnos=$_GET['id'];
    $listadoAlumnos = "Select * from alumno where dni_alumno='".$dni_alumnos."'";
    //$alumnos = mysqli_query($connection,$listadoAlumnos);



  /*  if (isset($_GET['id'])) {
        $dni_alumno = $_GET['id'];
        
        // Consulta SQL para recuperar información del alumno
        $sql = "SELECT * FROM alumno WHERE dni_alumno = $dni_alumno";
        $result = $connection->query($sql);
    
        if ($result->num_rows > 0) {
            // Procesar los resultados
            while ($row = $result->fetch_assoc()) {
                // Acceder a los datos recuperados
                $nombre = $row["nombre"];
                $apellido = $row["apellido"];
                // ... y otros campos
                echo "Nombre: $nombre, Apellido: $apellido";
            }
        } else {
            echo "No se encontraron resultados para el DNI de alumno: $dni_alumno";
        }
    } else {
        echo "El parámetro 'id' no se encontró en la URL.";
    }
    /*foreach($alumnos as $listado){
        echo "<div class='mt-1 d-flex justify-content-center'>";
        echo($listado["dni_alumno"]);
        echo" ";
        echo($listado["nombre_alumno"]);
        echo" ";
        echo($listado["apellido_alumno"]);
        echo" ";
        echo($listado["fecha_nacimiento_alumno"]);
        echo" ";
        echo("<input type='button' name='actualizar' value='modificar'>");
        echo"</div>";
    }*/


    if(!empty($_POST["dni_alumno"]) && !empty($_POST["nombre_alumno"]) && !empty($_POST["apellido_alumno"]) && !empty($_POST["fecha_nacimiento_alumno"]) && !empty($_POST["apellido_alumno_original"]) && !empty($_POST["apellido_alumno_original"])){
       
        $dni_alumno = $_POST["dni_alumno"];
        $nombre_alumno = $_POST["nombre_alumno"];
        $apellido_alumno = $_POST["apellido_alumno"];
        $fecha_nacimiento_alumno = $_POST["fecha_nacimiento_alumno"];
        
        $contenedor = "UPDATE alumno SET dni_alumno='$dni_alumno',nombre_alumno='$nombre_alumno',apellido_alumno='$apellido_alumno',fecha_nacimiento_alumno='$fecha_nacimiento_alumno'";
        $alumno = mysqli_query($connection,$contenedor);

        echo "<div class='mt-1 d-flex justify-content-center'>¡Los datos del alumno fueron modificados exitosamente!</div>";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Alumno</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body class="bg-success bg-opacity-50">
    <a href="/pagina_principal.html"><button class="btn btn-secondary">Volver a inicio</button></a>
    <a href="/Alumno/pagina_alumno.php"><button class="btn btn-secondary">Volver atrás</button></a>
    <h1 class='mt-3 d-flex justify-content-center'>Elegí al alumno que quieras modificar</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <div class='mt-3 d-flex justify-content-center'>
            <input type="text" name="dni_alumno" placeholder="DNI" value="<?php echo $dni_alumno ?>">
            <input type="text" id="nombre_alumno" name="nombre_alumno" placeholder="Nombre" value="<?php echo $nombre_alumno ?>">
            <input type="text" id="apellido_alumno" name="apellido_alumno" placeholder="Apellido" value="<?php echo $apellido_alumno ?>">
            <input type="date" id="fecha_nacimiento_alumno" name="fecha_nacimiento_alumno" placeholder="Fecha de Nacimiento" value="<?php echo $fecha_nacimiento_alumno ?>">
            <input type="submit" value="Modificar" class="btn btn-primary">
        </div>
    </form>
    <div id="botones">
    </div>
</body>
</html>