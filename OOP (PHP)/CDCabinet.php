<?php

    require_once('product.php');
    class CDCabinet extends Product{
        private $capacity, $model;

        function __construct ($nama, $harga = 0, $diskon = 0, $kapasitas, $model){
            parent::__construct($nama, $harga, $diskon);
            $this->capacity = $kapasitas;
            $this->model = $model;
        }

        public function setPrice($harga){
            parent::setPrice($harga + (0.15 * $harga));
        }

        public function getCapacity(){
            return $this->capacity;
        }

        public function setCapacity(){
            $this->capacity = $kapasitas;
        }

        public function getModel(){
            return $this->model;
        }

        public function setModel(){
            $this->model = $model;
        }
    }
?>