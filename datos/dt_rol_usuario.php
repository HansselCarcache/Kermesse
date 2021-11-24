<?php
include_once('conexion.php');

class Dt_Rol_usuario extends Conexion
{
    public function deleteRolUsuario($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "DELETE FROM dbkermesse.rol_usuario WHERE id_rol_usuario = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));
            $this->myCon = parent::desconectar();
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
        
    }
}