<?php

class Arqueo
{
        private $idArqueo;
        private $idKermesse;
        private $fechaArqueo;
        private $granTotal;
        private $usuarioCreacion;
        private $fechaCreacion;
        private $usuarioModificacion;
        private $fechaModificacion;
        private $usuarioEliminacion;
        private $fechaEliminacion;
        private $estado;


        public function __GET($k){ return $this->$k; }
        public function __SET($k , $v){ return $this-> $k = $v; }
    }