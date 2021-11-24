<?php
include_once('conexion.php');

class Dt_CategoriaProductos extends Conexion
{
    private $myCon;
    public function listCategoriaProductos()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_producto;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $ctp = new Categoria_producto();

                $ctp->__SET('id_categoria_producto', $r->id_categoria_producto);
                $ctp->__SET('nombre', $r->nombre);
                $ctp->__SET('descripcion', $r->descripcion);
                $ctp->__SET('estado', $r->estado);
                $result[] = $ctp;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    /* public function regComunidad(Comunidad $cmn)
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
    } */
}