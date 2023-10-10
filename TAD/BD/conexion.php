<?php
$host = "localhost";
$dbname = "sistema_asistencia";
$username = "root";
$password = null;
$connection = new mysqli($host,$username,$password,$dbname);

if($connection -> connect_errno){
    die("Surgió un error al tratar de conectarse"). $connection -> connect_errno;
} 
?>
