<?php
require("conexion.php");

$contrato = $_GET['id'];

$sql = "SELECT * FROM prestamos WHERE contrato='$contrato'";

$resultado = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($resultado);

if ($row) {
  $fileName = $row['contrato'];
  $ruta = "../assets/contratos/" . $fileName;

  if (file_exists($ruta)) {
    header('Content-type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    readfile($ruta);
  } else {
    echo "El archivo no existe";
  }
} else {
  echo "El archivo no se encuentra en la base de datos";
}
?>
