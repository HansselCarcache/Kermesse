<?php

include_once('../entidades/Comunidades/comunidad.php');
include_once('../datos/dt_comunidad.php');

$com = new Comunidad();
$dtcmn = new Dt_Comunidad();

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
               
                $com->__SET('nombre', $_POST['nombre']);
                $com->__SET('responsable', $_POST['responsable']);
                $com->__SET('desc_contribucion', $_POST['desc_contribucion']);
                $com->__SET('estado', $_POST['estado']);
                $dtcmn->regComunidad($com);
                header("Location: /Kermesse/pages/Comunidad/tbl_comunidad.php?msj=1");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Comunidad/tbl_comunidad.php?msj=2");
                die($e->getMessage());
            }
        break;

        default:
            #code...
            break;
    }
}