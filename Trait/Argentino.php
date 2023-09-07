<?php
 require_once("Saludar_trait.php");

    class Argentino extends Persona {
        use Saludar;

        public function nacionalidad(){
            echo "Soy argentino";
        }
    }
?>