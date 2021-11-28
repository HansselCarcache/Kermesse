<?php

include_once('../entidades/Seguridad/usuario.php');
include_once('../datos/dt_Usuario.php');

$us = new Usuario();
$dtus = new Dt_Usuario();

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
                $us->__SET('usuario', $_POST['usuario']);
                $us->__SET('pwd', $_POST['pwd']);
                $us->__SET('nombres', $_POST['nombres']);
                $us->__SET('apellidos', $_POST['apellidos']);
                $us->__SET('email', $_POST['email']);
                $us->__SET('estado', $_POST['estado']);

                $dtus->regUsuario($us);
                header("Location: /Kermesse/pages/Seguridad/tbl_usuario.php?msj=1");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Seguridad/tbl_usuario.php?msj=2");
                die($e->getMessage());
            }
        break;

        case '2':
            try
            {
                $us->__SET('id_usuario', $_POST['id_usuario']);
                $us->__SET('usuario', $_POST['usuario']);
                $us->__SET('nombres', $_POST['nombres']);
                $us->__SET('apellidos', $_POST['apellidos']);
                $us->__SET('email', $_POST['email']);
                $us->__SET('estado', $_POST['estado']);

                $dtus->editUsuarios($us);
                header("Location: /Kermesse/pages/Seguridad/tbl_usuario.php?msj=3");
            }
            catch(Exception $e)
            {
                header("Location: /Kermesse/pages/Seguridad/tbl_usuario.php?msj=4");
                die($e->getMessage());
            }
        break;

        case '3':
            try
            {
                $usuario = $_POST["user"];
                $password = $_POST["pwd"];
                if(empty($usuario) and empty($password)){
                    header("Location: /Kermesse/login.php?msj=403");
                }
                else{
                    $us = $dtus->validarUsuario($usuario, $password);
                    if(empty($us)){
                        header("Location: /Kermesse/login.php?msj=401");
                    }
                    else{
                        //Iniciamos la sesion
                        session_start();
                        //Asignamos la sesion
                        $_SESSION['acceso']=$us;
                        //Si la variable de sesión esta correctamente definida
                        if(!isset($_SESSION['acceso'])){
                            //nos envia al inicio´
                            header("Location /Kermesse/login.php?msj=400");
                        }
                        else{
                            //nos envia al inicio
                            header("Location: /Kermesse/sistema-kermesse.php?msj=1");
                        }
                    }
                }
            }
            catch(Exception $e)
            {

            }

        default:
            #code...
            break;
    }
}

if ($_GET)
{
    try
    {
        $us->__SET('id_usuario', $_GET['deleteU']);
        $dtus->eliminarUsuario($us);
        header("Location: /Kermesse/pages/Seguridad/tbl_usuario.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /Kermesse/pages/Seguridad/tbl_usuario.php?msj=6");
        die($e->getMessage());
    }
}