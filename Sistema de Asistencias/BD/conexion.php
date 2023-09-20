<?php
$host = "localhost";
$dbname = "sistema_asistencia";
$username = "root";
$password = null;
$connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
echo "Conectado (si)";
?>
