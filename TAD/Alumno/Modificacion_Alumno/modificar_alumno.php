<?php
//mejorar
        require_once('../../../TAD/BD/conexion.php');
        require_once('../../../TAD/Clases/Alumno.php');
        require_once('../../../TAD/Clases/Persona.php');
        require_once('../../../TAD/Clases/Parametro.php');

        $BD = new BD();
        if(!empty($_POST["dni_alumno"]) && !empty($_POST["dni_antiguo"]) && !empty($_POST["nombre_alumno"]) && !empty($_POST["apellido_alumno"]) && !empty($_POST["fecha_nacimiento_alumno"])){
            $dni_antiguo = $_POST["dni_antiguo"];
            $dni_alumno = $_POST["dni_alumno"];
            $nombre_alumno = $_POST["nombre_alumno"];
            $apellido_alumno = $_POST["apellido_alumno"];
            $fecha_nacimiento_alumno = $_POST["fecha_nacimiento_alumno"];

            if ($edad_alumno < $edad_minima){
                echo"<script> alert('<?php echo $edad_alumno ?>');
                location.href ='/Alumno/pagina_alumno.php';</script>"; 
            }else{

                $actualizar = Alumno::modificarAlumno($dni_alumno,$nombre_alumno,$apellido_alumno,$fecha_nacimiento_alumno,$dni_antiguo);
                $contenedorAlumno = $BD -> Ejecutar($actualizar);
            
                if($contenedorAlumno){
                    ?><script> alert("¡Los datos fueron modificados!");
                    location.href ="/Alumno/pagina_alumno.php";</script><?php
                } 
            }
    }
?>
