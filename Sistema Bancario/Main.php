<?php
    require_once("Persona.php");
    require_once("Banco.php");
    require_once("CuentaBancaria.php");

    $persona1 = new Persona("Leandro","Paredes",29,"37.321.543");
    $persona2 = new Persona("Rodrigo","Puentes",30,"49.432.423");
    $persona3 = new Persona("Fabian","Muros",35,"39.343.432");
/*
    echo $persona1 -> nombre." ". $persona1->apellido." ". $persona1->edad." ".$persona1->dni;
    echo $persona2 -> nombre." ". $persona2->apellido." ". $persona2->edad." ".$persona2->dni;
    echo $persona3 -> nombre." ". $persona3->apellido." ". $persona3->edad." ".$persona3->dni;
*/
    $banco1 = new Banco("Banco Nacional Peruano","Avellaneda 1500");
    
    $cuenta1 = new CuentaBancaria(10,$persona1->nombre." ".$persona1->apellido,10000);
    $cuenta2 = new CuentaBancaria(15,$persona2->nombre." ".$persona2->apellido,0);
    $cuenta3 = new CuentaBancaria(20,$persona3->nombre." ".$persona3->apellido,100000);

    $banco1 -> agregarCuenta($cuenta1);
    $banco1 -> agregarCuenta($cuenta2);
    $banco1 -> agregarCuenta($cuenta3);

    $cuenta1 -> Transferir($cuenta3->titular,$cuenta3->saldo,5000,$cuenta1->saldo,$cuenta1->titular,$cuenta3,0.6);
    echo $cuenta1;
 
/*
    $cuenta3 -> Retirar(600);
    $banco1->buscarCuentaPorTitular("Rodrigo Puentes");
    
       $cuenta3->Retirar(10000);

    $cuenta1 -> Depositar(1000);
    echo $cuenta1;

    $cuenta1 -> Depositar(10000);
*/
