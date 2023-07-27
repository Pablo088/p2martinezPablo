<?php
    //$aux=33;
    //echo($aux);
    //$semana = array('Lunes','Martes','Miercoles','Jueves','Viernes');
    //print_r($semana);
    //$algo = array('Bareiro', 11, true);
    //var_dump($algo);

    //$planetas = array();
    //$planetas[] = 'Urano';
    //$planetas[] = 'Tierra';                  
    //$planetas[] = 'Saturno';               
    //$planetas[] = 'Neptuno';
    //$planetas[] = 'Venus'; 

    //print_r($planetas);

    //foreach ($planetas as $planeta) {
        //echo $planeta, " ";
    //}

    //Ejercicio 1: Suma de elementos: escribir una funcion que reciba un array numerico y devuelva la suma de sus elementos
    //$numeros = array(1,2,3,4,5,6,7,8,9,10);
    //function SumadeNumero($numeros){
        //$suma = 0;
        //foreach($numeros as $TodosLosNumeros) {
          //  $suma = $TodosLosNumeros + $suma;
        //} 
        //echo($suma);
    //}
    //SumadeNumero($numeros);

    //Ejercicio 2: Crear un array y ordenarlo de menor a mayor
    //A tener en cuenta: sort()
    //echo"Ordenando de manera ascendente";
    //$NumerosCualquiera = array(12,20,38,45,28,10,4,5,8);
    //$NumerosOrdenados = array();
    //sort($NumerosCualquiera);
    //foreach($NumerosCualquiera as $numeros){
        //$NumerosOrdenados[]=$numeros;
    //}
    //print_r($NumerosOrdenados);

    //Ejercicio 3: Escribir funcion que elimine elementos duplicados de un array
    //A tener en cuenta: array_unique()
        //$arrayArreglado = array();
        //$arrayRepetido = array(1,2,20,30,20,40,30,1,3);
        //function eliminandoRepetidos($arrayRepetido){
            //$arrayArreglado = array_unique($arrayRepetido);
            //print_r($arrayArreglado);
        //}
        //eliminandoRepetidos($arrayRepetido);

    //Ejercicio 4: Crear funcion que reciba array y numero a buscar y devuelva un array con todas las ocurrencias encontradas con el indice
    //A tener en cuenta: array_keys();
    //$ArrayIndices = array(1,2,20,30,2,3,5,3,2);
    //function BuscarElemento($ArrayIndices, $numero){
        //echo"Indice encontrado";
        //print_r(array_keys($ArrayIndices, $numero));
    //}    
    //BuscarElemento($ArrayIndices, 2);

    //Ejercicio 5: Combinar 2 arrays y encontrar los numeros impares en el array resultante
    //A tener en cuenta: array_merge
    //array1 = [1,5,8,4] - array2 = [2,5,6,7]
   // $array1 = array(1,5,8,4);
    //$array2 = array(2,5,6,7);
    //function Impares($array1,$array2){  
      //  $arrayResultado = array();
        //$arrayResultado = array_merge($array1,$array2);
        //$impar = array();
        //foreach($arrayResultado as $impares){
          //  if($impares % 2 <> 0){
            //    $impar[] = $impares;
            //}
        //}
        //print_r($impar);
    //}
    //Impares($array1,$array2);

    //Arrays Asociativos
    //$clubes = array("San Lorenzo" => array("Jugadores"=> array("Nahuel Barrios","Adam Bareigol","Augusto (Yashin) Batalla")), 
    //"Independiente"=> array("Jugadores"=>array("Rodrigo Rey","Ivan Marcone","Martin Cauteruccio")));
    //Ejercicio 6: Funcion que diga si Fernando Galetto juega en San Lorenzo
    //Ejercicio 6.1: Que diga en que club juega Marcone
    //if("Fernando Galetto" !== $clubes["San Lorenzo"]["Jugadores"]){
      //  echo"Fernando Galetto fue jugador de San Lorenzo, pero no forma parte del plantel actual";
    //}
    //foreach($clubes as $club => $jugador){
      //  if(in_array("Ivan Marcone",$jugador["Jugadores"])== true){
        //    $NombreClub = $club;
          //  echo"Ivan Marcone juega en ",$NombreClub;
        //}
    //}
?>