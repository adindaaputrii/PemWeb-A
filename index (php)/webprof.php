<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adinda Putri's Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    $nama_first = "Adinda";
    $nama_last = "Putri";
    $tempat_lahir = "Trenggalek";
    $tanggal_lahir = date('Y-m-d', strtotime('2003-06-04')); //deklarasi var tgl lahir
    $email = "adindaputrii333@gmail.com";
    $nomor_telepon = "0878********";
    $pekerjaan = "Pelajar/Mahasiswa";
    $domisili = "Surabaya, Jawa Timur";
    $umur = date_diff(date_create($tanggal_lahir), date_create('today'))->y; //y = nilai tahunnya
?>
    <header>
        <h1>HELLO!</h1>
        <p>Selamat datang di halaman <i>website</i> pribadiku!</p>
    </header>
<main>
    <h2 class="judul">Profil Singkat</h2>
    <hr>
    <p>Seorang mahasiswi Program Studi Informatika asal Surabaya. Berikut ini profil singkat tentangku.</p>
    <div class="profil">
        <img src="foto.jpg" title="Adinda Putri" alt="Adinda Putri">
        <table >
            
            <tr>
                <th>Nama</th>
                <td><?php echo $nama_first . " " . $nama_last; ?></td>
            </tr>

            <tr>
                <th>Umur</th>
                <td><?php echo $umur . " tahun"; ?></td>  
            </tr>

            <tr>
                <th>Email</th>
                <td><?php echo $email; ?></td>
            </tr>

            <tr>
                <th>No. Telp</th>
                <td><?php echo $nomor_telepon; ?></td>
            </tr>

            <tr>
                <th>Pekerjaan</th>
                <td><?php echo $pekerjaan; ?></td>
            </tr>
            <tr>
                <th>Domisili</th>
                <td><?php echo $domisili; ?></td>
            </tr>
        </table>
    </div>
</main>    
</body>
</html>