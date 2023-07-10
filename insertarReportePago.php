<?php
require('conexion.php');

if (isset($_POST['repPago'])) {
    $montoOpp = trim($_POST['monto']);
    $numCuota = trim($_POST['numCuota']);
    $opID = trim($_POST['numOp']);
    $banco = trim($_POST['banco']);
    $fecha = trim($_POST['fechaPago']);
    $estado = '0';
    $id = trim($_POST['id']);
    $ref = trim($_POST['recibo']);

   
    $consulta = "SELECT * FROM clientes WHERE cliente_id = ?";
    $stmt = $conn->prepare($consulta);

    // Vincular el parámetro con el valor de $id
    $stmt->bind_param("i", $id);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados de la consulta
    $result = $stmt->get_result();

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Recorrer los resultados
        while ($row = $result->fetch_assoc()) {
            // Acceder a los valores de las columnas
            $cedula = $row['cliente_id'];
            $nombre = $row['nombre'];
            $papellido = $row['papellido'];
            $sapellido = $row['sapellido'];

            // Hacer algo con los datos del cliente...
        }
    } else {
        // No se encontraron resultados para el ID proporcionado
    }

    // Cerrar la consulta
    $stmt->close();

    $consulta = "INSERT INTO reportepagos (cliente_id, nombre, papellido, sapellido, numOpp, monto, banco, ref, numCuota, fecha, estado) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($consulta);
    $stmt->bind_param("sssssssssss", $id, $nombre, $papellido, $sapellido, $opID, $montoOpp, $banco, $ref, $numCuota, $fecha, $estado);
    $resultado = $stmt->execute();

    if ($resultado) {
        ?>
        <div class="alert alert-success" role="alert">
            <h3 style="text-align: center;">Se ha reportado el pago.</h3>
            <p style="text-align: center;">En unos minutos su pago será procesado.</p>
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
            <h3 style="text-align: center;">No se ha podido enviar el reporte de pago, intente más tarde.</h3>
        </div>
        <?php
    }

    // Cerrar la consulta
    $stmt->close();
}

$conn->close();
?>

