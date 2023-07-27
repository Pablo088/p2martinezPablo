<?php
    require_once("../conectar/conexion.php");
    $ListadoJugadoras = "Select * from jugadoras";
    $stmnt = $connection -> prepare($ListadoJugadoras);
    $stmnt -> execute();
    $jugadoras = $stmnt->fetchAll();

    foreach($jugadoras as $listado){
        print_r($listado["id"]);
        echo" ";
        print_r($listado["nombre"]);
        echo" ";
        print_r($listado["apellido"]);
        echo" ";
        print_r($listado["edad"]);
        echo" ";
        print_r($listado["club"]);
    }
?>