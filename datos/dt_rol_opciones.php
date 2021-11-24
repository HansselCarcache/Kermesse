<?php
include_once('conexion.php');

class Dt_Rol_Opciones extends Conexion
{
    private $myCon;
public function deleteRolOpciones($idR)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "DELETE FROM dbkermesse.rol_opciones WHERE id_rol_opciones = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idR));
            $this->myCon = parent::desconectar();
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
        
    }
}