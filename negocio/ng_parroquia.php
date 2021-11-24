<?php

include_once('../entidades/Kermesse/parroquia.php');
include_once('../datos/dt_Parroquia.php');

$pa = new Parroquia();
$dtpar = new Dt_Parroquia();

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
                $pa->__SET('nombre', $_POST['nombre']);
                $pa->__SET('direccion', $_POST['direccion']);
                $pa->__SET('telefono', $_POST['telefono']);
                $pa->__SET('parroco', $_POST['parroco']);
                $pa->__SET('logo', $_POST['logo']);
                $pa->__SET('sitio_web', $_POST['sitio_web']);

                $dtpar->regParroquia($pa);
                header("Location: /Kermesse/pages/Kermesse/tbl_parroquia.php?msj=1");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Kermesse/tbl_parroquia.php?msj=2");
                die($e->getMessage());
            }
        break;

        default:
            #code...
            break;
    }
}