<?php
    require_once("Persona.php");
    require_once("Argentino.php");
   

    $persona1 = new Argentino("Roberto","argentino");

    
    $persona1->saludar();
    $persona1 -> getNombre();
    $persona1 -> nacionalidad();
    $persona1 -> verNacionalidad($persona1->nacionalidad);
?>
?>
