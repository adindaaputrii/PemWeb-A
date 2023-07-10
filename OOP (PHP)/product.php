<?php

    class Product{
        protected $name, $price, $discount;

       function __construct($nama, $harga = 0, $diskon = 0){
            $this->name = $nama;
            $this->price = $harga;
            $this->discount = $diskon;
        }

        public function getPrice(){
            return $this->price;
        }

        public function setPrice($harga){
            $this->price = $harga;
        }

        public function getName(){
            return $this->name;
        }

        public function setName($nama){
            $this->name = $nama;
        }

        public function getDiscount(){
            return $this->discount;
        }

        public function setDiscount($diskon){
            $this->discount = $diskon;
        }
    }

?>