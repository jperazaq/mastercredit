<?php
require('conexion.php');

if (isset($_POST['regUser'])) {
    $nombre = trim($_POST['nombre']);
    $papellido = trim($_POST['papellido']);
    $sapellido = trim($_POST['sapellido']);
    $cedula = trim($_POST['cedula']);
    $email = trim($_POST['email']);
    $contra = trim($_POST['password']);
    $rContra = trim($_POST['Rpassword']);
    $fecha = date("d/m/Y");
    $phone = trim($_POST['phone']);

    $hcontra = hash('sha256', $contra);
    $hrcontra = hash('sha256', $rContra);

    if ($hcontra != $hrcontra) {
        ?>
        <div class="alert alert-danger" role="alert">
            <h3 style="text-align: center;">Las contraseñas no coinciden</h3>
        </div>
        <?php
    } else {
        $consultaRecibio = "SELECT * FROM usuarios WHERE cedula = '$cedula'";
        $resultado2 = mysqli_query($conn, $consultaRecibio);

        if ($resultado2->num_rows > 0) {
            ?>
            <div class="alert alert-danger" role="alert">
                <h3 style="text-align: center;">Usuario Existente</h3>
            </div>
            <?php
        } else {
            $consulta = "INSERT INTO `usuarios`(`cedula`, `nombre`, `papellido`, `sapellido`, `email`, `password`, `fecha`,`telefono`) VALUES ('$cedula', '$nombre', '$papellido', '$sapellido', '$email', '$hcontra', '$fecha','$phone')";

            $resultado = mysqli_query($conn, $consulta);

            if ($resultado) {
                ?>
                <div class="alert alert-success" role="alert">
                    <h3 style="text-align: center;">Usuario guardado con éxito</h3>
                </div>
                <?php
                $_POST = array();
                sleep(1);
                header("login.php");
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                    <h3 style="text-align: center;">No se pudo guardar el usuario, inténtelo nuevamente</h3>
                </div>
                <?php
            }
        }
    }
}
?>


    