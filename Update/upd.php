<?php
require_once("../conectar/conexion.php");
if(!empty($_POST["IDJugadora"]) && !empty($_POST["NombreJugadora"]) && !empty($_POST["ApellidoJugadora"]) && !empty($_POST["EdadJugadora"]) && !empty($_POST["ClubJugadora"])){
    $IDJugadora = $_POST["IDJugadora"];
    $NombreJugadora = $_POST["NombreJugadora"];
    $ApellidoJugadora = $_POST["ApellidoJugadora"];
    $EdadJugadora = $_POST["EdadJugadora"];
    $ClubJugadora = $_POST["ClubJugadora"];

    $tabla = "UPDATE jugadoras SET nombre=:nombre,apellido=:apellido,edad=:edad,club=:club WHERE id=:id";
    $stmt = $connection ->prepare($tabla);
    $stmt -> bindParam(":nombre",$NombreJugadora);
    $stmt -> bindParam(":apellido",$ApellidoJugadora);
    $stmt -> bindParam(":edad",$EdadJugadora);
    $stmt -> bindParam(":club",$ClubJugadora);
    $stmt -> bindParam(":id",$IDJugadora);
    $stmt -> execute();

    echo("El registro se actulizo correctamente!");
}else{
 echo("inserte los datos como corresponde");
}
?>