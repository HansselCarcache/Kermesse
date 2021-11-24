<?php

include_once('../entidades/Seguridad/opciones.php');
include_once('../datos/dt_Opciones.php');

$o = new Opciones();
$dtopc = new Dt_Opciones();

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
                $o->__SET('opcion_descripcion', $_POST['opcion_descripcion']);
                $o->__SET('estado', $_POST['estado']);

                $dtopc->regOpciones($o);
                header("Location: /Kermesse/pages/Seguridad/tbl_opciones.php?msj=1");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Seguridad/tbl_opciones.php?msj=2");
                die($e->getMessage());
            }
        break;

        case '2':
            try
            {
                $o->__SET('id_opciones', $_POST['id_opciones']);
                $o->__SET('opcion_descripcion', $_POST['opcion_descripcion']);
                $o->__SET('estado', $_POST['estado']);

                $dtopc->editOpciones($o);
                header("Location: /Kermesse/pages/Seguridad/tbl_opciones.php?msj=3");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Seguridad/tbl_opciones.php?msj=4");
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
        $o->__SET('id_opciones', $_GET['deleteO']);
        $dtopc->eliminarOpcion($o);
        header("Location: /Kermesse/pages/Seguridad/tbl_opciones.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /Kermesse/pages/Seguridad/tbl_opciones.php?msj=6");
        die($e->getMessage());
    }
}