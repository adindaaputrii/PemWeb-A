<?php
include ('UTSkoneksi.php');
  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_trans_upn'])) {
          //query SQL
            $id_trans_upn_upd = $_GET['id_trans_upn'];
            $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn_upd'";

          //eksekusi query
            $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['$id_kondektur'];
    $id_bus = $_POST['$id_bus'];
    $id_driver = $_POST['$id_driver'];
    $jumlah_km = $_POST['$jumlah_km'];
    $tanggal = $_POST['$tanggal'];
      //query SQL
        $sql = "UPDATE trans_upn SET id_kondektur='$id_kondektur', id_driver='$id_driver', jumlah_km='$jumlah_km', tanggal='$tanggal' WHERE id_trans_upn='$id_trans_upn'";

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
            echo '<br><br><div class="alert alert-success" role="alert">Data berhasil diupdate</div>';
            }
            elseif($status=='err'){
            echo '<br><br><div class="alert alert-danger" role="alert">Data gagal diupdate</div>';
            }
            ?>
        </td>
    </tr>
        <table>
            <h2>Edit/Update Data Trans UPN</h2>
            <form action="UTSedittrans_upn.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
                <tr>
                    <td>ID TRANS UPN</td>
                    <td><input type="text" class="form-control" placeholder="id_trans_upn" name="id_trans_upn" value="<?php echo $data['id_trans_upn']; ?>" required="required" readonly></td>
                </tr>
                <tr>
                    <td>ID KONDEKTUR</td>
                    <td><input type="text" class="form-control" placeholder="id_kondektur" name="id_kondektur" value="<?php echo $data['plat']; ?>" required="required"></td>
                </tr>
                <tr>
                    <td>ID DRIVER</td>
                    <td><input type="text" class="form-control" placeholder="id_driver" name="id_driver" value="<?php echo $data['status']; ?>" required="required" ></td>
                </tr>
                <tr>
                    <td>JUMLAH KM</td>
                    <td><input type="text" class="form-control" placeholder="jumlah_km" name="jumlah_km" value="<?php echo $data['status']; ?>" required="required" ></td>
                </tr>
                <tr>
                    <td>TANGGAL</td>
                    <td><input type="text" class="form-control" placeholder="tanggal" name="tanggal" value="<?php echo $data['status']; ?>" required="required" ></td>
                </tr>
            <?php endwhile; ?>            
            </main>
        </table>
        <button type="submit" class="btn btn-primary">Update</button>
            </form>    
</body>
</html>