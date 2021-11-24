<?php

include_once('../entidades/Kermesse/kermesse.php');
include_once('../datos/dt_Kermesse.php');

$k = new Kermesse();
$dtker = new Dt_Kermesse();

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
                $k->__SET('idParroquia', $_POST['idParroquia']);
                $k->__SET('nombre', $_POST['nombre']);
                $k->__SET('fInicio', $_POST['fInicio']);
                $k->__SET('fFinal', $_POST['fFinal']);
                $k->__SET('descripcion', $_POST['descripcion']);
                $k->__SET('estado', $_POST['estado']);
                $k->__SET('usuario_creacion', $_POST['usuario_creacion']);
                $k->__SET('fecha_creacion', $_POST['fecha_creacion']);
                /* $k->__SET('usuario_modificacion', $_POST['usuario_modificacion']);
                $k->__SET('fecha_modificacion', $_POST['fecha_modificacion']);
                $k->__SET('usuario_eliminacion', $_POST['usuario_eliminacion']);
                $k->__SET('fecha_eliminacion', $_POST['fecha_eliminacion']); */

                $dtker->regKermesse($k);
                header("Location: /Kermesse/pages/Kermesse/tbl_kermesse.php?msj=1");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Kermesse/tbl_kermesse.php?msj=2");
                die($e->getMessage());
            }
        break;

        default:
            #code...
            break;
    }
}