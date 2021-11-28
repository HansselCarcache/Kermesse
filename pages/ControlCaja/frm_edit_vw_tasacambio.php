<?php

error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS
include '../../entidades/ControlCaja/vw_tasaCambio.php';
include '../../entidades/ControlCaja/moneda.php';
include '../../entidades/ControlCaja/tasacambiodet.php';
include '../../entidades/Seguridad/usuario.php';
include '../../entidades/Seguridad/rol.php';
include '../../entidades/Seguridad/opciones.php';

//Importamos datos
include '../../datos/dt_Rol.php';
include '../../datos/dt_Opciones.php';
include '../../datos/dt_vw_tasacambio.php';
include '../../datos/dt_moneda.php';

//ENTIDADES
$usuario = new Usuario();
$rol = new Rol();
$listOpc = new Opciones();
//DATOS
$dtr = new Dt_Rol();
$dtOpc = new Dt_Opciones;
$dtTsc = new Dt_vw_TasaCambio;
$dtMn = new Dt_Moneda;

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

$varIdTsc = 0;
if(isset($varIdTsc))
{
    $varIdTsc = $_GET['editT'];
}

$Tasa = $dtTsc->getTasaCambio($varIdTsc);
$select = $dtTsc->listTasaCambiodet($varIdTsc);

$varIdTscdet = 0;
if(isset($varIdTscdet))
{
    $varIdTscdet = $_REQUEST['editTD'];
}

