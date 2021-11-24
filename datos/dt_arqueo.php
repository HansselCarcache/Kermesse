<?php
include_once('conexion.php');

class Dt_Arqueo extends Conexion
{
    private $myCon;
    public function listArqueo()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_arqueo;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $arq = new arqueo();

                $arq->__SET('idArqueo', $r->$idArqueo);
                $arq->__SET('idKermesse', $r->$idKermesse);
                $arq->__SET('fechaArqueo', $r->fechaArqueo);
                $arq->__SET('granTotal', $r->granTotal);
                $arq->__SET('usuarioCreacion', $r->usuarioCreacion);
                $arq->__SET('fechaCreacion', $r->fechaCreacion);
                $arq->__SET('usuarioModificacion', $r->usuarioModificacion);
                $arq->__SET('fechaModificacion', $r->fechaModificacion);
                $arq->__SET('usuarioEliminacion', $r->usuarioEliminacion);
                $arq->__SET('fechaEliminacion', $r->fechaEliminacion);
                $arq->__SET('estado', $r->estado);

                $result[] = $arq;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function regArqueo(arqueo $arq)
    {
        try{
            $this->myCon = parent::conectar();
            $sql =  "INSERT INTO dbkermesse.tbl_arqueocaja (idArqueo, idKermesse, fechaArqueo, granTotal, usuarioCreacion, fechaCreacion,
            usuarioModificacion, fechaModificacion, usuarioEliminacion, fechaEliminacion, estado )
                        VALUES (?,?,?,?,?,?,?,?,?,?,?)" ;

            $this->myCon->prepare($sql)->execute(array(
                $arq->__GET('idArqueo'),
                $arq->__GET('idKermesse'),
                $arq->__GET('fechaArqueo'),
                $arq->__GET('granTotal'),
                $arq->__GET('usuarioCreacion'),
                $arq->__GET('fechaCreacion'),
                $arq->__GET('usuarioModificacion'),
                $arq->__GET('fechaModificacion'),
                $arq->__GET('usuarioEliminacion'),
                $arq->__GET('fechaEliminacion'),
                $arq->__GET('estado'),
                /* $arq->__GET('usuario_modificacion'),
                $arq->__GET('fecha_modificacion'),
                $arq->__GET('usuario_eliminacion'),
                $arq->__GET('fecha_eliminacion') */
            ));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
}