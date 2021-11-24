<?php
include_once('conexion.php');

class Dt_Producto extends Conexion
{
    private $myCon;
    public function listProducto()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_productos;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $pr = new Producto();

                $pr->__SET('id_producto', $r->id_producto);
                $pr->__SET('nombre_comunidad', $r->nombre_comunidad);
                $pr->__SET('nombre_categoriap', $r->nombre_categoriap);
                $pr->__SET('nombre', $r->nombre); 
                $pr->__SET('descripcion', $r->descripcion);
                $pr->__SET('cantidad', $r->cantidad);
                $pr->__SET('preciov_sugerido', $r->preciov_sugerido);
                $pr->__SET('estado', $r->estado);
                $result[] = $pr;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

   
}