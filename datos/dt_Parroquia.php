<?php
include_once('conexion.php');

class Dt_Parroquia extends Conexion
{
    private $myCon;
    public function listParroquia()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_parroquia;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $par = new Parroquia();

                $par->__SET('idParroquia', $r->idParroquia);
                $par->__SET('nombre', $r->nombre);
                $par->__SET('direccion', $r->direccion);
                $par->__SET('telefono', $r->telefono);
                $par->__SET('parroco', $r->parroco);
                $par->__SET('logo', $r->logo);
                $par->__SET('sitio_web', $r->sitio_web);
                $result[] = $par;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function regParroquia(Parroquia $par)
    {
        try{
            $this->myCon = parent::conectar();
            $sql =  "INSERT INTO dbkermesse.tbl_parroquia (nombre, direccion, telefono, parroco, logo, sitio_web)
                        VALUES (?,?,?,?,?,?)" ;
            $this->myCon->prepare($sql)->execute(array(
               // $opc->__GET('id_opciones'),
                $par->__GET('nombre'),
                $par->__GET('direccion'),
                $par->__GET('telefono'),
                $par->__GET('parroco'),
                $par->__GET('logo'),
                $par->__GET('sitio_web')
            ));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
}