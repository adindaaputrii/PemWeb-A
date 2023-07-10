<?php 
include ('koneksiPDO.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classic Model Database</title>
    <link rel="stylesheet" href="tabel.css">
</head>
<body>
    <?php 
        if (@$_GET['status']!==NULL) {
            $status = $_GET['status'];
            if ($status=='ok') {
              echo '<br><br><div class="alert alert-success" role="alert">Update Data Customer Berhasil!</div>';
            }elseif ($status=='err'){
              echo '<br><br><div class="alert alert-danger" role="alert">Update Data Customers Gagal!</div>';
            }

        }
    ?>

    <h2>Tabel Customers</h2>
    <p><a href="inputCustPDO.php">TAMBAH DATA CUSTOMERS</a>
    <table>
        <thead>
            <tr>
                <th>Customer Number</th>
                <th>Customer Name</th>
                <th>Contact Last Name</th>
                <th>Contact First Name</th>
                <th>Phone</th>
                <th>Address Line 1</th>
                <th>Address Line 2</th>
                <th>City</th>
                <th>State</th>
                <th>Postal Code</th>
                <th>Country</th>
                <th>Sales Rep Employee Number</th>
                <th>Credit Limit</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            //menampilkan data dari database dengan PDO
            //query sql
            $query = "SELECT * FROM customers";
            //eksekusi query
            $result = $conn->query($query);
            ?>

            <?php while($data = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $data ['customerNumber']; ?></td>
                    <td><?php echo $data ['customerName']; ?></td>
                    <td><?php echo $data ['contactLastName']; ?></td>
                    <td><?php echo $data ['contactFirstName']; ?></td>
                    <td><?php echo $data ['phone']; ?></td>
                    <td><?php echo $data ['addressLine1']; ?></td>
                    <td><?php echo $data ['addressLine2']; ?></td>
                    <td><?php echo $data ['city']; ?></td>
                    <td><?php echo $data ['state']; ?></td>
                    <td><?php echo $data ['postalCode']; ?></td>
                    <td><?php echo $data ['country']; ?></td>
                    <td><?php echo $data ['salesRepEmployeeNumber']; ?></td>
                    <td><?php echo $data ['creditLimit']; ?></td>
                    <td>
                        <li><a href="<?php echo "updateCustPDO.php?customerNumber=".$data['customerNumber']; ?>">Update Data</a></li>
                        <li><a href="<?php echo "deleteCustPDO.php?customerNumber=".$data['customerNumber']; ?>">Delete Data</a></li>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
    <br>
    <h2>Tabel Produk</h2>
    <p><a href="inputProdPDO.php">TAMBAH DATA PRODUCTS</a></p>
    <table>
    <thead>
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Product Line</th>
                <th>Product Scale</th>
                <th>Product Vendor</th>
                <th>Product Description</th>
                <th>Quantity In Stock</th>
                <th>Buy Price</th>
                <th>MSRP</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            //menampilkan data dari database dengan PDO
            //query sql
            $query = "SELECT * FROM products";
            //eksekusi query
            $result = $conn->query($query);
            ?>

            <?php while($data = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $data ['productCode']; ?></td>
                    <td><?php echo $data ['productName']; ?></td>
                    <td><?php echo $data ['productLine']; ?></td>
                    <td><?php echo $data ['productScale']; ?></td>
                    <td><?php echo $data ['productVendor']; ?></td>
                    <td><?php echo $data ['productDescription']; ?></td>
                    <td><?php echo $data ['quantityInStock']; ?></td>
                    <td><?php echo $data ['buyPrice']; ?></td>
                    <td><?php echo $data ['MSRP']; ?></td>
                    <td>
                        <li><a href="<?php echo "updateProdPDO.php?productCode=".$data['productCode']; ?>">Update Data</a></li>
                        <li><a href="<?php echo "deleteProdPDO.php?productCode=".$data['productCode']; ?>">Delete Data</a></li>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</body>
</html>