<?php 
    require_once('CDCabinet.php');
    require_once('CDMusic.php');

    $produk1 = new CDMusic('Mipan Zuzuzu', 54000, 20, 'Lala', 'Pop');
    $produk2 = new CDCabinet('$produk1->getName()', $produk1->getPrice(), $produk1->getDiscount(), 20, 'Kaset');

    echo "<b>PRODUK</b><br>";
    echo "Nama: " .$produk1->getName(). "<br>";
    echo "Harga: " .$produk1->getPrice(). "<br>";
    echo "Diskon: " .$produk1->getDiscount(). "<br><br>";

    echo "<b>CD MUSIC</b><br>";
    $produk1->setPrice($produk1->getPrice());
    echo "Harga: ".$produk1->getPrice()."<br>";
    $produk1->setDiscount($produk1->getDiscount());
    echo "Diskon: ".$produk1->getDiscount()."% <br>";
    echo "Artis: ".$produk1->getArtist()."<br>";
    echo "Genre: ".$produk1->getGenre()."<br><br>";
    
    echo "<b>CD RACK</b><br>";
    $produk2->setPrice($produk2->getPrice());
    echo "Harga: ".$produk2->getPrice()."<br>";
    echo "Diskon: ".$produk2->getDiscount()."% <br>";
    echo "Kapasitas: ".$produk2->getCapacity()."<br>";
    echo "Model: ".$produk2->getModel()."<br>";
?>