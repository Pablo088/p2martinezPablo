<?php
    class Persona {
        //el nombre de la clase tiene que estar en mayuscula y tiene que ser singular (es una buena practica de programacion)
        public $nombre;
        public $apellido;
        public $dni;
        public function __construct($nombre,$apellido,$dni)
        {
            //$this hace referencia a atributos de mi clase
            $this -> nombre = $nombre; //lo asigno a mi objeto
            $this -> apellido = $apellido;
            $this -> dni = $dni;
        }
    };
    
    //Cada archivo debe representar una clase
?>