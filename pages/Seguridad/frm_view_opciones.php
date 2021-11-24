<?php

//error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS
include '../../entidades/Seguridad/opciones.php';
include '../../datos/dt_Opciones.php';

$dtOpc = new Dt_Opciones;

//variable de control msj
$varIdOpc = 0;
if(isset($varIdOpc))
{
    $varIdOpc = $_GET['editO'];
}

$Opcion = $dtOpc->getOpciones($varIdOpc);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Seguridad | Visualizar opciones</title>

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
            <h1>Visualizar opciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Seguridad</a></li>
              <li class="breadcrumb-item active">Opciones</li>
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
                <h3 class="card-title">Visualizar opciones</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="../../negocio/ng_opciones.php">
                <div class="card-body">
                  <div class="form-group">
                    <label>ID Opcion</label>
                    <input type="text" class="form-control" id="id_opciones" name="id_opciones" readonly required>
                    <input type="hidden" value="1" name="txtaccion" id="txtaccion">
                  </div>
                  <div class="form-group">
                    <label>Descripción</label>
                    <input type="text" class="form-control" id="opcion_descripcion" name="opcion_descripcion"  maxlength="70" placeholder="Ingrese el nombre de la opción" title="Ingrese el nombre de la opción" readonly required>
                  </div>
                  <?php
                  if($Opcion->__GET('estado')==1 || $Opcion->__GET('estado')==2){
                        $estado = "Activo";
                      }else{
                        $estado = "Inactivo";

                      }
                      ?>
                  <div class="form-group">
                    <label>Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado"  maxlength="70" placeholder="Ingrese el nombre de la opción" title="Ingrese el nombre de la opción" readonly required>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <!--<button  type="reset" class="btn btn-danger">Regresar</button>-->
                  <a href="../../pages/Seguridad/tbl_opciones.php"><i class="fas fa fa-undo-alt"></i> Regresar</a>  
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
    $("#id_opciones").val("<?php echo $Opcion->__GET('id_opciones') ?>")
    $("#opcion_descripcion").val("<?php echo $Opcion->__GET('opcion_descripcion') ?>")
    $("#estado").val("<?php echo $estado ?>")
  }

  $(document).ready(function () 
  {
    setValores();
  });
</script>
</body>
</html>
