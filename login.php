<?php
error_reporting(0);

session_start();
session_unset(); //Borrar las variables de sesión
//Destruir la sesión
if(session_destroy()){
  //echo "La sesión ha sido cerrada correctamente";
}else {
  //echo "Error al destruir la sesión";
}
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
  <title>Acceso de Usuarios</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Kermesse/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../Kermesse/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Jalert -->
  <link rel="stylesheet" href="../Kermesse/plugins/jAlert/dist/jAlert.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Kermesse/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <!-- <a href="../Kermesse/sistema-kermesse.php"><b>Sistema</b>Kermesse</a> -->
    <b>Sistema Kermesse</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingresar datos de acceso para iniciar Sesión.</p>

      <form action="../Kermesse/negocio/ng_usuario.php" method="post">
        <div class="input-group mb-3">
          <input type="hidden" name="txtaccion" id="txtaccion" value="3">
          <input type="text" name="user" id="user" class="form-control" placeholder="Usuario" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Contraseña" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
          
          

          <div class="social-auth-links text-center mb-3">
       
        <input type="submit" class="btn btn-block btn-primary" value="Ingresar">
          
        <input type="reset" class="btn btn-block btn-danger" value="Cancelar">
      
      </div>
          <!-- /.col -->
        
      </form>

      
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../Kermesse/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../Kermesse/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- JAlert js -->
<script src="../Kermesse/plugins/jAlert/dist/jAlert.min.js"></script>
<script src="../Kermesse/plugins/jAlert/dist/jAlert-functions.min.js"></script>
<!-- AdminLTE App -->
<script src="../Kermesse/dist/js/adminlte.min.js"></script>
<script>
 $(document).ready(function () 
  {
    var mensaje = 0;
    mensaje = "<?php echo $varMsj ?>";

    
      if(mensaje == "403")
      {
        errorAlert('Error', 'El nombre de usuario o la contraseña no pueden estar vacios!');
      }
      if(mensaje == "401")
      {
        errorAlert('Error', 'La contraseña o el nombre de usuario son incorrectos');
      }
  });
</script>
</body>
</html>
