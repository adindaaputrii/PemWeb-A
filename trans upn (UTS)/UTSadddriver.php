<?php 
  include ('UTSkoneksi.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_driver = $_POST['id_driver'];
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];
      //query SQL
      $query = "INSERT INTO driver (id_driver, nama, no_sim, alamat) VALUES('$id_driver','$nama','$no_sim', '$alamat')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
      //redirect ke halaman lain
      header('Location: UTStabel.php?status='.$status); 
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Driver</title>
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
        <h2>Tambah Data Driver</h2>
        <form action="UTSadddriver.php" method="POST">
        <tr>
            <td>ID DRIVER</td>
            <td><input type="text" class="form-control" placeholder="id_driver" name="id_driver" required="required"></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td><input type="text" class="form-control" placeholder="nama" name="nama" required="required"></td>
        </tr>       
        <tr>
            <td>NOMOR SIM</td>
            <td><input type="text" class="form-control" placeholder="no_sim" name="no_sim" required="required"></td>
        </tr>   
        <tr>
            <td>ALAMAT</td>
            <td><input type="text" class="form-control" placeholder="alamat" name="alamat" required="required"></td>
        </tr>
            </main>
    </table>
        <button type="submit" class="btn btn-primary">Simpan</button> 
        </form>
</body>
</html>