<?php 
  include ('UTSkoneksi.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];
      //query SQL
      $query = "INSERT INTO trans_upn (id_trans_upn, id_kondektur, id_bus, id_driver, jumlah_km, tanggal) VALUES('$id_trans_upn', '$id_kondektur, '$id_bus', '$id_driver', '$jumlah_km', '$tanggal')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
        if ($result) {
            $status = 'ok';
        }else{
            $status = 'err';
        }
      //redirect ke halaman lain
    header('Location: UTStabel.php?status='.$status); 
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Trans UPN</title>
</head>
<body>
    <tr >
        <td colspan="3">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <?php 
            if ($status=='ok') {
            echo '<br><br><div class="alert alert-success" role="alert">Data berhasil disimpan</div>';
            }
            elseif($status=='err'){
            echo '<br><br><div class="alert alert-danger" role="alert">Data gagal disimpan</div>';
            }
            ?>
        </td>
    </tr>
    <table>
        <h2>Tambah Data Trans UPN</h2>
        <form action="UTSaddtrans.php" method="POST">
        <tr>
            <td>ID TRANS UPN</td>
            <td><input type="text" class="form-control" placeholder="id_trans_upn" name="id_trans_upn" required="required"></td>
        </tr>
        <tr>
            <td>ID KONDEKTUR</td>
            <td><input type="text" class="form-control" placeholder="id_kondektur" name="id_kondektur" required="required"></td>
        </tr>
        <tr>
            <td>ID BUS</td>
            <td><input type="text" class="form-control" placeholder="id_bus" name="id_bus" required="required"></td>
        </tr>
        <tr>
            <td>ID DRIVER</td>
            <td><input type="text" class="form-control" placeholder="id_driver" name="id_driver" required="required"></td>
        </tr>
        <tr>
            <td>JUMLAH KM</td>
            <td><input type="text" class="form-control" placeholder="jumlah_km" name="jumlah_km" required="required"></td>
        </tr>
        <tr>
            <td>TANGGAL</td>
            <td><input type="text" class="form-control" placeholder="tanggal" name="tanggal" required="required"></td>
        </tr>

            </main>
    </table>
        <button type="submit" class="btn btn-primary">Simpan</button> 
        </form>
</body>
</html>