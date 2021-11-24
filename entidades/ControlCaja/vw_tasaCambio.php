<?php

class vw_TasaCambio
{
        private $id_tasaCambio;
        private $id_monedaO;
        private $moneda1;
        private $simbolo1;
        private $id_monedaC;
        private $moneda2;
        private $simbolo2;
        private $mes;
        private $anio;
        private $id_tasaCambio_det;
        private $fecha;
        private $tipoCambio;

        
        public function __GET($k){ return $this->$k; }
        public function __SET($k , $v){ return $this-> $k = $v; }
    }