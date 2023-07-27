<?php
    require_once("../conectar/conexion.php");

        $IDJugadora=$_POST["IDJugadora"];
        $NombreJugadora = $_POST["NombreJugadora"];
        $ApellidoJugadora = $_POST["ApellidoJugadora"];
        $EdadJugadora = $_POST["EdadJugadora"];
        $ClubJugadora = $_POST["ClubJugadora"];
        
        if(($NombreJugadora && $ApellidoJugadora && $EdadJugadora && $ClubJugadora)<> null){
            $query = "INSERT INTO jugadoras (id,nombre,apellido,edad,club) values(:id,:nombre,:apellido,:edad,:club)";
            $insercion = $connection ->prepare($query);

            $insercion -> bindParam(":id",$IDJugadora);
            $insercion -> bindParam(":nombre",$NombreJugadora);
            $insercion -> bindParam(":apellido",$ApellidoJugadora);
            $insercion -> bindParam(":edad",$EdadJugadora);
            $insercion -> bindParam(":club",$ClubJugadora);
            $insercion -> execute();
        }else{
            echo"Null";
        }

?>