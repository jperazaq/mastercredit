<?php
require('conexion.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hcontra = hash('sha256', $password);

    echo $email;
    echo $hcontra;

    // Realiza la consulta para verificar las credenciales del usuario
    $consulta = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$hcontra'";
    $resultado = mysqli_query($conn, $consulta);

    if (mysqli_num_rows($resultado) == 1) {
        // Las credenciales son válidas, iniciar sesión
        session_start();
        $_SESSION['email'] = $email;

        // Redirige a la página de inicio
        header("Location: index.php");
        exit();
    } else {

        echo "Usuario o contraseña incorrectos";
        // Las credenciales son incorrectas, mostrar mensaje de error
        
    }
}
?>

