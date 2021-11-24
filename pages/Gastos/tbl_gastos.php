<?php

//error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS
include '../../entidades/Gastos/gastos.php';
include '../../datos/dt_gastos.php';

$dtga = new Dt_Gastos;

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
  <title>Kermesse | Opciones</title>

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
            <h1>Datos Gastos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Opciones</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h3 class="card-title">Gastos registrados</h3>
              </div>
              <div class="card-body">
                <div class="form-group col-md-12" style="text-align: right;">
                  <a href="frm_gastos.php" title="Registrar una nueva opcion"><i class="fas fa-plus-circle"></i> Registrar nuevo gasto</a>
                </div>
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>ID Registro Gasto</th>
                        <th>Nombre Kermesse</th>
                        <th>Categoria de gasto</th>
                        <th>Fecha Gasto</th>
                        <th>Concepto</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Usuario creacion</th>
                        <th>Fecha de creacion</th>
                        <th>Usuario Modificacion</th>
                        <th>Fecha de modificacion</th>
                        <th>Usuario eliminación</th>
                        <th>Fecha de eliminación</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    foreach($dtga->listGastos() as $r):
                  ?>

                    <tr>
                        <td><?php echo $r->__GET('id_registro_gastos');?></td>
                        <td><?php echo $r->__GET('nombre');?></td>
                        <td><?php echo $r->__GET('nombre_categoria');?></td>
                        <td><?php echo $r->__GET('fechaGasto');?></td>
                        <td><?php echo $r->__GET('concepto');?></td>
                        <td><?php echo $r->__GET('monto');?></td>
                        <td><?php echo $r->__GET('estado');?></td>
                        <td><?php echo $r->__GET('usuario_creacion');?></td>
                        <td><?php echo $r->__GET('fecha_creacion');?></td>
                        <td><?php echo $r->__GET('usuario_modificacion');?></td>
                        <td><?php echo $r->__GET('fecha_modificacion');?></td>
                        <td><?php echo $r->__GET('usuario_eliminacion');?></td>
                        <td><?php echo $r->__GET('fecha_eliminacion');?></td>
                        
                    
                    </tr>
                    <?php
                        endforeach;
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>ID Registro Gasto</th>
                        <th>Nombre Kermesse</th>
                        <th>Categoria de gasto</th>
                        <th>Fecha Gasto</th>
                        <th>Concepto</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Usuario creacion</th>
                        <th>Fecha de creacion</th>
                        <th>Usuario Modificacion</th>
                        <th>Fecha de modificacion</th>
                        <th>Usuario eliminación</th>
                        <th>Fecha de eliminación</th>
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
  $(document).ready(function ()
  {
    ///////Variable de control de MSj//////////
    var mensaje = 0;
    mensaje = "<?php echo $varMsj ?>";

      if(mensaje == "1")
      {
        successAlert('Exito', 'Los datos han sido registrados exitosamente!');
      }
      if(mensaje == "2")
      {
        successAlert('Error', 'Revise los datos e intente nuevamente!');
      }
  

  

  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ "excel", "pdf"]
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
});////FIN  $(document).ready(function ()
</script>
</body>
</html>