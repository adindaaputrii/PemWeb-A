<?php 
include ('UTSkoneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANS UPN</title>
    <link rel="stylesheet" href="tabel.css">
    <style>
        .aktif {
            background-color: green;
        }

        .cadangan {
            background-color: yellow;
        }

        .rusak {
            background-color: red;
        }
    </style>
</head>
<body>

<p><a href="UTSaddbus.php">TAMBAH DATA BUS</a></p>
<p><a href="UTSadddriver.php">TAMBAH DATA DRIVER</a></p>
<p><a href="UTSaddkondektur.php">TAMBAH DATA KONDEKTUR</a></p>
<p><a href="UTSaddtrans.php">TAMBAH DATA TRANS UPN</a></p>

    <h2>Tabel Trans UPN</h2>
    <table>
        <thead>
            <tr>
                <th>ID TRANS UPN</th>
                <th>ID KONDEKTUR</th>
                <th>ID BUS</th>
                <th>ID DRIVER</th>
                <th>JUMLAH KM</th>
                <th>TANGGAL</th>
                <th>OPSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
        //menampilkan data dari database
            $query = "SELECT * FROM trans_upn";
            $result = mysqli_query(connection(), $query);
            ?>

            <?php while($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $data ['id_trans_upn']; ?></td>
                    <td><?php echo $data ['id_kondektur']; ?></td>
                    <td><?php echo $data ['id_bus']; ?></td>
                    <td><?php echo $data ['id_driver']; ?></td>
                    <td><?php echo $data ['jumlah_km']; ?></td>
                    <td><?php echo $data ['tanggal']; ?></td>
                    <td>
                        <li><a href="<?php echo "UTSedittrans.php?id_trans=".$data['id_trans_upn']; ?>">Edit/Update Data Trans UPN</a></li>
                        <li><a href="<?php echo "UTShapustrans.php?id_trans=".$data['id_trans_upn']; ?>">Hapus Data Trans UPN</a></li>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>

    <br>

    <h2>Tabel Bus</h2>
    <table>
        <thead>
            <tr>
                <th>ID BUS</th>
                <th>PLAT</th>
                <th>STATUS</th>
                <th>OPSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            //menampilkan data dari database
            $query = "SELECT * FROM bus";
            $result = mysqli_query(connection(), $query);
            
            // menentukan class berdasarkan status bus
            while($data = mysqli_fetch_assoc($result)):
                if ($data['status'] == 1){
                    $class = 'aktif';
                }elseif ($data['status'] == 2){
                    $class = 'cadangan';
                }else{
                    $class = 'rusak';
                }
            ?>
                <tr>
                    <td><?php echo $data ['id_bus']; ?></td>
                    <td><?php echo $data ['plat']; ?></td>
                    <td class="<?php echo $class; ?>"><?php echo $data ['status']; ?></td>
                    <td>
                        <li><a href="<?php echo "UTSeditbus.php?id_bus=".$data['id_bus']; ?>">Edit/Update Data Bus</a></li>
                        <li><a href="<?php echo "UTShapusbus.php?id_bus=".$data['id_bus']; ?>">Hapus Data Bus</a></li>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <br>

    <h2>Tabel Driver</h2>
    <table>
        <thead>
            <tr>
                <th>ID DRIVER</th>
                <th>NAMA</th>
                <th>NOMOR SIM</th>
                <th>ALAMAT</th>
                <th>OPSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            //menampilkan data dari database
            $query = "SELECT * FROM driver";
            $result = mysqli_query(connection(), $query);
            ?>

            <?php while($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $data ['id_driver']; ?></td>
                    <td><?php echo $data ['nama']; ?></td>
                    <td><?php echo $data ['no_sim']; ?></td>
                    <td><?php echo $data ['alamat']; ?></td>
                    <td>
                        <li><a href="<?php echo "UTSeditdriver.php?id_driver=".$data['id_driver']; ?>">Edit/Update Data Driver</a></li>
                        <li><a href="<?php echo "UTShapusdriver.php?id_driver=".$data['id_driver']; ?>">Hapus Data Driver</a></li>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>

    <br>
    
    <h2>Tabel Kondektur</h2>
    <table>
        <thead>
            <tr>
                <th>ID KONDEKTUR</th>
                <th>NAMA</th>
                <th>OPSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            //menampilkan data dari database
            $query = "SELECT * FROM kondektur";
            $result = mysqli_query(connection(), $query);
            ?>

            <?php while($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $data ['id_kondektur']; ?></td>
                    <td><?php echo $data ['nama']; ?></td>
                    <td>
                        <li><a href="<?php echo "UTSeditkondektur.php?id_kondektur=".$data['id_kondektur']; ?>">Edit/Update Data Kondektur</a></li>
                        <li><a href="<?php echo "UTShapuskondektur.php?id_kondektur=".$data['id_kondektur']; ?>">Hapus Data Kondektur</a></li>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</body>
</html>