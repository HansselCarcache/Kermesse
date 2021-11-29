<?php

error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS
include '../../entidades/Seguridad/usuario.php';
include '../../entidades/Seguridad/rol.php';
include '../../entidades/Seguridad/opciones.php';

//Importamos datos
include '../../datos/dt_Rol.php';
include '../../datos/dt_Opciones.php';
include '../../datos/dt_Usuario.php';

//ENTIDADES
$usuario = new Usuario();
$rol = new Rol();
$listOpc = new Opciones();
//DATOS
$dtr = new Dt_Rol();
$dtOpc = new Dt_Opciones;
$dtUs = new Dt_Usuario;

//MANEJO Y CONTROL DE LA SESION
session_start(); // INICIAMOS LA SESION

//VALIDAMOS SI LA SESION ESTÁ VACÍA
if (empty($_SESSION['acceso'])) { 
    //nos envía al inicio
    header("Location: ../../login.php?msj=2");
}

$usuario = $_SESSION['acceso']; // OBTENEMOS EL VALOR DE LA SESION
//OBTENEMOS EL ROL
$rol->__SET('id_rol', $dtr->getIdRol($usuario[0]->__GET('usuario')));
$rol->__SET('rol_descripcion', $dtr->getRoldescripcion($usuario[0]->__GET('usuario')));


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
  <title>Seguridad | Usuarios</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="../../datos/googleapiscss.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

   <!-- Jalert -->
   <link rel="stylesheet" href="../../plugins/jAlert/dist/jAlert.css">
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
            <h1>Usuarios</h1>
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


    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h3 class="card-title">Usuarios registrados</h3>
              </div>
              <div class="card-body">
              <div class="form-group col-md-12" style="text-align: right;">
                  <a href="frm_usuario.php" title="Registrar una nueva opcion"><i class="fas fa-plus-circle"></i> Registrar un nuevo usuario</a>
                </div>
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>ID Usuario</th>
                        <th>Usuario</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    foreach($dtUs->listUsuario() as $r):
                      $estado = "";
                      if($r->__GET('estado')==1 || $r->__GET('estado')==2 || $r->__GET('estado')==4){
                        $estado = "Activo";
                      }else{
                        $estado = "Inactivo";

                      }
                  ?>

                    <tr>
                        <td><?php echo $r->__GET('id_usuario');?></td>
                        <td><?php echo $r->__GET('usuario');?></td>
                        <td><?php echo $r->__GET('nombres');?></td>
                        <td><?php echo $r->__GET('apellidos');?></td>
                        <td><?php echo $r->__GET('email');?></td>
                        <td><?php echo $estado;?></td>
                        <td>
                          <a href="frm_edit_usuario.php?editU=<?php echo $r->__GET('id_usuario'); ?>">
                            <i class="far fa-edit" title="Editar Opciones"></i>
                          </a>
                          &nbsp;&nbsp;
                          <a href="frm_view_usuario.php?editU=<?php echo $r->__GET('id_usuario'); ?>">
                            <i class="far fa-eye" title="Visualizar Opciones"></i>
                          </a> 
                          &nbsp;&nbsp;
                          <a href="#" onclick="deleteUsuario(<?php echo $r->__GET('id_usuario'); ?>);">
                            <i class="far fa-trash-alt" title="Eliminar Opciones"></i>
                          </a>
                          
                             
                        </td>
                    
                    </tr>
                    <?php
                        endforeach;
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>ID Usuario</th>
                        <th>Usuario</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
        </div>
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

<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- JAlert js -->
<script src="../../plugins/jAlert/dist/jAlert.min.js"></script>
<script src="../../plugins/jAlert/dist/jAlert-functions.min.js"></script>

<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
function deleteUsuario(idO){
    $.jAlert({
        'type': 'confirm',
        'confirmQuestion': '¿Esta seguro que desea eliminar el registro?',
        'onConfirm': function(e, btn){
          e.preventDefault();
          //do something here
          window.location.href = "../../negocio/ng_usuario.php?deleteU="+idO;
          btn.parents('.jAlert').closeAlert();
          return false;
        },
        'onDeny': function(e, btn){
          e.preventDefault();
          //do something here
          btn.parents('.jAlert').closeAlert();
          return false;
        }
    });
}

 $(document).ready(function ()
  {
    ///////Variable de control de MSj//////////
    var mensaje = 0;
    mensaje = "<?php echo $varMsj ?>";

    if(mensaje == "1")
      {
        successAlert('Exito', 'Los datos han sido registrados exitosamente!');
      }
      if(mensaje == "2" || mensaje == "4")
      {
        errorAlert('Error', 'Revise los datos e intente nuevamente!');
      }
      if(mensaje == "3")
      {
        successAlert('Exito', 'Los datos han sido editados exitosamente!');
      }
      if(mensaje == "5")
      {
        successAlert('Exito', 'Los datos han sido eliminados exitosamente!');
      }
      if(mensaje == "6")
      {
        errorAlert('Exito', 'No se han podido eliminar los datos');
      }
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  });
</script>
</body>
</html>