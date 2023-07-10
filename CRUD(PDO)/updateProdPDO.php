<?php 

    include ('koneksiPDO.php');

    $status = '';
    $result = '';
    //pengecekan apakah ada variabel GET yang dikirim
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['productCode'])) {
            //query sql
            $productCode_upd = $_GET['productCode'];
            $query = $conn->prepare("SELECT * FROM customers WHERE productCode = :productCode");

            //binding data
            $query->bindParam(':productCode', $productCode);

            //eksekusi query
            $query->execute();
        }
    }

    //pengecekan apakah ada form yang dipost
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
        $query = $conn->prepare("UPDATE customers SET productName=:productName, productLine=:productLine, productScale=:productScale, productVendor=:productVendor, productDescription=:productDescription, quantityInStock=:quantityInStock, buyPrice=:buyPrice, MSRP=:MSRP WHERE productCode=:productCode");

        //binding data
        $query->bindParam(':productCode', $productCode);
        $query->bindParam(':productName', $productName);
        $query->bindParam(':productLine', $productLine);
        $query->bindParam(':productScale', $productScale);
        $query->bindParam(':productVendor', $productVendor);
        $query->bindParam(':productDescription', $productDescription);
        $query->bindParam(':quantityInStock', $quantityInStock);
        $query->bindParam(':buyPrice', $buyPrice);
        $query->bindParam(':MSRP', $MSRP);

        //eksekusi query
        if($query->execute()) {
            $status = 'ok';
        }else {
            $status = 'err';
        }

        //redirect ke halaman awal
        header('Location: cust&prodPDO.php?status='.$status);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Data Product</title>
</head>
<body>
    <tr >
        <td colspan="3">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <?php 
                if ($status=='ok') {
                    echo '<br><br><div class="alert alert-success" role="alert">Data Products berhasil diupdate</div>';
                } elseif($status=='err'){
                    echo '<br><br><div class="alert alert-danger" role="alert">Data Products gagal diupdate</div>';
                }
                 ?>
        </td>
    </tr>

    <table>
        <tr>
            <th>
            <h2>Update Data Product</h2>
            <form action="updateCustPDO.php" method="POST">
            <?php while($data = $query->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td>Products Number</td>
                    <td><input type="text" class="form-control" placeholder="productCode" name="productCode" value="<?php echo $data['productCode'];  ?>" required="required" readonly></td>
                </tr>
                <tr>
                    <td>Products Name</td>
                    <td><input type="text" class="form-control" placeholder="productName" name="productName" value="<?php echo $data['productName'];  ?>" required="required"></td>
                </tr>
                <tr>
                    <td>Contact Last Name</td>
                    <td><input type="text" class="form-control" placeholder="productLine" name="productLine" value="<?php echo $data['productLine'];  ?>" required="required" ></td>
                </tr>
                <tr>
                    <td>Contact First Name</td>
                    <td><input type="text" class="form-control" placeholder="productScale" name="productScale" value="<?php echo $data['productScale'];  ?>" required="required"></td>
                </tr>
                <tr>
                    <td>productVendor</td>
                    <td><input type="text" class="form-control" placeholder="productVendor" name="productVendor" value="<?php echo $data['productVendor'];  ?>" required="required"></td>
                </tr>
                <tr>
                    <td>Address Line 1</td>
                    <td><input type="text" class="form-control" placeholder="productDescription" name="productDescription" value="<?php echo $data['productDescription'];  ?>" required="required"></td>
                </tr>
                <tr>
                    <td>Address Line 2</td>
                    <td><input type="text" class="form-control" placeholder="quantityInStock" name="quantityInStock" value="<?php echo $data['quantityInStock'];  ?>" required="required" ></td>
                </tr>
                <tr>
                    <td>buyPrice</td>
                    <td><input type="text" class="form-control" placeholder="buyPrice" name="buyPrice" value="<?php echo $data['buyPrice']; ?>" required="required"></td>
                </tr>
                <tr>
                    <td>MSRP</td>
                    <td><input type="text" class="form-control" placeholder="MSRP" name="MSRP" value="<?php echo $data['MSRP'];  ?>" required="required" ></td>
                </tr>
                <?php endwhile; ?>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
            </main>
            </th>
        </tr>
    </table>
</body>
</html>