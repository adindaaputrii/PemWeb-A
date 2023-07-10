<?php 

    require_once('product.php');
    class CDMusic extends Product{
        private $artist, $genre;

        function __construct($nama, $harga = 0, $diskon = 0, $artis, $genre){
            parent::__construct($nama, $harga, $diskon);
            $this->artist=$artis;
            $this->genre=$genre;
        }

        public function setPrice($harga){
            parent::setPrice($harga + (0.1 * $harga));
        }

        public function setDiscount($diskon){
            parent::setDiscount($diskon + 5);
        }

        public function getArtist(){
            return $this->artist;
        }

        public function setArtist(){
            $this->artist = $artis;
        }

        public function getGenre(){
            return $this->genre;
        }

        public function setGenre(){
            $this->genre = $genre;
        }
    }

?>