<?php

//error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS
include '../../entidades/Productos/productos.php';
include '../../datos/dt_Producto.php';

include '../../entidades/Comunidades/comunidad.php';
include '../../datos/dt_comunidad.php';

include '../../entidades/Productos/categoria_producto.php';
include '../../datos/dt_categoria_producto.php';


$dtpr = new Dt_Producto;
$dtcom = new Dt_Comunidad;
$dtctp = new Dt_CategoriaProductos;

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
            <h1>Registrar productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Seguridad</a></li>
              <li class="breadcrumb-item active">Opciones</li>
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
                <h3 class="card-title">Registrar productos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <form method="POST" action="../../negocio/ng_opciones.php"> -->
                <div class="card-body">
                <div class="form-group">
                    <label>Seleccione la comunidad</label>
                    <input type="hidden" value="1" name="txtaccion" id="txtaccion">
                    <select class="form-control" id="id_comunidad" name="id_comunidad" required>
                    <option value="">Seleccione...</option>
                    <?php
                        foreach($dtcom->listComunidad() as $r):
                    ?>
                    <option value="<?php echo $r->__GET('id_comunidad'); ?>"><?php echo $r->__GET('nombre'); ?></option>
                    <?php
                        endforeach;
                    ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Seleccione la categoría de producto</label>
                    
                    <select class="form-control" id="id_cat_producto" name="id_cat_producto" required>
                    <option value="">Seleccione...</option>
                    <?php
                        foreach($dtctp->listCategoriaProductos() as $r):
                    ?>
                    <option value="<?php echo $r->__GET('id_cat_producto'); ?>"><?php echo $r->__GET('nombre'); ?></option>
                    <?php
                        endforeach;
                    ?>
                    </select>
                  </div>

                <div class="form-group">
                    <label>Nombre producto</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"  maxlength="45" placeholder="Ingrese el nombre del producto" title="Ingrese el nombre del producto" required>
                  </div>

                  <div class="form-group">
                    <label>Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion"  maxlength="100" placeholder="Ingrese una descripcion del producto" title="Ingrese una descripcion del producto" required>
                  </div>

                  <div class="form-group">
                    <label>Cantidad</label>
                    <input type="text" class="form-control" id="cantidad" name="cantidad"   placeholder="Ingrese la cantidad del producto" title="Ingrese la cantidad del producto" required>
                  </div>

                  <div class="form-group">
                    <label>Precio v sugerido</label>
                    <input type="text" class="form-control" id="preciov_sugerido" name="preciov_sugerido"   placeholder="Ingrese el precio sugerido" title="Ingrese el precio sugerido" required>
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
