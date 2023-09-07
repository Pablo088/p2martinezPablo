<?php
    require_once("Persona.php");
    require_once("Argentino.php");
   

    $persona1 = new Argentino("Roberto");
    
    $persona1->saludar();
    $persona1 -> getNombre();
    $persona1 -> nacionalidad();

?>