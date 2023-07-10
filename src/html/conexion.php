<?php


$servername = "us-cdbr-east-06.cleardb.net";
$username = "b7cc13776bb8cb";
$password = "72f6e4a6";
$dbname = "heroku_e3e92d30f4b0434";

// Establecer la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
} 
// echo "Conexión exitosa a la base de datos";
?>