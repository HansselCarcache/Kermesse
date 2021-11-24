<?php
include_once('conexion.php');

class Dt_Kermesse extends Conexion
{
    private $myCon;
    public function listKermesse()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_kermesse;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $ker = new Kermesse();

                $ker->__SET('id_kermesse', $r->id_kermesse);
                $ker->__SET('nombre_parroquia', $r->nombre_parroquia);
                $ker->__SET('direccion', $r->direccion);
                $ker->__SET('nombre', $r->nombre);
                $ker->__SET('fInicio', $r->fInicio);
                $ker->__SET('fFinal', $r->fFinal);
                $ker->__SET('descripcion', $r->descripcion);
                $ker->__SET('estado', $r->estado);
                $ker->__SET('usuario_creacion', $r->usuario_creacion);
                $ker->__SET('usuarioC', $r->usuarioC);
                $ker->__SET('fecha_creacion', $r->fecha_creacion);
                $ker->__SET('usuario_modificacion', $r->usuario_modificacion);
                $ker->__SET('fecha_modificacion', $r->fecha_modificacion);
                $ker->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $ker->__SET('fecha_eliminacion', $r->fecha_eliminacion);
                $result[] = $ker;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function regKermesse(Kermesse $ker)
    {
        try{
            $this->myCon = parent::conectar();
            $sql =  "INSERT INTO dbkermesse.tbl_kermesse (idParroquia, nombre, fInicio, fFinal, descripcion, estado,
            usuario_creacion, fecha_creacion)
                        VALUES (?,?,?,?,?,?,?,?)" ;
            /*$sql =  "INSERT INTO dbkermesse.tbl_kermesse (idParroquia, nombre, fInicio, fFinal, descripcion, estado,
            usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion, usuario_eliminacion, fecha_eliminacion)
                        VALUES (?,?,?,?,?,?,?,?)" ;*/
            $this->myCon->prepare($sql)->execute(array(
               // $opc->__GET('id_opciones'),
                $ker->__GET('idParroquia'),
                $ker->__GET('nombre'),
                $ker->__GET('fInicio'),
                $ker->__GET('fFinal'),
                $ker->__GET('descripcion'),
                $ker->__GET('estado'),
                $ker->__GET('usuario_creacion'),
                $ker->__GET('fecha_creacion'),
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