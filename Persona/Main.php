<?php
   require_once("Persona.php");
    $Persona1= new Persona("Javier","Parra","31.234.765");
    echo "Hola ".$Persona1 -> nombre." ".$Persona1->apellido." IP: ".$Persona1->dni;
?>