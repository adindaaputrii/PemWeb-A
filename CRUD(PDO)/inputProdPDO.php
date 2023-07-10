<?php 

    include ('koneksiPDO.php'); 

    $status = '';
    //]pengecekan apakah ada form yang dipost
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

    //query memakai PDO
    $query = $conn->prepare("INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP)
    VALUES(:productCode, :productName, :productLine, :productScale, :productVendor, :productDescription, :quantityInStock, :buyPrice, :MSRP)"); 

    //binding data
    $query->bindParam(':productCode',$productCode);
    $query->bindParam(':productName',$productName);
    $query->bindParam(':productLine',$productLine);
    $query->bindParam(':productScale',$productScale);
    $query->bindParam(':productVendor',$productVendor);
    $query->bindParam(':productDescription',$productDescription);
    $query->bindParam(':quantityInStock',$quantityInStock);
    $query->bindParam(':buyPrice',$buyPrice);
    $query->bindParam(':MSRP',$MSRP);

    //eksekusi query
    if ($query->execute()) {
        $status = 'ok';
    }else {
        $status = 'err';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Produk</title>
</head>
<body>
    <a href="cust&prodPDO.php">KEMBALI KE HALAMAN AWAL</a>
        <tr >
            <td colspan="3">
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <?php 
                if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Product Berhasil Disimpan!</div>';
                }elseif($status=='err') {
                echo '<br><br><div class="alert alert-danger" role="alert">Data Product Gagal Disimpan!</div>';
                }
                 ?>
            </td>
        </tr>
    <table>
        <tr>
            <th>
                <h2>Tambah Data Product</h2>
                <form action="inputProdPDO.php" method="POST">
                <div class="form-group">
                    <label>Product Code</label>
                    <input type="text" class="form-control" placeholder="productCode" name="productCode" required="required">
                </div>
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" placeholder="productName" name="productName" required="required">
                </div>
                <div class="form-group">
                    <label>Product Line</label>
                    <input type="text" class="form-control" placeholder="productLine" name="productLine" required="required">
                </div>
                <div class="form-group">
                    <label>Product Scale</label>
                    <input type="text" class="form-control" placeholder="productScale" name="productScale" required="required">
                </div>
                <div class="form-group">
                    <label>Product Vendor</label>
                    <input type="text" class="form-control" placeholder="productVendor" name="productVendor" require="require">
                <div class="form-group">
                    <label>Product Description</label>
                    <input type="text" class="form-control" placeholder="productDescription" name="productDescription" required="required">
                </div>
                <div class="form-group">
                    <label>Quantity In Stock</label>
                    <input type="text" class="form-control" placeholder="quantityInStock" name="quantityInStock" required="required">
                </div>
                <div class="form-group">
                    <label>Buy Price</label>
                    <input type="text" class="form-control" placeholder="buyPrice" name="buyPrice" required="required">
                </div>
                <div class="form-group">
                    <label>MSRP</label>
                    <input type="text" class="form-control" placeholder="MSRP" name="MSRP" required="required">
                </div>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
                </main>
            </th>
            </tr>
        </table>
</body>
</html>