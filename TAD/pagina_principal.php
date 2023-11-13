<?php
   require_once("../TAD/BD/conexion.php");
   require_once("../TAD/Clases/Alumno.php");
   require_once("../TAD/Clases/Persona.php");
   require_once("../TAD/Clases/Parametro.php");
   $BD = new BD();

if(isset($_POST["enviar"])){
    if(!empty($_POST["buscar"])){
        $dniBuscar = $_POST["buscar"];

        $consulta = Alumno::buscarDNI($dniBuscar);
        $contenedor = $BD -> Ejecutar($consulta);
        $alumnos = $contenedor;
        $alumno = $alumnos -> fetch_assoc();

        $getParametro = Parametro::getParametros();
        $contenedorParametro = $BD -> Ejecutar($getParametro);
        $parametro = $contenedorParametro -> fetch_assoc();

        $contadorAsistencia = Alumno::contadorAsistencias($dniBuscar);
        $contenedorAsistencia = $BD -> Ejecutar($contadorAsistencia);
        $asistencia = $contenedorAsistencia -> fetch_assoc();

        if($dniBuscar == $alumno['dni_alumno']){
            date_default_timezone_set(timezoneId:"America/Argentina/Buenos_Aires");
            $fecha_hora = date("Y-m-d H:i");
            if ($asistencia['count(dni_alumno)'] >= $parametro['cantidad_dias']){
                echo"<script> alert('El alumno ya alcanzó el tope de asistencias');
                location.href ='pagina_principal.html';</script>";
            }else{
                $contenedorAsistencia = Alumno::insertarAsistencia($dniBuscar,$fecha_hora);
                $ejecutarContenedor = $BD -> Ejecutar($contenedorAsistencia);
                if($ejecutarContenedor){
                     ?><script> alert("¡Se pudo cargar la asistencia!");
                     location.href ="pagina_principal.html";</script><?php
                 } 
            }
        } else{
                echo"<script> alert('El dni que ingresaste no existe');
                location.href ='pagina_principal.html';</script>";
              }
       } else{
        echo"<script> alert('Ingresa un DNI');
        location.href ='pagina_principal.html';</script>";
       }
}
?>              

