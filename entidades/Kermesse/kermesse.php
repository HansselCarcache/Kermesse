<?php

class Kermesse
    {
        private $id_kermesse;
        private $idParroquia;
        private $nombre_parroquia;
        private $direccion;
        private $nombre;
        private $fInicio;
        private $fFinal;
        private $descripcion;
        private $estado;
        private $usuario_creacion;
        private $usuarioC;
        private $fecha_creacion;
        private $usuario_modificacion;
        private $fecha_modificacion;
        private $usuario_eliminacion;
        private $fecha_eliminacion;
        
        public function __GET($k){ return $this->$k; }
        public function __SET($k , $v){ return $this-> $k = $v; }
    }
