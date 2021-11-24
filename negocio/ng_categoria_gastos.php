<?php

include_once('../entidades/Gastos/categoria_gastos.php');
include_once('../datos/dt_categoria_gastos.php');

$ctg = new Categoria_gastos();
$dtctg = new Dt_CategoriaGastos();

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
                $ctg->__SET('nombre_categoria', $_POST['nombre_categoria']);
                $ctg->__SET('descripcion', $_POST['descripcion']);
                $ctg->__SET('estado', $_POST['estado']);

                $dtctg->regCategoriaG($ctg);
                header("Location: /Kermesse/pages/Gastos/tbl_categoria_gastos.php?msj=1");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Gastos/tbl_categoria_gastos.php?msj=2");
                die($e->getMessage());
            }
        break;

        default:
            #code...
            break;
    }
}