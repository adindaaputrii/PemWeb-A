<?php
include ('UTSkoneksi.php');
  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_bus'])) {
          //query SQL
            $id_bus_upd = $_GET['id_bus'];
            $query = "SELECT * FROM bus WHERE id_bus = '$id_bus_upd'";

          //eksekusi query
            $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_bus = $_POST['id_bus'];
    $plat = $_POST['plat'];
    $status = $_POST['status'];
      //query SQL
        $sql = "UPDATE Bus SET plat='$plat', status='$status' WHERE id_bus='$id_bus'";

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
            <h2>Edit/Update Data Bus</h2>
            <form action="UTSeditbus.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
                <tr>
                    <td>ID BUS</td>
                    <td><input type="text" class="form-control" placeholder="id_bus" name="id_bus" value="<?php echo $data['id_bus']; ?>" required="required" readonly></td>
                </tr>
                <tr>
                    <td>PLAT</td>
                    <td><input type="text" class="form-control" placeholder="plat" name="plat" value="<?php echo $data['plat']; ?>" required="required"></td>
                </tr>
                <tr>
                    <td>STATUS</td>
                    <td><input type="text" class="form-control" placeholder="status" name="status" value="<?php echo $data['status']; ?>" required="required" ></td>
                </tr>
            <?php endwhile; ?>            
            </main>
        </table>
        <button type="submit" class="btn btn-primary">Update</button>
            </form>    
</body>
</html>