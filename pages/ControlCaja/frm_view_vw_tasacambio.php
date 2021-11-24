<?php

//error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS
include '../../entidades/ControlCaja/vw_tasaCambio.php';
include '../../datos/dt_vw_tasacambio.php';
include '../../entidades/ControlCaja/moneda.php';
include '../../datos/dt_moneda.php';
include '../../entidades/ControlCaja/tasacambiodet.php';

$dtTsc = new Dt_vw_TasaCambio;
$dtMn = new Dt_Moneda;

//variable de control msj
$varIdTsc = 0;
if(isset($varIdTsc))
{
    $varIdTsc = $_GET['editT'];
}

$Tasa = $dtTsc->getTasaCambio($varIdTsc);
$select = $dtTsc->listTasaCambiodet($varIdTsc);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Control Caja | Visualizar tasa de cambio</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<?php include('../../datos/Diseño.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Visualizar tasa de cambio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Control de Caja</a></li>
              <li class="breadcrumb-item active">Tasa de cambio</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Visualizar tasa de cambio</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="../../negocio/ng_usuario.php">
                <div class="card-body">
                <h2>Tasa Cambio</h2>
                  <div class="form-group">
                    <label>ID Tasa Cambio</label>
                    <input type="text" class="form-control" id="id_tasaCambio" name="id_tasaCambio" readonly required>
                  </div> 
                  

                  <div class="form-group">
                    <label>Moneda O</label>
                    <input type="text" class="form-control" id="id_moneda1" name="id_moneda1"  maxlength="15" placeholder="Ingrese el mes actual" title="Ingrese el mes actual" readonly required>
                  </div>

                  <div class="form-group">
                    <label>Simbolo O</label>
                    <input type="text" class="form-control" id="simbolo1" name="simbolo1"  maxlength="15" placeholder="Ingrese el mes actual" title="Ingrese el mes actual" readonly required>
                  </div>

                  <div class="form-group">
                    <label>Moneda Cambio</label>
                    <input type="text" class="form-control" id="id_moneda2" name="id_moneda2"  maxlength="15" placeholder="Ingrese el mes actual" title="Ingrese el mes actual" readonly required>
                  </div>

                  <div class="form-group">
                    <label>Simbolo Cambio</label>
                    <input type="text" class="form-control" id="simbolo2" name="simbolo2"  maxlength="15" placeholder="Ingrese el mes actual" title="Ingrese el mes actual" readonly required>
                  </div>

                   <div class="form-group">
                    <label>Mes</label>
                    <input type="text" class="form-control" id="mes" name="mes"  maxlength="15" placeholder="Ingrese el mes actual" title="Ingrese el mes actual" readonly required>
                  </div>
                 
                  <div class="form-group">
                    <label>Año</label>
                    <input type="text" class="form-control" id="año" name="año"  placeholder="Ingrese el año" title="Ingrese el año" readonly required>
                    
                  </div>

                  <h2>Detalle Tasa Cambio</h2>
                  
                  <table id="tabla" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>ID Tasa Cambio</th>
                        <th>Id Tasa Cambio detalle</th>
                        <th>Fecha</th>
                        <th>Tipo de Cambio</th>
                        
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  foreach($select as $r):
                    ?>
                    <tr>
                        <td><?php echo $r->__GET('id_tasaCambio');?></td>
                        <td><?php echo $r->__GET('id_tasaCambio_det');?></td>
                        <td><?php echo $r->__GET('fecha');?></td>
                        <td><?php echo $r->__GET('tipoCambio');?></td>
                        
                    </tr>
                    <?php
                        endforeach;
                    ?>
                     

                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Id Tasa Cambio detalle</th>
                        <th>Fecha</th>
                        <th>Tipo de Cambio</th>
                        <th>Acciones</th>
                    </tr>
                  </tfoot>
                </table>
                  
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                <a href="../../pages/ControlCaja/tbl_vw_tasacambio.php"><i class="fas fa fa-undo-alt"></i> Regresar</a> 
                  </div>
              </form>
              </div>
                <!-- /.card -->

                         
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<script>
  function setValores()
  {
    $("#id_tasaCambio").val("<?php echo $Tasa->__GET('id_tasaCambio') ?>")
    $("#id_moneda1").val("<?php echo $Tasa->__GET('moneda1') ?>")
    $("#simbolo1").val("<?php echo $Tasa->__GET('simbolo1') ?>")
    $("#id_moneda2").val("<?php echo $Tasa->__GET('moneda2') ?>")
    $("#simbolo2").val("<?php echo $Tasa->__GET('simbolo2') ?>")
    $("#mes").val("<?php echo $Tasa->__GET('mes') ?>")
    $("#año").val("<?php echo $Tasa->__GET('anio') ?>")
    $("#fecha").val("<?php echo $Tasa->__GET('fecha') ?>")
    $("#tipoCambio").val("<?php echo $Tasa->__GET('tipoCambio') ?>")
  }

  $(document).ready(function () 
  {
    setValores();
  });
</script>
</body>
</html>
