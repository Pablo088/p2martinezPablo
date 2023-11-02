<?php
    require_once("Persona.php");
    class Alumno extends Persona{
        public static function insertarAlumno($alumno){
            $contenedor = "INSERT INTO alumno (dni_alumno,nombre_alumno,apellido_alumno,fecha_nacimiento_alumno) values('$alumno->dni','$alumno->nombre','$alumno->apellido','$alumno->fechaDeNacimiento')";
            return $contenedor;
        }

        public static function borrarAlumno($dni){
            $contenedor = "DELETE FROM alumno where dni_alumno = '$dni'";
            return $contenedor;
        }

        public static function modificarAlumno($dni,$nombre,$apellido,$fecha,$dni_antiguo){
            $contenedor = "UPDATE alumno SET dni_alumno ='$dni',nombre_alumno = '$nombre',apellido_alumno='$apellido',fecha_nacimiento_alumno='$fecha' where dni_alumno = '$dni_antiguo'";
            return $contenedor;
        }

        public static function buscarDNI($dni){
            $contenedor = "select dni_alumno from alumno where dni_alumno = '$dni'";
            return $contenedor;
        }

        public static function contadorAsistencias(){
            $contenedorAsistencias = "select alumno.dni_alumno,nombre_alumno,apellido_alumno,fecha_nacimiento_alumno,count(asistencia.dni_alumno) FROM asistencia,alumno WHERE asistencia.dni_alumno = alumno.dni_alumno GROUP BY dni_alumno";
            return $contenedorAsistencias;
        }

        public static function listaAlumnos(){
            $listadoAlumnos = "Select * from alumno";
            return $listadoAlumnos;
        } 

        public static function getAlumno($dni){
            $listadoAlumnos = "Select * from alumno where dni_alumno = '$dni'";
            return $listadoAlumnos;
        } 

        public static function insertarAsistencia($dni,$fecha){
            $contenedor = "INSERT INTO asistencia (dni_alumno,fecha_hora) values ('$dni','$fecha')";
            return $contenedor;
        }

    }


?>