$edit = $dtTsc->getTasaCambiodet($varIdTscdet);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Control Caja | Modificar tasa de cambio</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
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
            <h1>Modificar Maestro tasa de cambio</h1>
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
                <h3 class="card-title">Modificar tasa de cambio</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="../../negocio/ng_tasacambio.php">
                <div class="card-body">
                <h2>Tasa Cambio</h2>
                  <div class="form-group">
                    <label>ID Tasa Cambio</label>
                    <input type="text" class="form-control" id="id_tasaCambio" name="id_tasaCambio" readonly required>
                    <input type="hidden" value="2" name="txtaccion" id="txtaccion">
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
                  </div> -->
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
                  

                  <div class="card-footer">
                <button type="submit"  class="btn btn-primary">Modificar encabezado</button>
                  <button type="reset" class="btn btn-danger">Cancelar</button>
                  </div>
                  
              </form>
                  
            </div>  
            <div id="redirect" class="card card-primary">     
                  <div class="card-header">
                <h3 class="card-title">Modificar tasa de cambio detalle</h3>
              </div>
                  <form method="POST" action="../../negocio/ng_tasacambiodet.php">
                  <div class="card-body">
                  <h2>Detalle Tasa Cambio</h2>
                  <div>
                    <label>ID Tasa Cambio detalle</label>
                    <input type="text" class="form-control" id="id_tasaCambio_det" name="id_tasaCambio_det" readonly required>
                    <input type="hidden"  name="detalle" id="detalle">
                    <input type="hidden" name="id_maestro" id="id_maestro">
                    <input type="hidden"  name="txtaccion2" id="txtaccion2">
                  </div>       
                  <br>
                  
                  <div style="display:flex; flex-wrap:nowrap; justify-content:space-evenly;">
                                
                    <label>Fecha</label>
                    <input type="date" class="form-control col-sm-3" id="fecha" name="fecha" required>
                                
                    <label>Tipo de Cambio</label>
                    <input type="text" class="form-control col-sm-3" id="tipoCambio" name="tipoCambio" placeholder="Ingrese el tipo de cambio" title="Ingrese el tipo de cambio" required>

                    <button type="submit" class="btn btn-primary col-sm-3" style="text-align:center;" onclick="insertar()" >Registrar detalle nuevo</button>
                                
                  </div>
                  <br>
                  <div class="card-footer">
                <button type="submit"  onclick="modificar()" class="btn btn-primary">Modificar detalle</button>
               
                  <button type="reset" class="btn btn-danger">Cancelar</button>
                  </div>
                  </form>
                  <!-- <button type="button" class="btn btn-primary" onclick="test()">Ver</button>  -->
                </div>
                  <table id="tabla" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>Id Tasa Cambio detalle</th>
                        <th>Fecha</th>
                        <th>Tipo de Cambio</th>
                        <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  foreach($select as $r):
                    ?>
                    <tr>
                        <td><?php echo $r->__GET('id_tasaCambio_det');?></td>
                        <td><?php echo $r->__GET('fecha');?></td>
                        <td><?php echo $r->__GET('tipoCambio');?></td>
                        <td>
                        <a href="../../pages/ControlCaja/frm_edit_vw_tasacambio.php?editT=<?php echo $r->__GET('id_tasaCambio')?>&editTD=<?php echo $r->__GET('id_tasaCambio_det'); ?>#redirect">
                            <i class="far fa-edit" title="Editar Detalle"></i>
                          </a>
                          &nbsp;&nbsp;
                         
                          <a href="#" onclick="deleteTasacambio(<?php echo $r->__GET('id_tasaCambio_det'); ?>,<?php echo $r->__GET('id_tasaCambio'); ?>);">
                            <i class="far fa-trash-alt" title="Eliminar Detalle"></i>
                          </a>
                        </td>
                    </tr>
                    <?php
                        endforeach;
                    ?>
                     

                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Id Tasa Cambio detalle</th>
                        <th>Fecha</th>
                        <th>Tipo de Cambio</th>
                        <th>Acciones</th>
                    </tr>
                  </tfoot>
                </table>
                  
                  
                </div>
                
                <!-- /.card-body -->

                
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
<!-- JAlert js -->
<script src="../../plugins/jAlert/dist/jAlert.min.js"></script>
<script src="../../plugins/jAlert/dist/jAlert-functions.min.js"></script>
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
function deleteTasacambio(idTscdet, idTsc){
$.jAlert({
        'type': 'confirm',
        'confirmQuestion': '¿Esta seguro que desea eliminar el registro '+idTscdet+'?',
        'onConfirm': function(e, btn){
          e.preventDefault();
          //do something here
          window.location.href = "../../negocio/ng_tasacambiodet.php?deleteTD="+idTscdet+"&deleteT="+idTsc;
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

</script>
<script>
  function setValores()
  {
    $("#id_tasaCambio").val("<?php echo $Tasa->__GET('id_tasaCambio') ?>")
    $("#id_maestro").val("<?php echo $Tasa->__GET('id_tasaCambio') ?>")
    $("#id_monedaO").val("<?php echo $Tasa->__GET('id_monedaO') ?>")
    $("#id_monedaC").val("<?php echo $Tasa->__GET('id_monedaC') ?>")
    $("#mes").val("<?php echo $Tasa->__GET('mes') ?>")
    $("#anio").val("<?php echo $Tasa->__GET('anio') ?>")
    $("#id_tasaCambio_det").val("<?php echo $edit->__GET('id_tasaCambio_det') ?>")
    $("#fecha").val("<?php echo $edit->__GET('fecha') ?>")
    $("#tipoCambio").val("<?php echo $edit->__GET('tipoCambio') ?>")
  }

  $(document).ready(function () 
  {
    setValores();
    eliminarFila();
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
  });
</script>

<script>
  function EditarDet(id)
  {
    
    window.location.href = window.location.href + "?w1=" + id
    alert(id) 
    alert(<?php echo $id ?>)
    
    //$("#id_tasaCambio_det").val("<?php echo $edit->__GET('id_tasaCambio_det') ?>");
    

    
  }

</script>

<script>
  function insertar(){
    //alert(document.getElementById("txtaccion2").value);
    document.getElementById("txtaccion2").value = "1";
   // alert(document.getElementById("txtaccion2").value);
  }

  function modificar(){
   // alert(document.getElementById("txtaccion2").value);
    document.getElementById("txtaccion2").value = "2";
  //  alert(document.getElementById("txtaccion2").value);
  }
  
</script> 

<script>
function agregarFila(){
      
    var fec =  $('#fecha').val();
    var tas = $('#tipoCambio').val();

      document.getElementById("tabla").insertRow(1).innerHTML = 
      '<td>'+  +'</td>'+
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
</body>
</html>
