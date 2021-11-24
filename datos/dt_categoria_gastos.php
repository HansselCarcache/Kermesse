<?php
include_once('conexion.php');

class Dt_CategoriaGastos extends Conexion
{
    private $myCon;
    public function listCategoriaGastos()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_gastos;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $ctg = new Categoria_gastos();

                $ctg->__SET('id_categoria_gastos', $r->id_categoria_gastos);
                $ctg->__SET('nombre_categoria', $r->nombre_categoria);
                $ctg->__SET('descripcion', $r->descripcion);
                $ctg->__SET('estado', $r->estado);
                $result[] = $ctg;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function regCategoriaG(Categoria_gastos $ctg)
    {
        try{
            $this->myCon = parent::conectar();
            $sql =  "INSERT INTO dbkermesse.tbl_categoria_gastos (nombre_categoria, descripcion, estado)
                        VALUES (?,?,?)" ;
            $this->myCon->prepare($sql)->execute(array(
               // $opc->__GET('id_opciones'),
                $ctg->__GET('nombre_categoria'),
                $ctg->__GET('descripcion'),
                $ctg->__GET('estado')
            ));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
}