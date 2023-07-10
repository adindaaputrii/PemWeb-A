<?php 

//koneksi ke database
$dbServer = 'localhost';      // server/nama host
$dbUser = 'root';             //user
$dbPass = '';                 //pass
$dbName = 'classicmodels';    //nama database

try{
    $conn = new PDO("mysql::host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $err){
    echo "Koneksi ke Database Gagal : " . $err->getMessage();
}
?>