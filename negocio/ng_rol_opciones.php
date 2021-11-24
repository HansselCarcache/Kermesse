<?php

include_once('../entidades/Seguridad/vw_rol_opciones.php');
include_once('../entidades/Seguridad/rol_opciones.php');
include_once('../datos/dt_vw_Rol_Opciones.php');
include_once('../datos/dt_rol_opciones.php');

$ro = new Vw_Rol_Opciones();
$ropc = new Rol_opciones();
$dtRolop = new Dt_Vw_Rol_Opciones();
$dtrop = new Dt_Rol_Opciones();

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
                $ro->__SET('id_rol', $_POST['id_rol']);
                $ro->__SET('id_opcion', $_POST['id_opcion']);

                $dtRolop->regRol_opciones($ro);
                header("Location: /Kermesse/pages/Seguridad/tbl_vw_rol_opciones.php?msj=1");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Seguridad/tbl_vw_rol_opciones.php?msj=2");
                die($e->getMessage());
            }
        break;

        case '2':
            try
            {
                $ro->__SET('id_rol_opciones', $_POST['id_rol_opciones']);
                $ro->__SET('id_rol', $_POST['id_rol']);
                $ro->__SET('id_opciones', $_POST['id_opciones']);

                $dtRolop->editRolOpciones($ro);
                header("Location: /Kermesse/pages/Seguridad/tbl_vw_rol_opciones.php?msj=3");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Seguridad/tbl_vw_rol_opciones.php?msj=4");
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
        $ro->__SET('id_rol_opciones', $_GET['deleteR']);
        $dtrop->deleteRolOpciones($ro->__GET('id_rol_opciones'));
        //header("Location: /Kermesse/negocio/ng_rol_opciones.php?deleteR=2");
        header("Location: /Kermesse/pages/Seguridad/tbl_vw_rol_opciones.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /Kermesse/pages/Seguridad/tbl_vw_rol_opciones.php?msj=6");
        die($e->getMessage());
    }
}