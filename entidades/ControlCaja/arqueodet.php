<?php

class ArqueoDet
{
        private $idArqueoDet;
        private $idArqueo;
        private $idMoneda;
        private $idDenominación;
        private $cantidad;
        private $subtotal;

        public function __GET($k){ return $this->$k; }
        public function __SET($k , $v){ return $this-> $k = $v; }
    }