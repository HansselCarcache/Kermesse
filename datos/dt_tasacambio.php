<?php
include_once('conexion.php');

class Dt_TasaCambio extends Conexion
{
    private $myCon;
    
    public function listTasaCambio()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_tasacambio;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $tsc = new TasaCambio();

                $tsc->__SET('id_tasaCambio', $r->id_tasaCambio);
                $tsc->__SET('id_monedaO', $r->id_monedaO);
                $tsc->__SET('id_monedaC', $r->id_monedaC);
                $tsc->__SET('mes', $r->mes);
                $tsc->__SET('anio', $r->anio);
                $tsc->__SET('estado', $r->estado);

                $result[] = $tsc;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function listTasaCambioM()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_tasacambiom WHERE estado <>3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $tsc = new vw_TasaCambioM();

                $tsc->__SET('id_tasaCambio', $r->id_tasaCambio);
                $tsc->__SET('id_monedaO', $r->id_monedaO);
                $tsc->__SET('nombreO', $r->nombreO);
                $tsc->__SET('simboloO', $r->simboloO);
                $tsc->__SET('id_monedaC', $r->id_monedaC);
                $tsc->__SET('nombreC', $r->nombreC);
                $tsc->__SET('simboloC', $r->simboloC);
                $tsc->__SET('mes', $r->mes);
                $tsc->__SET('anio', $r->anio);
                $tsc->__SET('estado', $r->estado);
                $tsc->__SET('cantidad', $r->cantidad);

                $result[] = $tsc;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function regTasaCambio(tasacambio $tsc)
    {
        try{
            $this->myCon = parent::conectar();
            $sql =  "INSERT INTO dbkermesse.tbl_tasacambio (idTasaCambio, idMonedaO, idMonedaC, mes, anio, estado )
                        VALUES (?,?,?,?,?,?,)" ;

            $this->myCon->prepare($sql)->execute(array(
                $tsc->__GET('idTasaCambio'),
                $tsc->__GET('idMonedaO'),
                $tsc->__GET('idMonedaC'),
                $tsc->__GET('mes'),
                $tsc->__GET('anio'),
                $tsc->__GET('estado'),
            ));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function getTasaCambiodet($id)
    {
        try{
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tasacambio_det WHERE id_tasaCambio = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $tscdet = new TasaCambioDet();

            $tscdet->__SET('id_tasaCambio_det', $r->id_tasaCambio_det);   
                
                
                
                
            $this->myCon = parent::desconectar();
            return $tscdet;

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    
    
}