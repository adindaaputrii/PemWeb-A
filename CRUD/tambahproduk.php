<?php 
  include ('koneksi.php'); 

  $status = '';
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
      $query = "INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) VALUES('$productCode','$productName','$productLine','$productScale','$productVendor','$productDescription','$quantityInStock','$buyPrice','$MSRP')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
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
    <title>Tambah Data Produk</title>
</head>
<body>
        <tr >
            <td colspan="3">
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <?php 
                if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Product berhasil disimpan!</div>';
                }
                elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Product gagal disimpan!</div>';
                }
                ?>
            </td>
        </tr>
        <table>
            <h2>Tambah Data Product</h2>
            <form action="tambahproduk.php" method="POST">
            <tr>
                <td>Product Code</td>
                <td><input type="text" class="form-control" placeholder="productCode" name="productCode" required="required"></td>
            </tr>
            <tr>
                <td>Product Name</td>
                <td> <input type="text" class="form-control" placeholder="productName" name="productName" required="required"></td>
            </tr>
            <tr>
                <td>Product Line</td>
                <td> <input type="text" class="form-control" placeholder="productLine" name="productLine" required="required"></td>
            </tr>
            <tr>
                <td>Product Scale</td>
                <td><input type="text" class="form-control" placeholder="productScale" name="productScale" required="required"></td>
            </tr>
            <tr>
                <td>Product Vendor</td>
                <td><input type="text" class="form-control" placeholder="productVendor" name="productVendor" require="require"></td>
            </tr>       
            <tr>
                <td>Product Description</td>
                <td><input type="text" class="form-control" placeholder="productDescription" name="productDescription" required="required"></td>
            </tr>
            <tr>
                <td>Quantity In Stock</td>
                <td><input type="text" class="form-control" placeholder="quantityInStock" name="quantityInStock" required="required"></td>
            </tr>
            <tr>
                <td>Buy Price</td>
                <td><input type="text" class="form-control" placeholder="buyPrice" name="buyPrice" required="required"></td>
            </tr>
            <tr>
                <td>MSRP</td>
                <td><input type="text" class="form-control" placeholder="MSRP" name="MSRP" required="required"></td>
            </tr>
            
                </main>
        </table>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
</body>
</html>