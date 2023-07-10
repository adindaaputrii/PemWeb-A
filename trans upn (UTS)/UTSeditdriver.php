<?php
include ('UTSkoneksi.php');
  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_driver'])) {
          //query SQL
            $id_driver_upd = $_GET['id_driver'];
            $query = "SELECT * FROM driver WHERE id_driver = '$id_driver_upd'";

          //eksekusi query
            $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_driver = $_POST['id_driver'];
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];
      //query SQL
        $sql = "UPDATE Driver SET nama='$nama', no_sim='$no_sim', alamat='$alamat' WHERE id_driver='$id_driver'";

      //eksekusi query
        $result = mysqli_query(connection(),$sql);
        if ($result) {
            $status = 'ok';
        }
        else{
            $status = 'error';
        }

      //redirect ke halaman lain
        header('Location: UTStabel.php?status='.$status);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Data</title>
</head>
<body>
    <tr>
        <td colspan="3">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <?php 
            if ($status=='ok') {
            echo '<br><br><div class="alert alert-success" role="alert">Data Products berhasil diupdate</div>';
            }
            elseif($status=='err'){
            echo '<br><br><div class="alert alert-danger" role="alert">Data Products gagal diupdate</div>';
            }
            ?>
        </td>
    </tr>
        <table>
            <h2>Edit/Update Data Driver</h2>
            <form action="UTSeditdriver.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
                <tr>
                    <td>ID DRIVER</td>
                    <td><input type="text" class="form-control" placeholder="id_driver" name="id_driver" value="<?php echo $data['id_driver']; ?>" required="required" readonly></td>
                </tr>
                <tr>
                    <td>NAMA</td>
                    <td><input type="text" class="form-control" placeholder="nama" name="nama" value="<?php echo $data['nama']; ?>" required="required"></td>
                </tr>
                <tr>
                    <td>NOMOR SIM</td>
                    <td><input type="text" class="form-control" placeholder="no_sim" name="no_sim" value="<?php echo $data['no_sim']; ?>" required="required" ></td>
                </tr>
                <tr>
                    <td>ALAMAT</td>
                    <td><input type="text" class="form-control" placeholder="alamat" name="alamat" value="<?php echo $data['alamat']; ?>" required="required"></td>
                </tr>
            <?php endwhile; ?>            
            </main>
        </table>
        <button type="submit" class="btn btn-primary">Update</button>
            </form>    
</body>
</html>