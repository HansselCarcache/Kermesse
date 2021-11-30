<?php

class vw_TasaCambioM
{
        private $id_tasaCambio;
        private $id_monedaO;
        private $nombreO;
        private $simboloO;
        private $id_monedaC;
        private $nombreC;
        private $simboloC;
        private $mes;
        private $anio;
        private $estado;
        private $cantidad;

        
        public function __GET($k){ return $this->$k; }
        public function __SET($k , $v){ return $this-> $k = $v; }
    }