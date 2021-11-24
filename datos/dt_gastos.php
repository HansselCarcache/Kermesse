<?php
include_once('conexion.php');

class Dt_Gastos extends Conexion
{
    private $myCon;
    public function listGastos()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_gastos;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $ga = new Gastos();

                $ga->__SET('id_registro_gastos', $r->id_registro_gastos);
                $ga->__SET('nombre', $r->nombre);
                $ga->__SET('nombre_categoria', $r->nombre_categoria);
                $ga->__SET('fechaGasto', $r->fechaGasto);
                $ga->__SET('concepto', $r->concepto);
                $ga->__SET('monto', $r->monto);
                $ga->__SET('usuario_creacion', $r->usuario_creacion);
                $ga->__SET('estado', $r->estado);
                $ga->__SET('fecha_creacion', $r->fecha_creacion);
                $ga->__SET('usuario_modificacion', $r->usuario_modificacion);
                $ga->__SET('fecha_modificacion', $r->fecha_modificacion);
                $ga->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $ga->__SET('fecha_eliminacion', $r->fecha_eliminacion);
                $result[] = $ga;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function regGastos(Gastos $ga)
    {
        try{
            $this->myCon = parent::conectar();
            $sql =  "INSERT INTO dbkermesse.tbl_gastos (idKermesse, idCatGastos, fechaGasto, concepto, monto,
            usuario_creacion, fecha_creacion, estado)
                        VALUES (?,?,?,?,?,?,?,?)" ;
            /*$sql =  "INSERT INTO dbkermesse.tbl_kermesse (idParroquia, nombre, fInicio, fFinal, descripcion, estado,
            usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion, usuario_eliminacion, fecha_eliminacion)
                        VALUES (?,?,?,?,?,?,?,?)" ;*/
            $this->myCon->prepare($sql)->execute(array(
               // $opc->__GET('id_opciones'),
                $ga->__GET('idKermesse'),
                $ga->__GET('idCatGastos'),
                $ga->__GET('fechaGasto'),
                $ga->__GET('concepto'),
                $ga->__GET('monto'),
                $ga->__GET('usuario_creacion'),
                $ga->__GET('fecha_creacion'),
                $ga->__GET('estado')
                /* $ker->__GET('usuario_modificacion'),
                $ker->__GET('fecha_modificacion'),
                $ker->__GET('usuario_eliminacion'),
                $ker->__GET('fecha_eliminacion') */
            ));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
}