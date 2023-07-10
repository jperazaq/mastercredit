<!doctype html>
<html lang="en">

<?php 
require('conexion.php');
session_start();// Aquí puedes utilizar la conexión y ejecutar consultas
// ...

$conn->close();
?>

<head>
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

                <?php  
                    require("conexion.php");
                  $email = $_SESSION['email'];
                  $consultaCliente = "SELECT * FROM usuarios WHERE email='".$email."' ";
                  $resultado = mysqli_query($conn, $consultaCliente);

                  if ($row = mysqli_fetch_assoc($resultado)) {
                      $nombre = $row['nombre'];
                      $papellido = $row['papellido'];
                      $sapellido = $row['sapellido'];
                      $correo = $row['email'];
                      $id = $row['cedula'];

                      mysqli_close($conn);
                  }
                  ?>




                
              </a>
            </li>
          </ul>
          <h4 class="col-sm-12 mt-4" style="color: #06573f; width: 100%">¡Hola, <?php echo $nombre?>!</h4>
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
      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h3 class="card-title fw-semibold" style="color:#20c997">Resumen de operaciones</h3>
                    <hr>
                  </div>                 
                </div>
                
                <!-- cuadro -->

                
                   
                    <div class="row align-items-center">
                      <div class="col-8">

                      <?php 
                      require('conexion.php');
                      $sql = "SELECT COUNT(*) as total FROM prestamos WHERE cliente_id = '".$id."'";
                                              // Ejecutar la consulta
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // Obtener el resultado de la consulta
                          $row = $result->fetch_assoc();
                          $totalRegistros = $row["total"];                     
                          ?>                            
                            <h5 class="fw-semibold mb-3"><?php echo "Operaciones abiertas:" . "" .$totalRegistros?></h5>
                          <?php }?>


                          <?php 
                      require('conexion.php');
                      $sql = "SELECT sum(montoOp) as total FROM prestamos WHERE cliente_id = '".$id."'";
                                              // Ejecutar la consulta
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // Obtener el resultado de la consulta
                          $row = $result->fetch_assoc();
                          $totalRegistros = $row["total"];                     
                          ?>                            
                            <h5 class="fw-semibold mb-3"><?php echo "Monto Operaciones Abiertas:" . "¢" .number_format($totalRegistros, 0, ',', '.')?></h5>
                          <?php }?>

                          
                          <?php 
                      require('conexion.php');
                      $sql = "SELECT sum(amortizadoOp) as total FROM prestamos WHERE cliente_id = '".$id."'";
                                              // Ejecutar la consulta
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // Obtener el resultado de la consulta
                          $row = $result->fetch_assoc();
                          $totalRegistros = $row["total"];                     
                          ?>                            
                            <h5 class="fw-semibold mb-3"><?php echo "Monto Amortizado:" . "¢" . number_format($totalRegistros, 0, ',', '.')?></h5>
                          <?php }?>


                          
                          <?php 
                      require('conexion.php');
                      $sql = "SELECT sum(interesPagadoOp) as total FROM prestamos WHERE cliente_id = '".$id."'";
                                              // Ejecutar la consulta
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // Obtener el resultado de la consulta
                          $row = $result->fetch_assoc();
                          $totalRegistros = $row["total"];                     
                          ?>                            
                            <h5 class="fw-semibold mb-3"><?php echo "Interes Pagado:" . "¢" .number_format($totalRegistros, 0, ',', '.')?></h5>
                          <?php }?>

                               
                          <?php 
                      require('conexion.php');
                      $sql = "SELECT sum(saldoOp) as total FROM prestamos WHERE cliente_id = '".$id."'";
                                              // Ejecutar la consulta
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // Obtener el resultado de la consulta
                          $row = $result->fetch_assoc();
                          $totalRegistros = $row["total"];                     
                          ?>                            
                            <h5 class="fw-semibold mb-3"><?php echo "Saldo de Operaciones:" . "¢" .number_format($totalRegistros, 0, ',', '.')?></h5>
                          <?php }?>

                          <?php 
                      require('conexion.php');
                      $sql = "SELECT sum(cuotaOp) as total FROM prestamos WHERE cliente_id = '".$id."'";
                                              // Ejecutar la consulta
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // Obtener el resultado de la consulta
                          $row = $result->fetch_assoc();
                          $totalRegistros = $row["total"];                     
                          ?>                            
                            <h5 class="fw-semibold mb-3"><?php echo "Pago mensual:" . "¢" .number_format($totalRegistros, 0, ',', '.')?></h5>
                          <?php }?>

                          <?php 
                      require('conexion.php');
                      $sql = "SELECT count(cuotasFaltantesOp) as total FROM prestamos WHERE cliente_id = '".$id."'";
                                              // Ejecutar la consulta
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // Obtener el resultado de la consulta
                          $row = $result->fetch_assoc();
                          $totalRegistros = $row["total"];                     
                          ?>                            
                            <h5 class="fw-semibold mb-3"><?php echo "Pagos Faltantes:" . "" .$totalRegistros?></h5>
                          <?php }?>

                          <?php 
                      require('conexion.php');
                      $sql = "SELECT count(cuotasPagadasOp) as total FROM prestamos WHERE cliente_id = '".$id."'";
                                              // Ejecutar la consulta
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // Obtener el resultado de la consulta
                          $row = $result->fetch_assoc();
                          $totalRegistros = $row["total"];                     
                          ?>                            
                            <h5 class="fw-semibold mb-3"><?php echo "Cuotas Pagadas:" . "" .$totalRegistros?></h5>
                          <?php }?>

                          <?php 
                      require('conexion.php');
                      $sql = "SELECT (cuotasAtrasadas) as total FROM prestamos WHERE cliente_id = '".$id."'";
                                              // Ejecutar la consulta
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // Obtener el resultado de la consulta
                          $row = $result->fetch_assoc();
                          $totalRegistros = $row["total"];                     
                          ?>                            
                            <h5 class="fw-semibold mb-3"><?php echo "Cuotas en Atraso:" . "" .$totalRegistros?></h5>
                          <?php }?>




                       
                        
                        
                        
                        <div class="d-flex align-items-center mb-3">
                          <span
                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                           
                          </span>
                        
                        </div>
                        <div class="d-flex align-items-center">
                          <!-- <div class="me-4">
                           
                          
                          </div> -->
                          <div>
                           
                          
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <!-- <div id="breakup">

                          </div> -->
                          <div class="container col-sm-1">

                          
                          <!-- Dona de inicio -->
                          <div style="width: 300px; display: flexbox; margin-left: -200px;">
                            <canvas id="myChart" style="display: flexbox; "></canvas>
                          </div>
                          
                          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                          
                          
                        </div>
                      </div>
                    </div>
                  </div>
              
              <div class="column-gap-lg-4">
              </div>
                 <!-- cuadro -->
                <!-- Dona de inicio --> 
              </div>
            </div>
          </div>
            
          <div class="col-lg-12 d-flex align-items-stretch">
  <div class="card w-100">
    <div class="card-body p-4">
      <h5 class="card-title fw-semibold mb-4" style="color:#06573f">Operaciones abiertas</h5>
      <div class="table-responsive">
        <div class="container">
          <input type="text" id="searchInput" class="form-control" placeholder="Buscar">
          <table id="myTable" class="table table-striped">
            <thead>
              <tr>
                <th>Id Cliente</th>
                <th>N. Operación</th>
                <th>Acción</th>
                <th>Tipo</th>
                <th>Principal</th>
                <th>Plazo Meses</th>
                <th>Tasa Mensual</th>
                <th>Cuota</th>
                <th>Saldo Actual</th>
                <th>N. Pagos</th>
                <th>Principal Pagado</th>
                <th>Interés Pagado</th>
                <th>Total Pagado</th>
                <th>Fecha Operación</th>
                <th>Estado</th>
                <th>Contrato</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require('conexion.php');
              

              $consultaCliente = "SELECT * FROM prestamos WHERE cliente_id='$id'";
              $resultado = mysqli_query($conn, $consultaCliente);

              if ($resultado) {
                while ($row = $resultado->fetch_assoc()) {
                  $id = $row['cliente_id'];
                  $idOp = $row['prestamo_id'];
                  $tipoOp = $row['tipoOp'];
                  $cuotaOp = $row['cuotaOp'];
                  $plazo = $row['plazoOp'];
                  $tasa = $row['tasaOp'];
                  $saldo = $row['saldoOp'];
                  $cuotasPagadasOp = $row['cuotasPagadasOp'];
                  $amort = $row['amortizadoOp'];
                  $intPag = $row['interesPagadoOp'];
                  $faltantes = $row['cuotasFaltantesOp'];
                  $fecha = $row['fechaOp'];
                  $montoPagado = $row['montoPagado'];
                  $montoPrestado = $row['montoOp'];
                  $estado = $row['estado'];
                  $contrato = $row['contrato'];
              ?>

                  <tr>
                    <td><a href="clienteDetalle.php?id=<?php echo $id; ?>"><?php echo $id; ?></a></td>
                    <td><a href="opDetalle.php?id=<?php echo $idOp; ?>&idCliente=<?php echo $id; ?>"><?php echo $idOp; ?></a></td>
                    <td><a href="eliminarOpp.php?idOp=<?php echo $idOp; ?>">Eliminar</a></td>
                    <td><?php echo $tipoOp == "MICRO" ? "MICRO" : "ADELANTO"; ?></td>
                    <td><?php echo number_format($montoPrestado, 0, ',', '.') ; ?></td>
                    <td><?php echo $plazo; ?></td>
                    <td><?php echo $tasa; ?></td>
                    <td><?php echo number_format($cuotaOp, 0, ',', '.') ; ?></td>
                    <td><?php echo number_format($saldo, 0, ',', '.') ; ?></td>
                    <td><?php echo $cuotasPagadasOp; ?></td>
                    <td><?php echo number_format($amort, 0, ',', '.'); ?></td>
                    <td><?php echo number_format($intPag, 0, ',', '.') ; ?></td>
                    <td><?php echo number_format($montoPagado, 0, ',', '.') ; ?></td>
                    <td><?php echo $fecha; ?></td>
                    <td><?php echo $estado == 0 ? "ABIERTA" : "CERRADA"; ?></td>
                    <td>
                      <?php 
                      if ($contrato) {
                      ?>
                        <a href="bajarPdf.php?id=<?php echo $contrato; ?>"><img src="../assets/images/logos/logopdf.jpg" width="25px" alt="" srcset=""></a>
                      <?php
                      }
                      ?>
                    </td>
                  </tr>

              <?php
                }
              }
              mysqli_close($conn);
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


      
        
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://avocash.tech/" target="_blank" class="pe-1 text-primary text-decoration-underline">Julio Peraza</a> from <a href="https://avocash.tech">Avocash.tech</a></p>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
</body>

</html>