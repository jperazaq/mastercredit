
<?php
session_destroy();

// Redirige a la página de inicio de sesión u otra página deseada
header("Location: login.php");
exit();
?>