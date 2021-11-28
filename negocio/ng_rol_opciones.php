<?php

include_once('../entidades/Seguridad/vw_rol_opciones.php');
include_once('../entidades/Seguridad/rol_opciones.php');
include '../entidades/Seguridad/usuario.php';
include '../entidades/Seguridad/rol.php';
include_once('../entidades/Seguridad/opciones.php');

//Importamos datos
include_once '../datos/dt_Rol.php';
include_once('../datos/dt_Opciones.php');
include_once('../datos/dt_vw_Rol_Opciones.php');
include_once('../datos/dt_rol_opciones.php');

//ENTIDADES
$usuario = new Usuario();
$rol = new Rol();
$listOpc = new Opciones();
//DATOS
$dtr = new Dt_Rol();
$dtopc = new Dt_Opciones();
//Entidades que sirven para el crud
$ro = new Vw_Rol_Opciones();
$ropc = new Rol_opciones();
$dtRolop = new Dt_Vw_Rol_Opciones();
$dtrop = new Dt_Rol_Opciones();

//MANEJO Y CONTROL DE LA SESION
session_start(); // INICIAMOS LA SESION

//VALIDAMOS SI LA SESION ESTÁ VACÍA
if (empty($_SESSION['acceso'])) { 
    //nos envía al inicio
    header("Location: ../../login.php?msj=2");
}

$usuario = $_SESSION['acceso']; // OBTENEMOS EL VALOR DE LA SESION
//OBTENEMOS EL ROL
$rol->__SET('id_rol', $dtr->getIdRol($usuario[0]->__GET('usuario')));


//OBTENEMOS LAS OPCIONES DEL ROL
$listOpc = $dtopc->obtenerOpciones($rol->__GET('id_rol'));

//OBTENEMOS LA OPCION ACTUAL
$url = $_SERVER['REQUEST_URI'];
//var_dump($url);
 $inicio= strrpos($url, '/')+1; 
// var_dump($inicio); //6
 $total= strlen($url); 
//var_dump($total); //28
$fin= strripos($url, '?');
 //var_dump($fin); //22
if($fin>0){
    $miPagina = substr($url, $inicio, $fin-$inicio);
     //var_dump($miPagina);
}
else{
    $miPagina = substr($url, $inicio);
     //var_dump($miPagina);
}

////// VALIDAMOS LA OPCIÓN ACTUAL CON LA MATRIZ DE OPCIONES //////
//obtenemos el numero de elementos
$longitud = count($listOpc);
//var_dump($longitud);
$acceso = false; // VARIABLE DE CONTROL

//Recorro todos los elementos de la matriz de opciones
for($i=0; $i<$longitud; $i++)
    {
      //obtengo el valor de cada elemento
      $opcion = $listOpc[$i]->__GET('opcion_descripcion');
      if (strcmp ($miPagina , $opcion) == 0) //COMPARO LA OPCION ACTUAL CON CADA OPCIÓN DE LA MATRIZ
      {
        $acceso = true; //ACCESO CONCEDIDO
        break;
      }
    }

if(!$acceso)
{
    //ACCESO NO CONCEDIDO 
    header("Location: ../401.php"); //REDIRECCIONAMOS A LA PAGINA DE ACCESO RESTRINGIDO
}

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

/* if ($_GET)
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
} */