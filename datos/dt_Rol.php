<?php
include_once('conexion.php');

class Dt_Rol extends Conexion
{
    private $myCon;
    public function listRol()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_rol WHERE estado <>3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $rol = new Rol();

                $rol->__SET('id_rol', $r->id_rol);
                $rol->__SET('rol_descripcion', $r->rol_descripcion);
                $rol->__SET('estado', $r->estado);
                $result[] = $rol;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function regRol(Rol $rol)
    {
        try{
            $this->myCon = parent::conectar();
            $sql =  "INSERT INTO dbkermesse.tbl_rol (rol_descripcion, estado)
                        VALUES (?,1)" ;
            $this->myCon->prepare($sql)->execute(array(
               // $opc->__GET('id_opciones'),
                $rol->__GET('rol_descripcion'),
               
            ));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function getRol($id)
    {
        try{
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_rol WHERE id_rol = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $opc = new Rol();

            $opc->__SET('id_rol', $r->id_rol);
            $opc->__SET('rol_descripcion', $r->rol_descripcion);
            $opc->__SET('estado', $r->estado);
             
            $this->myCon = parent::desconectar();
            return $opc;

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function editRol(Rol $rol)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_rol SET
                            rol_descripcion = ?,
                            estado = 2
                        WHERE id_rol = ?";

            $this->myCon->prepare($sql)->execute(array(
                    
                    $rol->__GET('rol_descripcion'),
                    $rol->__GET('id_rol')
                    )
                );
                $this->myCon = parent::desconectar();            
        }catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function eliminarRol(Rol $rol)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_rol SET
                            estado = 3
                        WHERE id_rol = ?";

            $this->myCon->prepare($sql)->execute(array(
                    $rol->__GET('id_rol')
                    )
                );
                $this->myCon = parent::desconectar();            
        }catch(Exception $e)
        {
            die($e->getMessage());
        } 
    }
    public function getIdRol($user)
    {
        try{
            $this->myCon = parent::conectar();
            $result= array();
            $querySQL = "SELECT * FROM dbkermesse.vw_usuario_rol WHERE usuario = :usuario;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->bindParam(':usuario', $user, PDO::PARAM_STR, 40);
            $stm->execute();

            $result = $stm->fetchColumn(5);

            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

}