<?php 
function connection() {
//koneksi ke database
$dbServer = 'localhost'; //server/ nama host
$dbUser = 'root'; //user
$dbPass = ''; //pass
$dbName = 'classicmodels'; //nama database
$conn = mysqli_connect($dbServer, $dbUser, $dbPass);

//cek koneksi
if (! $conn) {
    die('Koneksi gagal: ' . mysqli_error($conn));
}

//memilih database yang dipakai
mysqli_select_db($conn, $dbName);

return $conn;

}
?>