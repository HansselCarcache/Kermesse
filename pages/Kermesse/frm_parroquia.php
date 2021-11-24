<?php

//error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS
include '../../entidades/Kermesse/parroquia.php';
include '../../datos/dt_Parroquia.php';

$dtpar = new Dt_Parroquia;

//variable de control msj
$varMsj = 0;
if(isset($varMsj))
{
    $varMsj = $_GET['msj'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

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
            <h1>Registrar Parroquia</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Kermesse</a></li>
              <li class="breadcrumb-item active">Parroquia</li>
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
                <h3 class="card-title">Registrar Parroquia</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="../../negocio/ng_parroquia.php">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"  maxlength="100" placeholder="Ingrese el nombre de la parroquia" title="Ingrese el nombre de la parroquia" required>
                    <input type="hidden" value="1" name="txtaccion" id="txtaccion">
                  </div>
                  <div class="form-group">
                    <label>Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion"  maxlength="100" placeholder="Ingrese la dirección de la parroquia" title="Ingrese la dirección de la parroquia" required>
                    
                  </div>
                  <div class="form-group">
                    <label>Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono"  maxlength="15" placeholder="Ingrese el telefono" title="Ingrese el telefono" required>
                    
                  </div>

                  <div class="form-group">
                    <label>Parroco</label>
                    <input type="text" class="form-control" id="parroco" name="parroco"  maxlength="100" placeholder="Ingrese el nombre del parroco" title="Ingrese el nombre del parroco" required>
                    
                  </div>
                  <div class="form-group">
                    <label>Logo</label>
                    <input type="text" class="form-control" id="logo" name="logo"  maxlength="100" placeholder="Ingrese el logo de la parroquia" title="Ingrese el logo de la parroquia">
                    
                  </div>

                  <div class="form-group">
                    <label>Sitio Web</label>
                    <input type="text" class="form-control" id="sitio_web" name="sitio_web"  maxlength="50" placeholder="Ingrese el sitio web de la parroquia" title="Ingrese el sitio web de la parroquia">
                    
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="reset" class="btn btn-danger">Cancelar</button>
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
</body>
</html>
