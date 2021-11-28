<?php

error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS
include '../../entidades/Seguridad/vw_usuario_rol.php';
include '../../entidades/Seguridad/rol.php';
include '../../entidades/Seguridad/usuario.php';
include '../../entidades/Seguridad/opciones.php';

//Importamos datos
include '../../datos/dt_vw_Usuario_Rol.php';
include '../../datos/dt_Rol.php';
include '../../datos/dt_Usuario.php';
include '../../datos/dt_Opciones.php';

//ENTIDADES
$usuario = new Usuario();
$rol = new Rol();
$listOpc = new Opciones();
//DATOS
$dtRolus = new Dt_vw_Usuario_Rol;
$dtRol = new Dt_Rol;
$dtus = new Dt_Usuario;
$dtOpc = new Dt_Opciones;

//MANEJO Y CONTROL DE LA SESION
session_start(); // INICIAMOS LA SESION

//VALIDAMOS SI LA SESION ESTÁ VACÍA
if (empty($_SESSION['acceso'])) { 
    //nos envía al inicio
    header("Location: ../../login.php?msj=2");
}

$usuario = $_SESSION['acceso']; // OBTENEMOS EL VALOR DE LA SESION
//OBTENEMOS EL ROL
$rol->__SET('id_rol', $dtRol->getIdRol($usuario[0]->__GET('usuario')));
$rol->__SET('rol_descripcion', $dtRol->getRoldescripcion($usuario[0]->__GET('usuario')));


//OBTENEMOS LAS OPCIONES DEL ROL
$listOpc = $dtOpc->obtenerOpciones($rol->__GET('id_rol'));

//OBTENEMOS LA OPCION ACTUAL
$url = $_SERVER['REQUEST_URI'];
//var_dump($url);
 $inicio= strrpos($url, '/')+1; 
// var_dump($inicio); //6
 $total= strlen($url); 
//var_dump($total); //28
$fin= strripos($url, '?');
 //var_dump($fin); //22
if($fin>0){
    $miPagina = substr($url, $inicio, $fin-$inicio);
     //var_dump($miPagina);
}
else{
    $miPagina = substr($url, $inicio);
     //var_dump($miPagina);
}

////// VALIDAMOS LA OPCIÓN ACTUAL CON LA MATRIZ DE OPCIONES //////
//obtenemos el numero de elementos
$longitud = count($listOpc);
//var_dump($longitud);
$acceso = false; // VARIABLE DE CONTROL

//Recorro todos los elementos de la matriz de opciones
for($i=0; $i<$longitud; $i++)
    {
      //obtengo el valor de cada elemento
      $opcion = $listOpc[$i]->__GET('opcion_descripcion');
      if (strcmp ($miPagina , $opcion) == 0) //COMPARO LA OPCION ACTUAL CON CADA OPCIÓN DE LA MATRIZ
      {
        $acceso = true; //ACCESO CONCEDIDO
        break;
      }
    }

if(!$acceso)
{
    //ACCESO NO CONCEDIDO 
    header("Location: ../../401.php"); //REDIRECCIONAMOS A LA PAGINA DE ACCESO RESTRINGIDO
}

//variable de control msj
$varIdRolUs = 0;
if(isset($varIdRolUs))
{
    $varIdRolUs = $_GET['editRU'];
}

$Rolus = $dtRolus->getRolUsuario($varIdRolUs);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Seguridad | Roles de Usuario</title>

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
            <h1>Visualizar Rol de usuario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Seguridad</a></li>
              <li class="breadcrumb-item active">Rol Usuario</li>
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
                <h3 class="card-title">Visualizar Rol de usuario</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="../../negocio/ng_usuario_rol.php">
                <div class="card-body">
                <div class="form-group">
                    <label>ID Rol Usuario</label>
                    <input type="text" class="form-control" id="id_rol_usuario" name="id_rol_usuario" readonly required>
                    <input type="hidden" value="2" name="txtaccion" id="txtaccion">
                  </div>
        

                  <div class="form-group">
                    <label>Seleccione el usuario</label>
                    <select class="form-control" id="id_usuario" name="id_usuario" disabled="true" required>
                    <option value="">Seleccione...</option>
                    <?php
                        foreach($dtus->listUsuario() as $r):
                    ?>
                    <option value="<?php echo $r->__GET('id_usuario'); ?>"><?php echo $r->__GET('usuario'); ?></option>
                    <?php
                        endforeach;
                    ?>
                    </select>
                  </div>  

                  

                  <div class="form-group">
                    <label>Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" readonly required>
                    
                  </div>  

                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" readonly required>
                    
                  </div> 
                  <div class="form-group">
                    <label>Seleccione el rol</label>
                    <select class="form-control" id="id_rol" name="id_rol" disabled="true" required>
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

                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <a href="../../pages/Seguridad/tbl_vw_usuario_rol.php"><i class="fas fa fa-undo-alt"></i> Regresar</a>
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
    $("#id_rol_usuario").val("<?php echo $Rolus->__GET('id_rol_usuario') ?>")
    $("#id_usuario").val("<?php echo $Rolus->__GET('id_usuario') ?>")
    $("#nombre_completo").val("<?php echo $Rolus->__GET('nombre_completo') ?>")
    $("#email").val("<?php echo $Rolus->__GET('email') ?>")
    $("#id_rol").val("<?php echo $Rolus->__GET('id_rol') ?>")
  }

  $(document).ready(function () 
  {
    setValores();
  });
</script>
</body>
</html>