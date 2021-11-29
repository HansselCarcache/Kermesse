<?php

include_once('../entidades/Seguridad/vw_usuario_rol.php');
include_once('../entidades/Seguridad/rol_usuario.php');
include_once('../entidades/Seguridad/usuario.php');
include_once('../datos/dt_vw_Usuario_Rol.php');
include_once('../datos/dt_rol_usuario.php');

$u = new Usuario();
$usr = new Usuario_Rol();
$dtUsr = new Dt_vw_Usuario_Rol();
$ru = new Rol_usuario();
$dtRu = new Dt_Rol_usuario();

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
                $usr->__SET('id_usuario', $_POST['id_usuario']);
                $usr->__SET('id_rol', $_POST['id_rol']);

                $dtUsr->regUsuario_rol($usr);
                $dtUsr->editEstadoUsuario($usr->__GET('id_usuario'));
                header("Location: /Kermesse/pages/Seguridad/tbl_vw_usuario_rol.php?msj=1");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Seguridad/tbl_vw_usuario_rol.php?msj=2");
                die($e->getMessage());
            }
        break;

        case '2':
            try
            {
                $usr->__SET('id_rol_usuario', $_POST['id_rol_usuario']);
                $usr->__SET('id_usuario', $_POST['id_usuario']);
                $usr->__SET('id_rol', $_POST['id_rol']);
                

                $dtUsr->editRolUsuario($usr);
                header("Location: /Kermesse/pages/Seguridad/tbl_vw_usuario_rol.php?msj=3");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Seguridad/tbl_vw_usuario_rol.php?msj=4");
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
        
        $ru->__SET('id_rol_usuario', $_GET['deleteUR']);
        $u->__SET('id_usuario', $_GET['deleteU']);
        $dtUsr->activarUsuario($u->__GET('id_usuario'));
        $dtRu->deleteRolUsuario($ru->__GET('id_rol_usuario'));
       
        //header("Location: /Kermesse/negocio/ng_rol_opciones.php?deleteR=2");
        header("Location: /Kermesse/pages/Seguridad/tbl_vw_usuario_rol.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /Kermesse/pages/Seguridad/tbl_vw_usuario_rol.php?msj=6");
        die($e->getMessage());
    }
}