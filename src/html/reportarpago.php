<!doctype html>
<html lang="en">

<head>

<?php 
require('conexion.php');

session_start();

// Aquí puedes utilizar la conexión y ejecutar consultas
// ...

$conn->close();
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Avocash</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/logoavocashclaro.jpg" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <?php require('aside.php') ?>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-hello"></i>
                 <h4 style="color:#20c997"> Hola! <?php
                 require("conexion.php");
                 $email = $_SESSION['email'];
                 $consultaCliente = "SELECT * FROM usuarios WHERE email='".$email."' ";
                 $resultado = mysqli_query($conn, $consultaCliente);

                 if ($row = mysqli_fetch_assoc($resultado)) {
                     $nombre = $row['nombre'];
                     $papellido = $row['papellido'];
                     $sapellido = $row['sapellido'];
                     $correo = $row['email'];

                     mysqli_close($conn);
                 }
                 
                 
                 echo $nombre, " ", $papellido; ?></h4>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            
              <li class="nav-item dropdown">
                <!-- <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a> -->
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid col-lg-8">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4"style="color:#20c997">Reportar Pago</h5>
              <div class="card">
                <div class="card-body p-4">

                  <div class="container-fluid col-lg-8">
                    <div class="container-fluid">
                      
                      <?php require('insertarReportePago.php'); ?>

                      <form method="POST">

                        <div class="mb-3 col-lg-8">
                          <input type="text" class="form-control" id="id" name="id" style="display: none;" value="<?= $id ?>">
                        </div>

                        <div class="mb-3 col-lg-8">
                          <label for="monto" class="form-label" style="color:#20c997">Monto Pago</label>
                          <input type="text" class="form-control" id="monto" name="monto">
                        </div>

                        <div class="mb-3 col-lg-8">
                          <label for="monto" class="form-label" style="color:#20c997">Fecha del Depósito</label>
                          <input type="date" class="form-control" id="fechaPago" name="fechaPago">
                        </div>

                        <div class="mb-3 col-lg-8">
                          <label for="plazo" class="form-label" style="color:#20c997">Banco</label>
                          <input type="text" class="form-control" id="banco" name="banco">
                        </div>

                        <div class="mb-3 col-lg-8">
                          <label for="plazo" class="form-label" style="color:#20c997">Número de Recibo</label>
                          <input type="text" class="form-control" id="recibo" name="recibo" required>
                        </div>

                        <div class="mb-3 col-lg-8">
                          <label for="plazo" class="form-label" style="color:#20c997">Número de Cuota</label>
                          <input type="text" class="form-control" id="numCuota" name="numCuota">
                        </div>

                        <div class="mb-3 col-lg-8">
                          <label for="plazo" class="form-label" style="color:#20c997">Número de Crédito</label>

                          <?php
                            require("conexion.php");

                            $email = $_SESSION['email'];

                            $idCliente = "SELECT * FROM clientes WHERE email = ?";
                            $stmt1 = mysqli_prepare($conn, $idCliente);
                            mysqli_stmt_bind_param($stmt1, "s", $email);
                            mysqli_stmt_execute($stmt1);
                            $resultado1 = mysqli_stmt_get_result($stmt1);
                            $row = mysqli_fetch_assoc($resultado1);
                            $id = $row['cliente_id'];

                            $clientes = "SELECT * FROM prestamos WHERE cliente_id = ?";
                            $stmt2 = mysqli_prepare($conn, $clientes);
                            mysqli_stmt_bind_param($stmt2, "i", $id);
                            mysqli_stmt_execute($stmt2);
                            $resultado = mysqli_stmt_get_result($stmt2);
                            ?>

                            <select name="numOp" class="form-control" id="numOp">
                              <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                                <option value="<?= $row["prestamo_id"] ?>"><?= $row["prestamo_id"] ?></option>
                              <?php endwhile; ?>
                            </select>

                        </div>

                        <button type="submit" class="btn btn-primary" name="repPago" id="repPago">Reportar</button>
                      </form>

                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

<div class="py-6 px-6 text-center">
  <p class="mb-0 fs-4">Design and Developed by <a href="https://avocash.tech/" target="_blank" class="pe-1 text-primary text-decoration-underline">Julio Peraza</a> from <a href="https://avocash.tech">Avocash.tech</a></p>
</div>

</html>
