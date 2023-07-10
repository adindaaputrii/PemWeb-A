<?php
include ('UTSkoneksi.php');

if(isset($_POST['filter'])){
    $status_filter = $_POST['status'];
    $query = "SELECT bus.id_bus, bus.plat, bus.status, SUM(trans_upn.jumlah_km) as total_km 
            FROM bus 
            LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus 
            WHERE bus.status = $status_filter 
            GROUP BY bus.id_bus";
} else {
  // Jika form filter status bus belum di-submit
  $query = "SELECT bus.id_bus, bus.plat, bus.status, SUM(trans_upn.jumlah_km) as total_km 
            FROM bus 
            LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus 
            GROUP BY bus.id_bus";
}

$result = mysqli_query(connection(), $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trans Upn</title>
  <style>
    .aktif {
        background-color: green;
    }
    .cadangan {
        background-color: yellow;
    }
    .rusak{
        background-color: red;
    }
  </style>
</head>
<body>

<h2 style="margin: 30px 0 30px 0;">Data Bus</h2>
<!-- menambahkan form filter berdasarkan status -->
<form method="post" style="margin-bottom: 20px;">
    <label for="status">Filter Berdasarkan Status Bus:</label>
    <select name="status" id="status">
        <option value="">Semua</option>
        <option value="1">Aktif</option>
        <option value="2">Cadangan</option>
        <option value="0">Rusak</option>
    </select>
    <button type="submit" name="filter">Filter</button>
</form>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
    <table border="2" width="400px">
      <tr>
        <th>ID BUS</th>
        <th>PLAT</th>
        <th>STATUS</th>
        <th>TOTAL KM</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        while($data = mysqli_fetch_array($result)){
            //menambahkan kelas CSS berdasarkan status bus
            $class = $data['status'] == 1 ? "aktif" : ($data['status'] == 2 ? "cadangan" : "rusak");
        ?>
            <tr class="<?php echo $class; ?>">
                <td align='center'><?php echo $data['id_bus'];  ?></td>
                <td align='center'><?php echo $data['plat'];  ?></td>
                <td align='center'><?php echo $data['status'];  ?></td>
                <td align='center'><?php echo $data['total_km'];  ?></td>
            </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>