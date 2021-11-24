<?php

class Denominacion
{
        private $idDenominacion;
        private $idMoneda;
        private $valor;
        private $valorLetras;
        private $estado;

        
        public function __GET($k){ return $this->$k; }
        public function __SET($k , $v){ return $this-> $k = $v; }
    }