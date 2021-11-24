<?php

class Usuario_Rol
    {
        private $id_rol_usuario;
        private $id_usuario;
        private $usuario;
        private $nombre_completo;
        private $email;
        private $id_rol;
        private $rol_descripcion;
       
        
        public function __GET($k){ return $this->$k; }
        public function __SET($k , $v){ return $this-> $k = $v; }
    }
