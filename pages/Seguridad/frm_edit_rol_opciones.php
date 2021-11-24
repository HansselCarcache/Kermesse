<?php

//error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS
include '../../entidades/Seguridad/vw_rol_opciones.php';
include '../../datos/dt_vw_Rol_Opciones.php';

include '../../entidades/Seguridad/rol.php';
include '../../datos/dt_Rol.php';

include '../../entidades/Seguridad/opciones.php';
include '../../datos/dt_Opciones.php';

$dtRolop = new Dt_Vw_Rol_Opciones;
$dtRol = new Dt_Rol;
$dtOpc = new Dt_Opciones;

//variable de control msj
$varIdRolOpc = 0;
if(isset($varIdRolOpc))
{
    $varIdRolOpc = $_GET['editRO'];
}

$Rolopc = $dtRolop->getRolOpciones($varIdRolOpc);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Seguridad | Registrar Opcion de Rol</title>

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
            <h1>Modificar Opciones de Rol</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Seguridad</a></li>
              <li class="breadcrumb-item active">Opciones de Rol</li>
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
                <h3 class="card-title">Modificar opcion de rol</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="../../negocio/ng_rol_opciones.php">
                <div class="card-body">
                <div class="form-group">
                    <label>ID Rol Opcion</label>
                    <input type="text" class="form-control" id="id_rol_opciones" name="id_rol_opciones" readonly required>
                    <input type="hidden" value="2" name="txtaccion" id="txtaccion">
                  </div>
                  <div class="form-group">
                    <label>Rol</label>
                    <select class="form-control" id="id_rol" name="id_rol" required>
                    <option value="">Seleccione...</option>
                    <?php
                        foreach($dtRol->listRol() as $r):
                    ?>
                    <option value="<?php echo $r->__GET('id_rol'); ?>"><?php echo $r->__GET('rol_descripcion'); ?></option>
                    <?php
                        endforeach;
                    ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Opción</label>
                    <select class="form-control" id="id_opciones" name="id_opciones" required>
                    <option value="">Seleccione...</option>
                    <?php
                        foreach($dtOpc->listOpciones() as $r):
                    ?>
                    <option value="<?php echo $r->__GET('id_opciones'); ?>"><?php echo $r->__GET('opcion_descripcion'); ?></option>
                    <?php
                        endforeach;
                    ?>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="button" onclick="setValores()" class="btn btn-danger">Cancelar</button>
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
    $("#id_rol_opciones").val("<?php echo $Rolopc->__GET('id_rol_opciones') ?>")
    $("#id_rol").val("<?php echo $Rolopc->__GET('id_rol') ?>")
    $("#id_opciones").val("<?php echo $Rolopc->__GET('id_opciones') ?>")
  }

  $(document).ready(function () 
  {
    setValores();
  });
</script>
</body>
</html>