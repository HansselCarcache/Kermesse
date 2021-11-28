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
    $varAccion = $_POST['txtaccion'];
    
    switch($varAccion)
    {
        case '1':
            try
            {
                //
                //
               // $o->__SET('id_opcion', $_POST['']);
               //INGRESO DE TABLA TASA CAMBIO
             
              /* $tabla = explode("/" , $_POST['detalle']);
              $string = implode("",$tabla);
              $arraymulti = explode("," , $string); */
              
              $arraymulti = explode("," , $_POST['detalle']);
              
              $mitad = sizeof($arraymulti) / 2;
             
               
              
              



                 $tsc->__SET('id_monedaO', $_POST['id_monedaO']);
                $tsc->__SET('id_monedaC', $_POST['id_monedaC']);
                $tsc->__SET('mes', $_POST['mes']);
                $tsc->__SET('anio', $_POST['anio']);
                $ids = array();
                $dtvwTsc->regTasaCambio($tsc);
                
                //OBTENEMOS EL ULTIMO ID INGRESADO EN LA TASA CAMBIO
                foreach($dtTsc->listTasaCambio() as $r):
                    $id = $r->__GET('id_tasaCambio');
                   // echo $id;
                    //echo "<br>";
                    array_push($ids, $id);
                endforeach;
                $idforanea = end($ids);
                //INGRESO DE TABLA TASA CAMBIO DETALLE
                for($i=1;$i<=$mitad;$i++){
                    $fecha= array_shift($arraymulti);
                    $cambio = array_shift($arraymulti);
                    $tscdet->__SET('id_tasaCambio', $idforanea);
                $tscdet->__SET('fecha', $fecha);
                $tscdet->__SET('tipoCambio', $cambio);
                $dtvwTsc->regTasaCambiodet($tscdet);
                   /* echo $cambio;
                    echo "quite 2";
                    echo "<br>";
                    var_dump($arraymulti);
                    echo "<br>";*/
                  }
                
                   
                
                
                header("Location: /Kermesse/pages/ControlCaja/tbl_vw_tasacambio.php?msj=1");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/ControlCaja/tbl_vw_tasacambio.php?msj=2");
                die($e->getMessage());
            }
        break;

        case '2':
            try
            {
                $tsc->__SET('id_monedaO', $_POST['id_monedaO']);
                $tsc->__SET('id_monedaC', $_POST['id_monedaC']);
                $tsc->__SET('mes', $_POST['mes']);
                $tsc->__SET('anio', $_POST['anio']);
                $tsc->__SET('id_tasaCambio', $_POST['id_tasaCambio']);

                

                

                $dtvwTsc->editTasacambio($tsc);
                header("Location: /Kermesse/pages/ControlCaja/tbl_vw_tasacambio.php?msj=3");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/ControlCaja/tbl_vw_tasacambio.php?msj=5");
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
        $dtvwTsc->eliminarTasaCambiofull($tsc->__GET('id_tasaCambio'));
        $dtvwTsc->eliminarTasaCambio($tsc);
        header("Location: /Kermesse/pages/ControlCaja/tbl_vw_tasacambio.php?msj=7");
    }
    catch(Exception $e)
    {
        header("Location: /Kermesse/pages/ControlCaja/tbl_vw_tasacambio.php?msj=6");
        die($e->getMessage());
    }
}