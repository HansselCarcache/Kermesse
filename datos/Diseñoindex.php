<?php
error_reporting(0);
include '../../entidades/Seguridad/usuario.php';


$usuario = new Usuario();
//MANEJO Y CONTROL DE LA SESION
session_start(); // INICIAMOS LA SESION
//VALIDAMOS SI LA SESION ESTÁ VACÍA
if (empty($_SESSION['acceso'])) { 
  //nos envía al inicio
  header("Location: ../../login.php?msj=2");
}
$usuario = $_SESSION['acceso']; // OBTENEMOS EL VALOR DE LA SESION
?>
<html>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../Kermesse/sistema-kermesse.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
    <li class="nav-item">
    <p style="color:darkslateblue; font-style:italic; font-weight:bold;"><i class="fas fa-user"></i> <?php echo $usuario[0]->__GET('usuario');?> (<?php echo $rol->__GET('rol_descripcion');?>)</p>
    </li>
    &nbsp;&nbsp;
      <li class="nav-item">
      <a href="../Kermesse/login.php" title="Cerrar sesión"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../Kermesse/sistema-kermesse.php" class="brand-link">
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
                  <a href="../Kermesse/pages/ControlCaja/tbl_vw_tasacambio.php" class="nav-link">
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
  </body>
</html>