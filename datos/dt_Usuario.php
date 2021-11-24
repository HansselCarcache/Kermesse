<?php
include_once('conexion.php');

class Dt_Usuario extends Conexion
{
    private $myCon;
    public function listUsuario()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_usuario WHERE estado <>3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $us = new Usuario();

                $us->__SET('id_usuario', $r->id_usuario);
                $us->__SET('usuario', $r->usuario);
                $us->__SET('pwd', $r->pwd);
                $us->__SET('nombres', $r->nombres);
                $us->__SET('apellidos', $r->apellidos);
                $us->__SET('email', $r->email);
                $us->__SET('estado', $r->estado);
                $result[] = $us;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    public function regUsuario(Usuario $us)
    {
        try{
            $this->myCon = parent::conectar();
            $sql =  "INSERT INTO dbkermesse.tbl_usuario (usuario, pwd, nombres, apellidos, email, estado)
                        VALUES (?,?,?,?,?,1)" ;
            $this->myCon->prepare($sql)->execute(array(
               // $opc->__GET('id_opciones'),
                $us->__GET('usuario'),
                $us->__GET('pwd'),
                $us->__GET('nombres'),
                $us->__GET('apellidos'),
                $us->__GET('email'),
               
            ));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function getUsuario($id)
    {
        try{
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_usuario WHERE id_usuario = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $us = new Usuario();

            $us->__SET('id_usuario', $r->id_usuario);
            $us->__SET('usuario', $r->usuario);
            $us->__SET('nombres', $r->nombres);
            $us->__SET('apellidos', $r->apellidos);
            $us->__SET('email', $r->email);
            $us->__SET('estado', $r->estado);
             
            $this->myCon = parent::desconectar();
            return $us;

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function editUsuarios(Usuario $us)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_usuario SET
                            usuario = ?,
                            nombres = ?,
                            apellidos = ?,
                            email = ?,
                            estado = 2
                        WHERE id_usuario = ?";

            $this->myCon->prepare($sql)->execute(array(
                    
                    $us->__GET('usuario'),
                    $us->__GET('nombres'),
                    $us->__GET('apellidos'),
                    $us->__GET('email'),
                    $us->__GET('id_usuario')
                    )
                );
                $this->myCon = parent::desconectar();            
        }catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function eliminarUsuario(Usuario $us)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_usuario SET
                            estado = 3
                        WHERE id_usuario = ?";

            $this->myCon->prepare($sql)->execute(array(
                    $us->__GET('id_usuario')
                    )
                );
                $this->myCon = parent::desconectar();            
        }catch(Exception $e)
        {
            die($e->getMessage());
        } 
    }
}