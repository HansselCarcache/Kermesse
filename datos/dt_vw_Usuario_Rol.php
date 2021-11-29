<?php
include_once('conexion.php');

class Dt_vw_Usuario_Rol extends Conexion
{
    private $myCon;
    public function listUsuarioRol()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_usuario_rol;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $usr = new Usuario_Rol();

                $usr->__SET('id_rol_usuario', $r->id_rol_usuario);
                $usr->__SET('id_usuario', $r->id_usuario);
                $usr->__SET('usuario', $r->usuario);
                $usr->__SET('nombre_completo', $r->nombre_completo);
                $usr->__SET('email', $r->email);
                $usr->__SET('id_rol', $r->id_rol);
                $usr->__SET('rol_descripcion', $r->rol_descripcion);
                $result[] = $usr;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function regUsuario_rol(Usuario_Rol $usrol)
    {
        try{
            $this->myCon = parent::conectar();
            $sql =  "INSERT INTO dbkermesse.rol_usuario (tbl_usuario_id_usuario, tbl_rol_id_rol)
                        VALUES (?,?)" ;
            $this->myCon->prepare($sql)->execute(array(
                //$rolopc->__GET('id_rol_opciones'),
                $usrol->__GET('id_usuario'),
                $usrol->__GET('id_rol')
            ));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function editEstadoUsuario($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_usuario SET
                            estado = 4
                        WHERE id_usuario = ?";
            $stm = $this->myCon->prepare($sql);
            $stm->execute(array($id));
            $this->myCon = parent::desconectar();
                          
        }catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function activarUsuario($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_usuario SET
                            estado = 2
                        WHERE id_usuario = ?";
            $stm = $this->myCon->prepare($sql);
            $stm->execute(array($id));
            $this->myCon = parent::desconectar();
                          
        }catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function getRolUsuario($id)
    {
        try{
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.vw_usuario_rol WHERE id_rol_usuario = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $vwrolus = new Usuario_Rol();

                $vwrolus->__SET('id_rol_usuario', $r->id_rol_usuario);
                $vwrolus->__SET('id_usuario', $r->id_usuario);
                $vwrolus->__SET('usuario', $r->usuario);
                $vwrolus->__SET('nombre_completo', $r->nombre_completo);
                $vwrolus->__SET('email', $r->email);
                $vwrolus->__SET('id_rol', $r->id_rol);
                $vwrolus->__SET('rol_descripcion', $r->rol_descripcion);
             
            $this->myCon = parent::desconectar();
            return $vwrolus;

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function editRolUsuario(Usuario_Rol $ur)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.rol_usuario SET
                            tbl_usuario_id_usuario = ?,
                            tbl_rol_id_rol = ?
                        WHERE id_rol_usuario = ?";

            $this->myCon->prepare($sql)->execute(array(
                    
                    $ur->__GET('id_usuario'),
                    $ur->__GET('id_rol'),
                    $ur->__GET('id_rol_usuario')
                    )
                );
                $this->myCon = parent::desconectar();            
        }catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

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