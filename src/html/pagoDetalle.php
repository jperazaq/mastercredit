<!doctype html>
<html lang="en">

<?php 
require('conexion.php');
session_start();

// Aquí puedes utilizar la conexión y ejecutar consultas
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
             $consultaCliente = "SELECT * FROM usuarioadmin WHERE email='".$email."' ";
             $resultado = mysqli_query($conn, $consultaCliente);

             if ($row = mysqli_fetch_assoc($resultado)) {
                 $nombre = $row['nombre'];
                 $papellido = $row['papellido'];
                 $sapellido = $row['sapellido'];
                 $correo = $row['email'];

                 mysqli_close($conn);
             }
             ?>

             <h4 style="color:#06573f">¡Hola, <?php echo $nombre," ", $papellido; ?>!</h4>
                
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
                    <a href="./authentication-login.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid >
        <!--  Row 1 -->


        <?php 
                
                require('conexion.php');
                $id= $_GET['idCliente'];
                $idRec= $_GET['idPago'];
               


                $consultaCliente = "SELECT * from prestamos WHERE prestamo_id='".$id."' " ;

                $resultado = mysqli_query($conn,$consultaCliente);                
                
                $row= mysqli_fetch_assoc($resultado);

              $id =  $row['prestamo_id'];
              $cliente = $row['cliente_id'];
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
              $cuotasAtrasadas =$row['cuotasAtrasadas']; 
              $montoAtraso =$row['montoAtrasado']; 

              mysqli_close($conn);
                

                
            

                ?>

             


        <div class="row align-content-center">
          <div class="col-lg-8 d-flex align-content-center" >
            <div class="card w-100 align-content-center">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h3 class="card-title fw-semibold" style="color:#06573f"><?php echo "Recibo: #"  ,$idRec?></h3>
                    <?php
                      $id= $_GET['idCliente'];
                      require("conexion.php");
                      $opId = $_GET['opId'];

                      $consultaCliente = "SELECT * FROM clientes WHERE cliente_id = '".$id."'";

                      $resultadoCliente = mysqli_query($conn, $consultaCliente);

                      $row = mysqli_fetch_assoc($resultadoCliente);

                      $nombre = $row['nombre'];
                      $papellido = $row['papellido'];
                      $sapellido = $row['sapellido'];

                      $consultaPago = "SELECT * FROM pagos WHERE pagoRecibo = '".$idRec."'";

                      $resultadoPago = mysqli_query($conn, $consultaPago);

                      $row1 = mysqli_fetch_assoc($resultadoPago);

                      $reciboPago = $row1['pagoRecibo'];
                      $fechaPago = $row1['fechaPago'];
                      $montoPago = $row1['montoPago'];
                      $banco = $row1['banco'];
                      $numCuota = $row1['numCuota'];
                      $intPagados = $row1['montoIntereses']; 
                      $principalPagado = $row1['montoPrincipal'];



                      ?>
                    <span>  <?php  echo "<a href='clienteDetalle.php?id=".$id."'> DEUDOR: $nombre $papellido $sapellido</a>"  ?> </span>


<!-- cuadro -->
                    <hr>
                   <?php $url = "editarPago.php?idCliente=". $id . "&idOp=" . $reciboPago. "&opId=".$opId ;?>
                    <td><a <?php echo "<a href='".$url." '> Actualizar Pago</a> "?>
                  </div>                 
                </div>
                
                 

                <!-- cuadro -->

              
                   
                    <div class="row align-items-center">
                      <div class="col-8">
                          <h5 class="fw-semibold mb-3">Operación: <?php echo "<a href=opDetalle.php?id=".$opId. "&idCliente=".$id.">$opId</a>"   ?></h5>
                        

                       
                        <h5 class="fw-semibold mb-3"><?php echo "Monto Pagado:" . "" ,$montoPago?></h5>

                        <h5 class="fw-semibold mb-3"><?php echo "Pago al Principal:" . "¢" ,$principalPagado ?></h5>

                        <h5 class="fw-semibold mb-3"><?php echo "Intereses Pagados:", " ",  "¢" ,$intPagados?></h5>
                        <h5 class="fw-semibold mb-3"><?php echo "Fecha de Pago:", " " ,$fechaPago?></h5>
                        <h5 class="fw-semibold mb-3"><?php echo "Banco:", " " ,$banco?></h5>
                        <h5 class="fw-semibold mb-3"><?php echo "Cuota N°:", " " ,$numCuota?></h5>
                         

                        

                          
                        
                                      
                        
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
                         
                 <!-- cuadro -->
                <!-- Dona de inicio --> 
              </div>
            </div>
          </div>
          
                       
                        
                </div>
              </div>
            </div>
          </div>
        </div>
        
       

                                          
                    </tbody>
                  </table>
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