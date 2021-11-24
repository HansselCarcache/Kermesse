<?php

//error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS
include '../../entidades/ControlCaja/vw_tasaCambio.php';
include '../../datos/dt_vw_tasacambio.php';
include '../../entidades/ControlCaja/moneda.php';
include '../../datos/dt_moneda.php';

$dtTsc = new Dt_vw_TasaCambio;
$dtMn = new Dt_Moneda;

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
  <title>Control Caja | Nueva tasa de cambio</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
            <h1>Ingresar tasa de cambio</h1>
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
                <h3 class="card-title">Ingresar tasa de cambio</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" name="formulario" action="../../negocio/ng_tasacambio.php">
                <div class="card-body">
                  <h2>Tasa Cambio</h2>
                
                  <div class="form-group">
                    <label>ID Tasa Cambio</label>
                    <input type="text" class="form-control" id="id_tasaCambio" name="id_tasaCambio" readonly required>
                    <input type="hidden" value="1" name="txtaccion" id="txtaccion">
                  </div> 
                  
                  <div class="form-group">
                    <label>Seleccione la moneda O</label>
                  <select class="form-control" id="id_monedaO" name="id_monedaO" required>
                  <option value="">Seleccione...</option>
                    <?php
                        foreach($dtMn->listMoneda() as $r):
                    ?>
                    <option value="<?php echo $r->__GET('id_moneda'); ?>"><?php echo $r->__GET('simbolo'); ?></option>
                    <?php
                        endforeach;
                    ?>
                    </select>
                  </div>


                  <div class="form-group">
                    <label>Seleccione la moneda de cambio</label>
                    <select class="form-control" id="id_monedaC" name="id_monedaC" required>
                    <option value="">Seleccione...</option>
                    <?php
                        foreach($dtMn->listMoneda() as $r):
                    ?>
                    <option value="<?php echo $r->__GET('id_moneda'); ?>"><?php echo $r->__GET('simbolo'); ?></option>
                    <?php
                        endforeach;
                    ?>
                    </select>
                  </div>

                   <!-- <div class="form-group">
                    <label>Mes</label>
                    <input type="text" class="form-control" id="mes" name="mes"  maxlength="15" placeholder="Ingrese el mes actual" title="Ingrese el mes actual" required>
                  </div> prueba-->

                  <label>Mes</label>
                  <select class="form-control" id="mes" name="mes" required>
                    <option value="Enero">Enero</option>
                    <option value="Febrero">Febrero</option>
                    <option value="Marzo">Marzo</option>
                    <option value="Abril">Abril</option>
                    <option value="Mayo">Mayo</option>
                    <option value="Junio">Junio</option>
                    <option value="Julio">Julio</option>
                    <option value="Agosto">Agosto</option>
                    <option value="Septiembre">Septiembre</option>
                    <option value="Octubre">Octubre</option>
                    <option value="Noviembre">Noviembre</option>
                    <option value="Diciembre">Diciembre</option>
                  </select>
                 
                  <div class="form-group">
                    <label>Año</label>
                    <input type="text" class="form-control" id="anio" name="anio"  placeholder="Ingrese el año" title="Ingrese el año" required>
                    
                  </div>

                  <h2>Detalle Tasa Cambio</h2>

                  <div class="form-group">
                    <label>Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                    
                  </div>
                  <div class="form-group">
                    <label>Tipo de Cambio</label>
                    <input type="text" class="form-control" id="tipoCambio" name="tipoCambio" placeholder="Ingrese el tipo de cambio" title="Ingrese el tipo de cambio" required>
                    
                  </div>
                  <div>
                  <input type="hidden"  name="detalle" id="detalle">
                  <button type="button" class="btn btn-primary" onclick="agregarFila()">Registrar nuevo</button>
                  <!-- <button type="button" class="btn btn-primary" onclick="test()">Ver</button>  -->
                </div>
                <br>
                  <table id="tabla" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo de Cambio</th>
                        <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                     

                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo de Cambio</th>
                        <th>Acciones</th>
                    </tr>
                  </tfoot>
                </table>
                  
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" onclick="test()" class="btn btn-primary">Guardar</button>
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
            function agregarFila(){
                 
                var fec =  $('#fecha').val();
                var tas = $('#tipoCambio').val();

                 document.getElementById("tabla").insertRow(1).innerHTML = 
                 '<td>'+ fec +'</td>'+
                 '<td>'+ tas +'</td>' + 
                 '<td><button type="button" class="btn btn-sm btn-danger borrar"><i class="fas fa-trash-alt"></i></button></td>';
            }
          
            function eliminarFila () {
                $(document).on('click', '.borrar', function (event) {
                    event.preventDefault();
                    $(this).closest('tr').remove();
                });
            }
</script>

<script >
function verid() {
    //if (!document.getElementsByTagName || !document.createTextNode) return;
    
    let detalle =[];
    var rows = document.getElementById('tabla').getElementsByTagName('tr');
    for (i = 1; i < rows.length-1; i++) {
    var fecha = document.getElementById('tabla').getElementsByTagName('tr')[i].getElementsByTagName('td')[0].innerHTML;      
		var cambio = document.getElementById('tabla').getElementsByTagName('tr')[i].getElementsByTagName('td')[1].innerHTML;
    if(i ==1){
      detalle.push(fecha,cambio)
    }else{
      detalle.push("/"+fecha,cambio)
    }
    
    
    
    //alert(detalle) 
    //alert(document.getElementById('tabla').getElementsByTagName('tr')[i].getElementsByTagName('td')[1].innerHTML);      
     
       } 
       return detalle
       
           
    }
</script>

<script>
  function test(){
      let tasa = [];
      verid();
      var prueba = new Array();
       prueba = verid();
       tasa.push(prueba)
      
      //alert(tasa)
      var Myelement = document.forms['formulario']['detalle'];
      //console.log(Myelement.value);
      Myelement.setAttribute('value',tasa);
      //console.log(Myelement.value);
      
    }
  </script>

        <script>
            $(document).ready(function(){
                
                eliminarFila();
            })
        </script>



       

</body>
</html>
