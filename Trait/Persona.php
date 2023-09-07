<?php
    class Persona {
         public $nombre;

        public function __construct($nombre){
            $this ->nombre=$nombre;
        }
        public function getNombre(){
            return $this->nombre;
        }
    }
?>