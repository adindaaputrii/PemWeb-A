<?php
    include('conn.php');
    $query = "SELECT * FROM kondektur";
    $result = mysqli_query(connection(),$query);
        if ($result) {
            $status = 'ok';
        } else {
            $status = 'err';
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAJI KONDEKTUR TRANS UPN</title>
</head>
<body>
<div>
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
                <a href="UTSpendapatankondektur.php"><button type="button">Reset</button></a>
            </form>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID Kondektur</th>
                        <th>NAMA</th>
                        <th>Total KM</th>
                        <th>Harga Per KM</th>
                        <th>Total Gaji</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($data = mysqli_fetch_array($result)): ?>
                    <tr>
                        <?php
                        $queryforKM = "SELECT SUM(jumlah_km) AS tot_km FROM trans_upn WHERE id_kondektur = $data[id_kondektur] GROUP BY id_kondektur";
                        $result_jarak = mysqli_query(connection(), $queryforKM);
                        $dataKondektur = mysqli_fetch_assoc($result_jarak);
                        if($dataKondektur === NULL) {
                            $tot_km = 0;
                        } else {
                            $tot_km = $dataKondektur['tot_km'];
                        }
                        $kondektur_salary_perKM = 1500;
                        $kondektur_salary = $tot_km * $kondektur_salary_perKM;
                        ?>
                        <td><?php echo $data['id_kondektur'] ?></td>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $tot_km; ?></td>
                        <td><?php echo $kondektur_salary_perKM; ?></td>
                        <td><?php echo "Rp. ", $kondektur_salary; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>