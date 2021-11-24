<?php

//error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS
include '../../entidades/Kermesse/kermesse.php';
include '../../datos/dt_Kermesse.php';

include '../../entidades/Kermesse/parroquia.php';
include '../../datos/dt_Parroquia.php';

$dtker = new Dt_Kermesse;
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
            <h1>Registrar Kermesse</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Kermesse</a></li>
              <li class="breadcrumb-item active">Kermesse</li>
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
                <h3 class="card-title">Registrar Kermesse</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="../../negocio/ng_kermesse.php">
                <div class="card-body">
                  <div class="form-group">
                  <div class="form-group">
                    <label>Seleccione la parroquia</label>
                    <input type="hidden" value="1" name="txtaccion" id="txtaccion">
                    <select class="form-control" id="idParroquia" name="idParroquia" required>
                    <option value="">Seleccione...</option>
                    <?php
                        foreach($dtpar->listParroquia() as $r):
                    ?>
                    <option value="<?php echo $r->__GET('idParroquia'); ?>"><?php echo $r->__GET('nombre'); ?></option>
                    <?php
                        endforeach;
                    ?>
                    </select>
                  </div>

                    <label>Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"  maxlength="100" placeholder="Ingrese el nombre de la kermesse" title="Ingrese el nombre de la kermesse" required>
                    
                  </div>
                  <div class="form-group">
                    <label>Fecha inicio</label>
                    <input type="date" class="form-control" id="fInicio" name="fInicio"   placeholder="Ingrese la fecha de inicio" title="Ingrese la fecha de inicio" required>
                    
                  </div>
                  <div class="form-group">
                    <label>Fecha final</label>
                    <input type="date" class="form-control" id="fFinal" name="fFinal"  placeholder="Ingrese la fecha de final" title="Ingrese la fecha de final" required>
                    
                  </div>

                  <div class="form-group">
                    <label>Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion"  maxlength="100" placeholder="Descripcion de la kermesse" title="Descripcion de la kermesse" required>
                    
                  </div>
                  <div class="form-group">
                    <label>Seleccione el estado</label>
                    <select class="form-control" id="estado" name="estado" required>
                    <option value="">Seleccione...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Usuario creacion</label>
                    <input type="text" class="form-control" id="usuario_creacion" name="usuario_creacion"   placeholder="Ingrese el id del usuario" title="Ingrese el id del usuario" required>
                    
                  </div>

                  <div class="form-group">
                    <label>Fecha creacion</label>
                    <input type="datetime-local" class="form-control" id="fecha_creacion" name="fecha_creacion"    title="Ingrese la fecha de creacion" required>
                    
                  </div>

                  <div class="form-group">
                    <label>Usuario modificacion</label>
                    <input type="text" class="form-control" id="usuario_modificacion" name="usuario_modificacion"   placeholder="Ingrese el id del usuario" title="Ingrese el id del usuario">
                    
                  </div>

                  <div class="form-group">
                    <label>Fecha modificacion</label>
                    <input type="datetime-local" class="form-control" id="fecha_modificacion" name="fecha_modificacion"  title="Ingrese la fecha de modificacion">
                    
                  </div>

                  <div class="form-group">
                    <label>Usuario eliminacion</label>
                    <input type="text" class="form-control" id="usuario_eliminacion" name="usuario_eliminacion"   placeholder="Ingrese el id del usuario" title="Ingrese el id del usuario">
                    
                  </div>

                  <div class="form-group">
                    <label>Fecha eliminacion</label>
                    <input type="datetime-local" class="form-control" id="fecha_eliminacion" name="fecha_eliminacion"    title="Ingrese la fecha de eliminacion">
                    
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