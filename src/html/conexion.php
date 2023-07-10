<?php


$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "avocashdb";

// Establecer la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
} 
// echo "Conexión exitosa a la base de datos";
?>