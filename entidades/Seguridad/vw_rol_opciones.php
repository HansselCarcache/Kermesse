<?php

class Vw_Rol_Opciones
    {
        private $id_rol_opciones;
        private $id_rol;
        private $rol_descripcion;
        private $id_opciones;
        private $opcion_descripcion;
        
        public function __GET($k){ return $this->$k; }
        public function __SET($k , $v){ return $this-> $k = $v; }
    }
