<?php
    class Persona {
        public $nombre;
        public $apellido;
        public $edad;
        public $dni;

        public function __construct($nombre,$apellido,$edad,$dni){
            $this -> nombre = $nombre;
            $this -> apellido = $apellido;
            $this -> edad = $edad;
            $this -> dni = $dni;
        }
    }
?>