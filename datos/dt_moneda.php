<?php
include_once('conexion.php');

class Dt_Moneda extends Conexion
{
    private $myCon;
    public function listMoneda()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_moneda;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $mon = new Moneda();

                $mon->__SET('id_moneda', $r->id_moneda);
                $mon->__SET('nombre', $r->nombre);
                $mon->__SET('simbolo', $r->simbolo);
                $mon->__SET('estado', $r->estado);

                $result[] = $mon;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function regMoneda(moneda $mon)
    {
        try{
            $this->myCon = parent::conectar();
            $sql =  "INSERT INTO dbkermesse.tbl_moneda (idMoneda, nombre, simbolo, estado)
                        VALUES (?,?,?,?)" ;

            $this->myCon->prepare($sql)->execute(array(
                $mon->__GET('idMoneda'),
                $mon->__GET('nombre'),
                $mon->__GET('simbolo'),
                $mon->__GET('estado'),
            ));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
}