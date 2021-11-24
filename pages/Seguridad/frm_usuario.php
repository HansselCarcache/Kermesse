<?php

//error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS
include '../../entidades/Seguridad/usuario.php';
include '../../datos/dt_Usuario.php';

$dtus = new Dt_Usuario;

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
  <title>Seguridad | Registrar Usuario</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../plugins/jAlert/dist/jAlert.css" />
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
            <h1>Registrar Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Seguridad</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
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
                <h3 class="card-title">Registrar Usuario</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="../../negocio/ng_usuario.php" name="form1" id="form1" onsubmit="return toSubmit(event)">
                <div class="card-body">
                  <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario"  maxlength="40" placeholder="Ingrese el nombre del usuario" title="Ingrese el nombre del usuario" required>
                    <input type="hidden" value="1" name="txtaccion" id="txtaccion">
                  </div>
                  <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" id="pwd" name="pwd"  maxlength="45" placeholder="Ingrese su contraseña" title="Ingrese su contraseña" required>
                    
                  </div>
                  <div class="form-group">
                    <label>Confirme su contraseña:</label>
                    <input type="password" class="form-control" id="pwd2" name="pwd2"  maxlength="45" placeholder="Confirme su contraseña" title="Confirme su contraseña" required>
                    
                  </div>
                  <div class="form-group">
                    <label>Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres"  maxlength="45" placeholder="Ingrese sus nombres" title="Ingrese sus nombres" required>
                    
                  </div>

                  <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos"  maxlength="45" placeholder="Ingrese sus apellidos" title="Ingrese sus apellidos" required>
                    
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email"  maxlength="45" placeholder="Ingrese su correo electronico" title="Ingrese su correo electronico" required>
                    
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  
                  <button type="submit" onclick="comprobarClave()" class="btn btn-primary">Guardar</button>
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
<!-- JAlert js -->
<script src="../../plugins/jAlert/dist/jAlert.min.js"></script>
<script src="../../plugins/jAlert/dist/jAlert-functions.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  function toSubmit(e){
    e.preventDefault(); 
  try {
   someBug();
  } catch (e) {
   throw new Error(e.message);
  }
  return false;
   }
   function validar(){
    var form = document.getElementById("form1");
form.onsubmit = function() {
  return true;
}
   }
   
</script>

<script>
  function comprobarClave(){
    clave1 = document.form1.pwd.value
    clave2 = document.form1.pwd2.value

    if (clave1 == clave2)
    {
    validar();
    }    
    else{
      errorAlert('Error!', 'Las contraseñas no son iguales, intente de nuevo!');
      //document.form1.pwd.value = ""
      //document.form1.pwd2.value = ""
    }
    
}
</script>  
</body>
</html>
