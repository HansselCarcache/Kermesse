<?php
include_once('conexion.php');

class Dt_Comunidad extends Conexion
{
    private $myCon;
    public function listComunidad()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_comunidad;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $cmn = new Comunidad();

                $cmn->__SET('id_comunidad', $r->id_comunidad);
                $cmn->__SET('nombre', $r->nombre);
                $cmn->__SET('responsable', $r->responsable);
                $cmn->__SET('desc_contribucion', $r->desc_contribucion);
                $cmn->__SET('estado', $r->estado);
                $result[] = $cmn;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function regComunidad(Comunidad $cmn)
    {
        try{
            $this->myCon = parent::conectar();
            $sql =  "INSERT INTO dbkermesse.tbl_comunidad (nombre, responsable, desc_contribucion, estado)
                        VALUES (?,?,?,?)" ;
            $this->myCon->prepare($sql)->execute(array(
                $cmn->__GET('nombre'),
                $cmn->__GET('responsable'),
                $cmn->__GET('desc_contribucion'),
                $cmn->__GET('estado')
            ));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
}