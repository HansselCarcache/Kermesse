<?php

include_once('../entidades/Seguridad/usuario.php');
include_once('../datos/dt_Usuario.php');

$us = new Usuario();
$dtus = new Dt_Usuario();

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
                $us->__SET('usuario', $_POST['usuario']);
                $us->__SET('pwd', $_POST['pwd']);
                $us->__SET('nombres', $_POST['nombres']);
                $us->__SET('apellidos', $_POST['apellidos']);
                $us->__SET('email', $_POST['email']);
                $us->__SET('estado', $_POST['estado']);

                $dtus->regUsuario($us);
                header("Location: /Kermesse/pages/Seguridad/tbl_usuario.php?msj=1");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Seguridad/tbl_usuario.php?msj=2");
                die($e->getMessage());
            }
        break;

        case '2':
            try
            {
                $us->__SET('id_usuario', $_POST['id_usuario']);
                $us->__SET('usuario', $_POST['usuario']);
                $us->__SET('nombres', $_POST['nombres']);
                $us->__SET('apellidos', $_POST['apellidos']);
                $us->__SET('email', $_POST['email']);
                $us->__SET('estado', $_POST['estado']);

                $dtus->editUsuarios($us);
                header("Location: /Kermesse/pages/Seguridad/tbl_usuario.php?msj=3");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Seguridad/tbl_usuario.php?msj=4");
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
        $us->__SET('id_usuario', $_GET['deleteU']);
        $dtus->eliminarUsuario($us);
        header("Location: /Kermesse/pages/Seguridad/tbl_usuario.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /Kermesse/pages/Seguridad/tbl_usuario.php?msj=6");
        die($e->getMessage());
    }
}