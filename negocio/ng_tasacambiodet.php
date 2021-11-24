<?php

include_once('../entidades/ControlCaja/vw_tasaCambio.php');
include_once('../entidades/ControlCaja/tasacambio.php');
include_once('../entidades/ControlCaja/tasacambiodet.php');
include_once('../datos/dt_vw_tasacambio.php');
include_once('../datos/dt_rol_usuario.php');
include_once('../datos/dt_tasacambio.php');

$vwTsc = new vw_TasaCambio();
$dtvwTsc = new Dt_vw_TasaCambio();
$dtTsc = new Dt_TasaCambio();
$tsc = new TasaCambio();
$tscdet = new TasaCambioDet();

if($_POST)
{
    $varAccion = $_POST['txtaccion2'];
    
    switch($varAccion)
    {

        case '1':
            try
            {
                $idmaster = $_POST['id_maestro'];
                $tscdet->__SET('id_tasaCambio', $idmaster);
                $tscdet->__SET('fecha', $_POST['fecha']);
                $tscdet->__SET('tipoCambio', $_POST['tipoCambio']);
                $dtvwTsc->regTasaCambiodet($tscdet);
                $ids = array();
                

                foreach($dtvwTsc->listTasadetalle() as $r):
                    $id = $r->__GET('id_tasaCambio_det');
                   // echo $id;
                    //echo "<br>";
                    array_push($ids, $id);
                endforeach;
                $idDetalle = end($ids);

                header("Location: /Kermesse/pages/ControlCaja/frm_edit_vw_tasacambio.php?editT=$idmaster&editTD=$idDetalle&msj=1#redirect");
                
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/ControlCaja/frm_edit_vw_tasacambio.php?editT=$idmaster&editTD=$idDetalle&msj=2#redirect");
                die($e->getMessage());
            }
        break;  
        case '2':
            try
            {
                $idmaster = $_POST['id_maestro'];
                $tscdet->__SET('fecha', $_POST['fecha']);
                $tscdet->__SET('tipoCambio', $_POST['tipoCambio']);
                $tscdet->__SET('id_tasaCambio_det', $_POST['id_tasaCambio_det']);
                $idDetalle = $tscdet->__GET('id_tasaCambio_det');
                

                $dtvwTsc->editTasacambiodet($tscdet);
                header("Location: /Kermesse/pages/ControlCaja/frm_edit_vw_tasacambio.php?editT=$idmaster&editTD=$idDetalle&msj=3#redirect");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/ControlCaja/frm_edit_vw_tasacambio.php?editT=$idmaster&editTD=$idDetalle&msj=4#redirect");
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
        $tsc->__SET('id_tasaCambio', $_GET['deleteT']);
        $id_Maestro = $tsc->__GET('id_tasaCambio');
        $tscdet->__SET('id_tasaCambio_det', $_GET['deleteTD']);
        echo $id_Maestro;
        echo $tscdet->__GET('id_tasaCambio_det');
        $ids = array();
        $dtvwTsc->eliminarTasaCambiodet($tscdet->__GET('id_tasaCambio_det'));

        foreach($dtvwTsc->listTasaCambiodet($id_Maestro) as $r):
            $id = $r->__GET('id_tasaCambio_det');
           // echo $id;
            //echo "<br>";
            array_push($ids, $id);
        endforeach;
        $idDetalle = end($ids);
        $empty = empty($ids);
        echo $empty;
       if($empty==1){
            $dtvwTsc->eliminarTasaCambio($tsc);
            header("Location: /Kermesse/pages/ControlCaja/tbl_vw_tasacambio.php?msj=7");
        }else{
            header("Location: /Kermesse/pages/ControlCaja/frm_edit_vw_tasacambio.php?editT=$id_Maestro&editTD=$idDetalle&msj=5#redirect");  
        }

        
        
    }
    catch(Exception $e)
    {
        header("Location: /Kermesse/pages/ControlCaja/tbl_vw_tasacambio.php?msj=6");
        die($e->getMessage());
    }
}