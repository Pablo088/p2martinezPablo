<?php
    class Alumno extends Persona{
        public static function insertarAlumno($alumno){
            $contenedor = "INSERT INTO alumno (dni_alumno,nombre_alumno,apellido_alumno,fecha_nacimiento_alumno) values($alumno->dni,$alumno->nombre,$alumno->apellido,$alumno->fechaDeNacimiento)";
            return $contenedor;
        }

        public static function borrarAlumno($alumno){
            $contenedor = "DELETE FROM alumno where dni_alumno = '$alumno->dni'";
            return $contenedor;
        }

        public static function modificarAlumno($alumno,$dni_antiguo){
            $contenedor = "UPDATE alumno SET nombre_alumno = '$alumno->nombre',apellido_alumno='$alumno->apellido',fecha_nacimiento_alumno='$alumno->fechaDeNacimiento',dni_alumno ='$alumno->dni' where dni_alumno = '$dni_antiguo'";
            return $contenedor;
        }

        public static function buscarDNI($alumno){
            $contenedor = "select dni_alumno from alumno where dni_alumno = '$alumno->dni'";
            return $contenedor;
        }

        public static function contenedorAsistencias(){
            $contenedorAsistencias = "select alumno.dni_alumno,nombre_alumno,apellido_alumno,fecha_nacimiento_alumno,count(asistencia.dni_alumno) FROM asistencia,alumno WHERE asistencia.dni_alumno = alumno.dni_alumno GROUP BY dni_alumno";
            return $contenedorAsistencias;
        }

        public static function listaAlumnos(){
            $listadoAlumnos = "Select * from alumno";
            return $listadoAlumnos;
        } 

        public static function edadMinima(){
            $minimo = "select edad_minima from parametros";
            return $minimo;
        }

    }


?>