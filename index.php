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

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../Kermesse/index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      
      <li class="nav-item">
      <a href="../Kermesse/login.php" title="Iniciar sesión"><i class="fas fa-sign-out-alt"></i> Iniciar sesión</a>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../Kermesse/index.php" class="brand-link">
      <img src="../Kermesse/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Gestión Kermesse</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../Kermesse/jeah.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Grupo JEAH</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          
          

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Seguridad
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Kermesse/pages/Seguridad/tbl_opciones.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Opciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Kermesse/pages/Seguridad/tbl_vw_rol_opciones.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Opciones de Rol</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Kermesse/pages/Seguridad/tbl_rol.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Kermesse/pages/Seguridad/tbl_vw_usuario_rol.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles de Usuario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Kermesse/pages/Seguridad/tbl_usuario.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-donate"></i>
                  <p>
                    Kermesse
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="../Kermesse/pages/Kermesse/tbl_Kermesse.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kermesse</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="../Kermesse/pages/Kermesse/tbl_parroquia.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Parroquia</p>
                  </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-funnel-dollar"></i>
                  <p>
                    Gastos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="../Kermesse/pages/Gastos/tbl_categoria_gastos.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categoria de Gastos</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="../Kermesse/pages/Gastos/tbl_gastos.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gastos</p>
                  </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-pizza-slice"></i>
                  <p>
                    Productos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="../Kermesse/pages/Productos/tbl_categoria_producto.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categoria Productos</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="../Kermesse/pages/Productos/tbl_productos.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Productos</p>
                  </a>
                  </li>
                </ul>
              </li>
          
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-handshake"></i>
                  <p>
                    Comunidad
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="../Kermesse/pages/Comunidad/tbl_comunidad.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Comunidades</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Control Bonos</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ingreso comunidad</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ingreso comunidad detalle</p>
                  </a>
                  </li>
                </ul>
              </li>


              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-money-check"></i>
                  <p>
                    Lista de precios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lista Precio</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lista Precio detalle</p>
                  </a>
                  </li>
                </ul>
              </li>


              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-dollar-sign"></i>
                  <p>
                    Control de caja
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Moneda</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Denominación</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="../Kermesse/pages/ControlCaja/tbl_tasacambio.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tasa cambio</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tasa cambio detalle</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Arqueo Caja</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Arqueo Caja detalle</p>
                  </a>
                  </li>
                </ul>
              </li>
         <!--  <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Seguridad
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../pages/Seguridad/tbl_opciones.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Opciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/Seguridad/tbl_vw_rol_opciones.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Opciones de Rol</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/Seguridad/tbl_rol.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/Seguridad/tbl_vw_usuario_rol.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles de Usuario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/Seguridad/tbl_usuario.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
            </ul>
           </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Kermesse
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="../../pages/Kermesse/tbl_kermesse.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kermesse</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="../../pages/Kermesse/tbl_parroquia.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Parroquia</p>
                  </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Gastos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="../../pages/Gastos/tbl_categoria_gastos.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categoria de Gastos</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="../../pages/Gastos/tbl_gastos.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gastos</p>
                  </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Productos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="../../pages/Productos/frm_categoria_producto.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categoria Productos</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="../../pages/Productos/frm_productos.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Productos</p>
                  </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Comunidad
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="../../pages/Comunidad/tbl_comunidad.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Comunidades</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Control Bonos</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ingreso comunidad</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ingreso comunidad detalle</p>
                  </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Lista de precios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lista Precio</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lista Precio detalle</p>
                  </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Control de caja
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Moneda</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Denominación</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="../../pages/ControlCaja/tbl_vw_tasacambio.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tasa cambio</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tasa cambio detalle</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Arqueo Caja</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Arqueo Caja detalle</p>
                  </a>
                  </li>
                </ul> -->
              </li>
            </ul>
          </li>
          <!--<li class="nav-header">EXAMPLES</li>-->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
