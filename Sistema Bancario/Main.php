<?php
    require_once("Persona.php");
    require_once("Banco.php");
    require_once("CuentaBancaria.php");

    $persona1 = new Persona("Leandro","Paredes",29,"37.321.543");
    $persona2 = new Persona("Rodrigo","Puentes",30,"49.432.423");
    $persona3 = new Persona("Fabian","Muros",35,"39.343.432");
    echo $persona1 -> nombre." ". $persona1->apellido." ". $persona1->edad." ".$persona1->dni;
    echo $persona2 -> nombre." ". $persona2->apellido." ". $persona2->edad." ".$persona2->dni;
    echo $persona3 -> nombre." ". $persona3->apellido." ". $persona3->edad." ".$persona3->dni;

    $banco1 = new Banco("Banco Nacional Peruano","Artigas 1540");
?>