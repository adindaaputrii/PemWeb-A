<?php
include ('UTSkoneksi.php');
  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_kondektur'])) {
          //query SQL
            $id_kondektur_upd = $_GET['id_kondektur'];
            $query = "SELECT * FROM kondektur WHERE id_kondektur = '$id_kondektur_upd'";

          //eksekusi query
            $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kondektur = $_POST['id_kondektur'];
    $nama = $_POST['nama'];
      //query SQL
        $sql = "UPDATE Kondektur SET nama='$nama' WHERE id_kondektur='$id_kondektur'";

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
            <h2>Edit/Update Data Kondektur</h2>
            <form action="UTSeditkondektur.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
                <tr>
                    <td>ID KONDEKTUR</td>
                    <td><input type="text" class="form-control" placeholder="id_kondektur" name="id_kondektur" value="<?php echo $data['id_kondektur']; ?>" required="required" readonly></td>
                </tr>
                <tr>
                    <td>NAMA</td>
                    <td><input type="text" class="form-control" placeholder="nama" name="nama" value="<?php echo $data['nama']; ?>" required="required"></td>
                </tr>
            <?php endwhile; ?>            
            </main>
        </table>
        <button type="submit" class="btn btn-primary">Update</button>
            </form>    
</body>
</html>