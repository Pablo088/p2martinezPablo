<?php
    class Persona{
        public $nombre;
        public $apellido;
        public $dni;

        public function __construct($nombre,$apellido,$dni)
        {
            $this ->nombre = $nombre;
            $this ->apellido = $apellido;
            $this ->dni = $dni;
        }
    }
?>