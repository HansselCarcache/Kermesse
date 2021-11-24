<?php
include_once('conexion.php');

class Dt_Vw_Rol_Opciones extends Conexion
{
    private $myCon;
    public function listVwRolOpciones()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_rol_opciones;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $vwrolop = new Vw_Rol_Opciones();

                $vwrolop->__SET('id_rol_opciones', $r->id_rol_opciones);
                $vwrolop->__SET('id_rol', $r->id_rol);
                $vwrolop->__SET('rol_descripcion', $r->rol_descripcion);
                $vwrolop->__SET('id_opciones', $r->id_opciones);
                $vwrolop->__SET('opcion_descripcion', $r->opcion_descripcion);
                $result[] = $vwrolop;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    public function regRol_opciones(Vw_Rol_Opciones $rolopc)
    {
        try{
            $this->myCon = parent::conectar();
            $sql =  "INSERT INTO dbkermesse.rol_opciones (tbl_rol_id_rol, tbl_opciones_id_opciones)
                        VALUES (?,?)" ;
            $this->myCon->prepare($sql)->execute(array(
                //$rolopc->__GET('id_rol_opciones'),
                $rolopc->__GET('id_rol'),
                $rolopc->__GET('id_opcion')
            ));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function getRolOpciones($id)
    {
        try{
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.vw_rol_opciones WHERE id_rol_opciones = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $vwrolop = new Vw_Rol_Opciones();

                $vwrolop->__SET('id_rol_opciones', $r->id_rol_opciones);
                $vwrolop->__SET('id_rol', $r->id_rol);
                $vwrolop->__SET('rol_descripcion', $r->rol_descripcion);
                $vwrolop->__SET('id_opciones', $r->id_opciones);
                $vwrolop->__SET('opcion_descripcion', $r->opcion_descripcion);
             
            $this->myCon = parent::desconectar();
            return $vwrolop;

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function editRolOpciones(Vw_Rol_Opciones $ro)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.rol_opciones SET
                            tbl_rol_id_rol = ?,
                            tbl_opciones_id_opciones = ?
                        WHERE id_rol_opciones = ?";

            $this->myCon->prepare($sql)->execute(array(
                    
                    $ro->__GET('id_rol'),
                    $ro->__GET('id_opciones'),
                    $ro->__GET('id_rol_opciones')
                    )
                );
                $this->myCon = parent::desconectar();            
        }catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function deleteRolOpciones($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "DELETE FROM dbkermesse.rol_opciones WHERE id_rol_opciones = ?";
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