<?php
require('conexion.php');

if (isset($_POST['solicitud'])) {
    $montoOpp = trim($_POST['monto']);
    $tipo = trim($_POST['tipo']);
    $plazo = trim($_POST['plazo']);
    $id = trim($_POST['id']);
    $fecha = date("Y-m-d");
    $estado = '0';
    $numero= rand(100000, 999999);

    
    $query = "SELECT * FROM clientes WHERE cliente_id = ?";
    $stmt = $conn->prepare($query);

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

    $consulta = "INSERT INTO solicitudes (monto, tipo, plazo, cliente_id, nombre, papellido, sapellido, fecha, estado,numero) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($consulta);

$stmt->bind_param("ssissssssi", $montoOpp, $tipo, $plazo, $id, $nombre, $papellido, $sapellido, $fecha, $estado,$numero);

$resultado = $stmt->execute();


    if ($resultado) {
        ?>
        <div class="alert alert-success" role="alert">
            <h3 style="text-align: center;"> Se ha enviado la solicitud de crédito.</h3>
            <p style="text-align: center;"> En unos minutos un asesor se comunicará con usted.</p>
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
            <h3 style="text-align: center;">No se ha podido enviar la solicitud, intente más tarde.</h3>
        </div>
        <?php
    }

    // Cerrar la consulta
    $stmt->close();
}

$conn->close();
?>
