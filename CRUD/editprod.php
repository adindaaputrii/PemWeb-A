<?php
include ('koneksi.php');
  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['productCode'])) {
          //query SQL
          $productCode_upd = $_GET['productCode'];
          $query = "SELECT * FROM products WHERE productCode = '$productCode_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $productLine = $_POST['productLine'];
    $productScale = $_POST['productScale'];
    $productVendor = $_POST['productVendor'];
    $productDescription = $_POST['productDescription'];
    $quantityInStock = $_POST['quantityInStock'];
    $buyPrice = $_POST['buyPrice'];
    $MSRP = $_POST['MSRP'];
      //query SQL
      $sql = "UPDATE Products SET productName='$productName', productLine='$productLine', productScale='$productScale', productVendor='$productVendor', productDescription='$productDescription', quantityInStock='$quantityInStock', buyPrice='$buyPrice', MSRP='$MSRP' WHERE productCode='$productCode'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'error';
      }

      //redirect ke halaman lain
      header('Location: customers&products.php?status='.$status);
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
            <h2>Edit Data Products</h2>
            <form action="editprod.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
                <tr>
                    <td>Products Number</td>
                    <td><input type="text" class="form-control" placeholder="productCode" name="productCode" value="<?php echo $data['productCode']; ?>" required="required" readonly></td>
                </tr>
                <tr>
                    <td>Products Name</td>
                    <td><input type="text" class="form-control" placeholder="productName" name="productName" value="<?php echo $data['productName']; ?>" required="required"></td>
                </tr>
                <tr>
                    <td>Contact Last Name</td>
                    <td><input type="text" class="form-control" placeholder="productLine" name="productLine" value="<?php echo $data['productLine']; ?>" required="required" ></td>
                </tr>
                <tr>
                    <td>Contact First Name</td>
                    <td><input type="text" class="form-control" placeholder="productScale" name="productScale" value="<?php echo $data['productScale']; ?>" required="required"></td>
                </tr>
                <tr>
                    <td>productVendor</td>
                    <td><input type="text" class="form-control" placeholder="productVendor" name="productVendor" value="<?php echo $data['productVendor']; ?>" required="required"></td>
                </tr>
                <tr>
                    <td>Address Line 1</td>
                    <td><input type="text" class="form-control" placeholder="productDescription" name="productDescription" value="<?php echo $data['productDescription']; ?>" required="required"></td>
                </tr>
                <tr>
                    <td>Address Line 2</td>
                    <td><input type="text" class="form-control" placeholder="quantityInStock" name="quantityInStock" value="<?php echo $data['quantityInStock']; ?>" required="required" ></td>
                </tr>
                <tr>
                    <td>buyPrice</td>
                    <td><input type="text" class="form-control" placeholder="buyPrice" name="buyPrice" value="<?php echo $data['buyPrice']; ?>" required="required"></td>
                </tr>
                <tr>
                    <td>MSRP</td>
                    <td><input type="text" class="form-control" placeholder="MSRP" name="MSRP" value="<?php echo $data['MSRP']; ?>" required="required" ></td>
                </tr>
            <?php endwhile; ?>            
            </main>
        </table>
        <button type="submit" class="btn btn-primary">Update</button>
            </form>    
</body>
</html>