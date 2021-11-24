<?php

include_once('../entidades/Seguridad/rol.php');
include_once('../datos/dt_Rol.php');

$r = new Rol();
$dtr = new Dt_Rol();

if($_POST)
{
    $varAccion = $_POST['txtaccion'];
    
    switch($varAccion)
    {
        case '1':
            try
            {
                //
                //
               // $o->__SET('id_opcion', $_POST['']);
                $r->__SET('rol_descripcion', $_POST['rol_descripcion']);
                $r->__SET('estado', $_POST['estado']);

                $dtr->regRol($r);
                header("Location: /Kermesse/pages/Seguridad/tbl_rol.php?msj=1");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Seguridad/tbl_rol.php?msj=2");
                die($e->getMessage());
            }
        break;

        case '2':
            try
            {
                $r->__SET('id_rol', $_POST['id_rol']);
                $r->__SET('rol_descripcion', $_POST['rol_descripcion']);
                $r->__SET('estado', $_POST['estado']);

                $dtr->editRol($r);
                header("Location: /Kermesse/pages/Seguridad/tbl_rol.php?msj=3");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Seguridad/tbl_rol.php?msj=4");
                die($e->getMessage());
            }
        break;

        default:
            #code...
            break;
    }
}

if ($_GET)
{
    try
    {
        $r->__SET('id_rol', $_GET['deleteR']);
        $dtr->eliminarRol($r);
        header("Location: /Kermesse/pages/Seguridad/tbl_rol.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /Kermesse/pages/Seguridad/tbl_rol.php?msj=6");
        die($e->getMessage());
    }
}