<?php 
  include ('UTSkoneksi.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_bus = $_POST['id_bus'];
    $plat = $_POST['plat'];
    $status = $_POST['status'];
      //query SQL
      $query = "INSERT INTO bus (id_bus, plat, status) VALUES('$id_bus','$plat','$status')"; 

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
    <title>Tambah Data Bus</title>
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
        <h2>Tambah Data Bus</h2>
        <form action="UTSaddbus.php" method="POST">
        <tr>
            <td>ID BUS</td>
            <td><input type="text" class="form-control" placeholder="id_bus" name="id_bus" required="required"></td>
        </tr>
        <tr>
            <td>PLAT</td>
            <td><input type="text" class="form-control" placeholder="plat" name="plat" required="required"></td>
        </tr>       
        <tr>
            <td>STATUS</td>
            <td><input type="text" class="form-control" placeholder="status" name="status" required="required"></td>
        </tr>

            </main>
    </table>
        <button type="submit" class="btn btn-primary">Simpan</button> 
        </form>
</body>
</html>