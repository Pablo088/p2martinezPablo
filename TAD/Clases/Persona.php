<?php
class Persona{
    public $dni;
    public $nombre;
    public $apellido;
    public $fechaDeNacimiento;

    public function __construct($dni,$nombre,$apellido,$fechaDeNacimiento)
    {
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->fechaDeNacimiento=$fechaDeNacimiento;
    }
}
?>