<?php 
  include ('UTSkoneksi.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kondektur = $_POST['id_kondektur'];
    $nama = $_POST['nama'];
      //query SQL
      $query = "INSERT INTO kondektur (id_kondektur, nama) VALUES('$id_kondektur','$nama')"; 

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
    <title>Tambah Data Kondektur</title>
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
        <h2>Tambah Data Kondektur</h2>
        <form action="UTSaddkondektur.php" method="POST">
        <tr>
            <td>ID KONDEKTUR</td>
            <td><input type="text" class="form-control" placeholder="id_kondektur" name="id_kondektur" required="required"></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td><input type="text" class="form-control" placeholder="nama" name="nama" required="required"></td>
        </tr>

            </main>
    </table>
        <button type="submit" class="btn btn-primary">Simpan</button> 
        </form>
</body>
</html>