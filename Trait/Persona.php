<?php
    class Persona {
         public $nombre;

        public function __construct($nombre){
            $this ->nombre=$nombre;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function verNacionalidad($nacionalidad){
            if($nacionalidad == "argentino"){
                echo ". Soy pobre, pero argentino";
            }
        }
    }
?>
