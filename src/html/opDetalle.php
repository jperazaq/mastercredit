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
             $consultaCliente = "SELECT * FROM usuarios WHERE email='".$email."' ";
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
      <div class="container-fluid">
        <!--  Row 1 -->


        <?php 
                
                require('conexion.php');
                $id= $_GET['id'];
                $idCliente= $_GET['idCliente'];


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
              $estado =$row['estado']; 
              $contrato=$row['contrato'];

              mysqli_close($conn);
                

                
               

                ?>

             


        <div class="row">
          <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h3 class="card-title fw-semibold" style="color:#06573f"><?php echo "Operacion: #"  ,$id?></h3>
                    <?php

                      require("conexion.php");

                      $consultaCliente= "SELECT * from clientes WHERE cliente_id='".$cliente."' " ;

                      $resultadoCliente = mysqli_query($conn,$consultaCliente);                

                      $row= mysqli_fetch_assoc($resultadoCliente);

                      $nombre= $row['nombre'];
                      $papellido= $row['papellido'];
                      $sapellido= $row['sapellido'];



                      ?>
                    <span>  <?php  echo "<a href='clienteDetalle.php?id=".$cliente."'> DEUDOR: $nombre $papellido $sapellido</a>"  ?> </span>


<!-- cuadro -->
                    <hr>

                   
                  </div>                 
                </div>
                
                 

                <!-- cuadro -->

              
                   
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h5 class="fw-semibold mb-3">Principal <?php echo  '¢',number_format($montoPrestado, 0, ',', '.') ?></h5>

                       
                        <h5 class="fw-semibold mb-3"><?php echo "Tasa Mensual:" . "" , $tasa, '%'?></h5>

                        <h5 class="fw-semibold mb-3"><?php echo "Plazo:" . "" ,$plazo, " ",'meses'?></h5>

                        <h5 class="fw-semibold mb-3"><?php echo "Cuota Mensual:", " ",  "¢" ,number_format($cuotaOp, 0, ',', '.')?></h5>
                         

                        

                          <?php 
                      require('conexion.php');
                      $sql = "SELECT SUM(montoPagado) as total FROM prestamos where prestamo_id='".$id."' ";

                        // Ejecutar la consulta
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // Obtener el resultado de la consulta
                          $row = $result->fetch_assoc();
                          $totalRegistros = $row["total"];
                     
                          ?>
                            
                            <h5 class="fw-semibold mb-3"><?php echo "Monto Pagado:" . "¢" .number_format($totalRegistros, 0, ',', '.')?></h5>
                          <?php }?>
                          <?php 
                      require('conexion.php');
                      $sql = "SELECT SUM(montoOp) as total FROM prestamos where cliente_id='".$id."' ";

                        // Ejecutar la consulta
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // Obtener el resultado de la consulta
                          $row = $result->fetch_assoc();
                          $totalRegistros = $row["total"];
                     
                          ?>
                            
                            <h5 class="fw-semibold mb-3"><?php echo "Total Amortizado:" . "¢" .number_format($amort, 0, ',', '.')?></h5>
                          <?php }?>


                          <?php 
                      require('conexion.php');
                      $sql = "SELECT SUM(montoOp) as total FROM prestamos where cliente_id='".$id."' ";

                        // Ejecutar la consulta
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // Obtener el resultado de la consulta
                          $row = $result->fetch_assoc();
                          $totalRegistros = $row["total"];
                     
                          ?>
                            
                            <h5 class="fw-semibold mb-3"><?php echo "Intereses Pagados:" . "¢" .number_format($intPag, 0, ',', '.')?></h5>
                          <?php }?>

                          <?php 
                      require('conexion.php');
                      $sql = "SELECT SUM(cuotaOp) as total FROM prestamos where cliente_id='".$id."' ";

                        // Ejecutar la consulta
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // Obtener el resultado de la consulta
                          $row = $result->fetch_assoc();
                          $totalRegistros = $row["total"];
                     
                          ?>
                            
                            <h5 class="fw-semibold mb-3"><?php echo "Cuotas Pagadas:" . "" .number_format($cuotasPagadasOp, 0, ',', '.')?></h5>
                          <?php }?>

                          
                         
                            
                            <h5 class="fw-semibold mb-3"><?php echo "Cuotas Atrasadas:" . "" .$cuotasAtrasadas?></h5>
                            <h5 class="fw-semibold mb-3"><?php echo "Monto en Atraso:" . "¢". ' ' .number_format($montoAtraso, 0, ',', '.') ?></h5>
                            
                        
                            <?php 
                              if($estado==0){ ?>
                                  <h5 class="">Estado: ABIERTA </h5>
                             <?php  }else{?>
                                <h5 class="">Estado: CERRADA </h5>
                              
                             <?php } ?>
                            
                            
                             <?php 
                              if($contrato){?>
                               <h5 class="fw-semibold mb-3"> Contrato: <h5> <a href="bajarPdf.php?id=<?php echo $contrato ; ?>"><img src="../assets/images/logos/logopdf.jpg" width="25px" alt="" srcset=""></i> </a></td>

                            <?php  }  ?>
                           
                          <h5 class="">Fecha apertura: <?php echo $fecha ?> </h5>

                                             
                       
                        
                                      
                        
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
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold" style="color:#06573f">Saldo de la Operación</h5>
                    <div class="row align-items-center">
                      <div class="col-8">

                   
                            
                            <h4 class="fw-semibold mb-3"><?php echo "Saldo :" . "¢" ,number_format($saldo, 0, ',', '.')?></h4>
                      
                      
                        <div class="d-flex align-items-center mb-3">
                          <span
                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0" style="color:#06573f">Es el total a pagar restante.
                          
                            
                            
                          
                        </p><br>

                         
                          
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                           <!-- Poner algo aqui -->
                          </div>
                          <div>
                           <!-- poner algo aqui -->
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakup"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <!-- Monthly Earnings -->
                <div class="card">
                  <div class="card-body">
                    <div class="row alig n-items-start">
                      <div class="col-8">
                        <h5 class="card-title mb-9 fw-semibold" style="color:#06573f"> Estatus de la operación</h5>

                        <?php 
                      require('conexion.php');
                      $consultaestatusDeOperacion= "SELECT * from prestamos WHERE prestamo_id='".$id."' " ;

                      $resultadoestatusDeOperacion = mysqli_query($conn,$consultaestatusDeOperacion);                

                      $row= mysqli_fetch_assoc($resultadoestatusDeOperacion);

                      $estatusDeOperacion= $row['estatusDeOperacion'];
                    
                     
                          ?>
                            
                            <h4 class="fw-semibold mb-3"><?php  if($estatusDeOperacion==1){
                              echo "ATRASADA";
                            }else{
                              echo "AL DÍA";
                            }
                             ?></h4>
                            
                       
                        <div class="d-flex align-items-center pb-1">
                          <span
                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-moneybag text-danger"></i>
                          </span>

                          
                          <p class="text-dark me-1  mb-0">Recordar al cliente su fecha de pago</p>
                          
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-end">
                          <div
                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-currency-dollar fs-6"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="earning"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4" style="color:#06573f">Pagos Realizados</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Recibo</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Fecha Pago</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Monto Pago</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Banco</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">N. Cuota</h6>
                        </th>
                        
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Intereses Pagados</h6>
                        </th>

                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Principal Pagado</h6>
                        </th>


                        
                        
                      </tr>
                    </thead>

        <?php 

        
        
        $consulta = "SELECT * from pagos where prestamo_id='".$id."'";

        $resultado =  mysqli_query($conn, $consulta);

          if($resultado){
            
            while($row = $resultado -> fetch_assoc()){
              
             
              $reciboPago = $row['pagoRecibo'];
              $fechaPago = $row['fechaPago'];
              $montoPago = $row['montoPago'];
              $banco = $row['banco'];
              $numCuota = $row['numCuota'];
              $intPagados = $row['montoIntereses']; 
              $principalPagado = $row['montoPrincipal']; 
              
            
        ?>
        
        
           
        
      
         
         

                    
                    <tbody>
                      <tr>

                      <?php 

                      $id = 
                      $url = "pagoDetalle.php?idCliente=" .$idCliente.  "&idPago=" . $reciboPago. "&opId=" .$idOp;

                      
                      ?>

                      <td> <?php  echo "<a href='".$url."'> $reciboPago</a>"  ?></td>
                        
                        <td class="border-bottom-0">
                            <h6 class="mb-0 fw-normal"><?php echo $fechaPago  ?></h6>
                                                    
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo number_format($montoPago, 0, ',', '.')  ?></p>
                        </td>
                       
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal"><?php echo $banco ?></h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal"><?php echo $numCuota?></h6>
                        </td>
                   

                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal"><?php echo number_format($intPagados, 0, ',', '.') ?></h6>
                        </td>

                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal"><?php echo number_format($principalPagado, 0, ',', '.') ?></h6>
                        </td>
                       
                      </tr> 
                     
                    
                      <?php  




}

}


?>
                                          
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