<?php
include_once('conexion.php');

class Dt_vw_TasaCambio extends Conexion
{
    private $myCon;
    public function listTasaCambio()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_tasacambio;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $tsc = new vw_TasaCambio;

                $tsc->__SET('id_tasaCambio', $r->id_tasaCambio);
                $tsc->__SET('id_monedaO', $r->id_monedaO);
                $tsc->__SET('moneda1', $r->moneda1);
                $tsc->__SET('simbolo1', $r->simbolo1);
                $tsc->__SET('id_monedaC', $r->id_monedaC);
                $tsc->__SET('moneda2', $r->moneda2);
                $tsc->__SET('simbolo2', $r->simbolo2);
                $tsc->__SET('mes', $r->mes);
                $tsc->__SET('anio', $r->anio);
                $tsc->__SET('id_tasaCambio_det', $r->id_tasaCambio_det);
                $tsc->__SET('fecha', $r->fecha);
                $tsc->__SET('tipoCambio', $r->tipoCambio);

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

    public function listTasadetalle()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tasacambio_det;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $tsc = new TasaCambioDet;
                $tsc->__SET('id_tasaCambio_det', $r->id_tasaCambio_det);
                $tsc->__SET('id_tasaCambio', $r->id_tasaCambio);
                $tsc->__SET('fecha', $r->fecha);
                $tsc->__SET('tipoCambio', $r->tipoCambio);
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

    public function listTasaCambiodet($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tasacambio_det WHERE id_tasaCambio = ?;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $tsc = new TasaCambioDet;

                $tsc->__SET('id_tasaCambio_det', $r->id_tasaCambio_det);
                $tsc->__SET('id_tasaCambio', $r->id_tasaCambio);
                $tsc->__SET('fecha', $r->fecha);
                $tsc->__SET('tipoCambio', $r->tipoCambio);
               

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

    public function regTasaCambio(TasaCambio $tsc)
    {
        try{
            $this->myCon = parent::conectar();
            $sql =  "INSERT INTO dbkermesse.tbl_tasacambio (id_monedaO, id_monedaC, mes, anio, estado )
                        VALUES (?,?,?,?,1)" ;

            $this->myCon->prepare($sql)->execute(array(
                
                $tsc->__GET('id_monedaO'),
                $tsc->__GET('id_monedaC'),
                $tsc->__GET('mes'),
                $tsc->__GET('anio')
               
            ));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function regTasaCambiodet(TasaCambioDet $tsc)
    {
        try{
            $this->myCon = parent::conectar();
            $sql =  "INSERT INTO dbkermesse.tasacambio_det ( id_tasaCambio, fecha, tipoCambio )
                        VALUES (?,?,?)" ;

            $this->myCon->prepare($sql)->execute(array(
                
                $tsc->__GET('id_tasaCambio'),
                $tsc->__GET('fecha'),
                $tsc->__GET('tipoCambio')
               
            ));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function getTasaCambio($id)
    {
        try{
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.vw_tasacambio WHERE id_tasaCambio = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $vwTsc = new vw_TasaCambio();

                $vwTsc->__SET('id_tasaCambio', $r->id_tasaCambio);
                 $vwTsc->__SET('id_monedaO', $r->id_monedaO);
                 $vwTsc->__SET('simbolo1', $r->simbolo1);
                
                $vwTsc->__SET('id_monedaC', $r->id_monedaC);
                
                $vwTsc->__SET('mes', $r->mes);
                $vwTsc->__SET('anio', $r->anio);
                $vwTsc->__SET('id_tasaCambio_det', $r->id_tasaCambio_det);
                $vwTsc->__SET('moneda1', $r->moneda1);
                $vwTsc->__SET('simbolo1', $r->simbolo1);
                $vwTsc->__SET('moneda2', $r->moneda2);
                $vwTsc->__SET('simbolo2', $r->simbolo2);
                $vwTsc->__SET('fecha', $r->fecha);
                $vwTsc->__SET('tipoCambio', $r->tipoCambio); 
             
            $this->myCon = parent::desconectar();
            return $vwTsc;

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
            $querySQL = "SELECT * FROM dbkermesse.tasacambio_det WHERE id_tasaCambio_det = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $tscdet = new TasaCambioDet();

            $tscdet->__SET('id_tasaCambio_det', $r->id_tasaCambio_det);    
            $tscdet->__SET('id_tasaCambio', $r->id_tasaCambio);
            $tscdet->__SET('fecha', $r->fecha);
            $tscdet->__SET('tipoCambio', $r->tipoCambio);
                
                
                
                
            $this->myCon = parent::desconectar();
            return $tscdet;

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function editTasacambio(TasaCambio $tsc)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_tasacambio SET
                            id_monedaO = ?,
                            id_monedaC = ?,
                            mes = ?,
                            anio = ?,
                            estado = 2
                        WHERE id_tasaCambio = ?";

            $this->myCon->prepare($sql)->execute(array(
                    
                    $tsc->__GET('id_monedaO'),
                    $tsc->__GET('id_monedaC'),
                    $tsc->__GET('mes'),
                    $tsc->__GET('anio'),
                    $tsc->__GET('id_tasaCambio')
                    )
                );    
                $this->myCon = parent::desconectar();            
        }catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function editTasacambiodet(TasaCambioDet $tscdet){
        try
        {
        $this->myCon = parent::conectar();
        $sql2 = "UPDATE dbkermesse.tasacambio_det SET
                            fecha = ?,
                            tipoCambio = ?
                        WHERE id_tasaCambio_det = ?";

            $this->myCon->prepare($sql2)->execute(array(
                    
                    $tscdet->__GET('fecha'),
                    $tscdet->__GET('tipoCambio'),
                    $tscdet->__GET('id_tasaCambio_det')
                    )
                );    
                $this->myCon = parent::desconectar();            
        }catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function eliminarTasaCambio(TasaCambio $tsc)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_tasacambio SET
                            estado = 3
                        WHERE id_tasaCambio = ?";

            $this->myCon->prepare($sql)->execute(array(
                    $tsc->__GET('id_tasaCambio')
                    )
                );
            
               
                $this->myCon = parent::desconectar();            
        }catch(Exception $e)
        {
            die($e->getMessage());
        } 
    }

    public function eliminarTasaCambiodet($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql2 = "DELETE FROM dbkermesse.tasacambio_det WHERE id_tasaCambio_det = ?";
            $stm = $this->myCon->prepare($sql2);
            $stm->execute(array($id));
            $this->myCon = parent::desconectar();
          
        }catch(Exception $e)
        {
            die($e->getMessage());
        } 
    }

    public function eliminarTasaCambiofull($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql2 = "DELETE FROM dbkermesse.tasacambio_det WHERE id_tasaCambio = ?";
            $stm = $this->myCon->prepare($sql2);
            $stm->execute(array($id));
            $this->myCon = parent::desconectar();
          
        }catch(Exception $e)
        {
            die($e->getMessage());
        } 
    }

}