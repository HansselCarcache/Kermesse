<?php

include_once('../entidades/Gastos/gastos.php');
include_once('../datos/dt_gastos.php');

$g = new Gastos();
$dtga = new Dt_Gastos();

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
                $g->__SET('idKermesse', $_POST['idKermesse']);
                $g->__SET('idCatGastos', $_POST['idCatGastos']);
                $g->__SET('fechaGasto', $_POST['fechaGasto']);
                $g->__SET('concepto', $_POST['concepto']);
                $g->__SET('monto', $_POST['monto']);
                $g->__SET('usuario_creacion', $_POST['usuario_creacion']);
                $g->__SET('fecha_creacion', $_POST['fecha_creacion']);
                $g->__SET('estado', $_POST['estado']);
                /* $k->__SET('usuario_modificacion', $_POST['usuario_modificacion']);
                $k->__SET('fecha_modificacion', $_POST['fecha_modificacion']);
                $k->__SET('usuario_eliminacion', $_POST['usuario_eliminacion']);
                $k->__SET('fecha_eliminacion', $_POST['fecha_eliminacion']); */

                $dtga->regGastos($g);
                header("Location: /Kermesse/pages/gastos/tbl_gastos.php?msj=1");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/gastos/tbl_gastos.php?msj=2");
                die($e->getMessage());
            }
        break;

        default:
            #code...
            break;
    }
}