<?php
    include('UTSkoneksi.php');
    $query = "SELECT * FROM driver";
    $result = mysqli_query(connection(),$query);
        if ($result) {
            $status = 'okay';
        } else {
            $status = 'error';
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAJI DRIVER TRANS UPN</title>
</head>
<body>
<div>
        <main role="main">
            <h3>Pendapatan Driver</h3>
            <?php  
                if (isset($_GET['bulan'])) {
                    $moon_name = $_GET['bulan'];
                } else {
                    $moon_name = 'Semua';
                }
            ?>
            <h5>Bulan = <?= $moon_name ?></h5>
            <p>Filter</p>
            <form action="" method="get">
                <select name="bulan" id="bulan" required>
                    <option value="">Pilih Bulan</option>
                    <option value="januari">Januari</option>
                    <option value="februari">Februari</option>
                    <option value="maret">Maret</option>
                    <option value="april">April</option>
                    <option value="mei">Mei</option>
                    <option value="juni">Juni</option>
                    <option value="juli">Juli</option>
                    <option value="agustus">Agustus</option>
                    <option value="september">September</option>
                    <option value="oktober">Oktober</option>
                    <option value="november">November</option>
                    <option value="desember">Desember</option>
                </select>
                <button type="submit">Show All</button>
                <a href="pendapatan.php"><button type="button">Reset</button></a>
            </form>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID Driver</th>
                        <th>NAMA</th>
                        <th>TOTAL KM</th>
                        <th>Harga per KM</th>
                        <th>Total Gaji</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($data = mysqli_fetch_array($result)): ?>
                    <tr>
                        <?php
                        $queryforKM = "SELECT SUM(jumlah_km) AS tot_km FROM trans_upn WHERE id_driver = $data[id_driver] GROUP BY id_driver";
                        $result_jarak = mysqli_query(connection(), $queryforKM);
                        $dataDriver = mysqli_fetch_assoc($result_jarak);
                        if($dataDriver === NULL) {
                            $tot_km = 0;
                        } else {
                            $tot_km = $dataDriver['tot_km'];
                        }
                        $driver_salary_perKM = 3000;
                        $driver_salary = $tot_km * $driver_salary_perKM;
                        ?>
                        <td><?php echo $data['id_driver'] ?></td>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $tot_km; ?></td>
                        <td><?php echo $driver_salary_perKM; ?></td>
                        <td><?php echo "Rp. ", $driver_salary; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>