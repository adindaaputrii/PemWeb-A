<?php 

    include ('koneksiPDO.php'); 

    $status = '';
    // pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $customerNumber = $_POST['customerNumber'];
        $customerName = $_POST['customerName'];
        $contactLastName = $_POST['contactLastName'];
        $contactFirstName = $_POST['contactFirstName'];
        $phone = $_POST['phone'];
        $addressLine1 = $_POST['addressLine1'];
        $addressLine2 = $_POST['addressLine2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postalCode = $_POST['postalCode'];
        $country = $_POST['country'];
        $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
        $creditLimit = $_POST['creditLimit'];

        //query memakai PDO
        $query = $conn->prepare("INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit)
        VALUES(:customerNumber, :customerName, :contactLastName, :contactFirstName, :phone, :addressLine1, :addressLine2, :city, :state, :postalCode, :country, :salesRepEmployeeNumber, :creditLimit)"); 

        //binding data
        $query->bindParam(':customerNumber',$customerNumber);
        $query->bindParam(':customerName',$customerName);
        $query->bindParam(':contactLastName',$contactLastName);
        $query->bindParam(':contactFirstName',$contactFirstName);
        $query->bindParam(':phone',$phone);
        $query->bindParam(':addressLine1',$addressLine1);
        $query->bindParam(':addressLine2',$addressLine2);
        $query->bindParam(':city',$city);
        $query->bindParam(':state',$state);
        $query->bindParam(':postalCode',$postalCode);
        $query->bindParam(':country',$country);
        $query->bindParam(':salesRepEmployeeNumber',$salesRepEmployeeNumber);
        $query->bindParam(':creditLimit',$creditLimit);

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
    <title>Tambah Data Customer</title>
</head>
<body>
    <a href="cust&prodPDO.php">KEMBALI KE HALAMAN AWAL</a>
        <tr >
            <td colspan="3">
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <?php 
                if ($status=='ok') {
                    echo '<br><br><div class="alert alert-success" role="alert">Data Customer Berhasil Disimpan!</div>';
                } elseif($status=='err'){
                    echo '<br><br><div class="alert alert-danger" role="alert">Data Customer Gagal Disimpan!</div>';
                }
                 ?>
            </td>
        </tr>
    <table>
        <tr>
            <th>
                <h2>Tambah Data Customer</h2>
                    <form action="inputCustPDO.php" method="POST">
                    <div class="form-group">
                        <label>Customer Number</label>
                        <input type="text" class="form-control" placeholder="customerNumber" name="customerNumber" required="required">
                    </div>
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" class="form-control" placeholder="customerName" name="customerName" required="required">
                    </div>
                    <div class="form-group">
                        <label>Contact Last Name</label>
                        <input type="text" class="form-control" placeholder="contactLastName" name="contactLastName" required="required">
                    </div>
                    <div class="form-group">
                        <label>Contact First Name</label>
                        <input type="text" class="form-control" placeholder="contactFirstName" name="contactFirstName" required="required">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" placeholder="phone" name="phone" require="require">
                    <div class="form-group">
                        <label>Address Line 1</label>
                        <input type="text" class="form-control" placeholder="addressLine1" name="addressLine1" required="required">
                    </div>
                    <div class="form-group">
                        <label>Address Line 2</label>
                        <input type="text" class="form-control" placeholder="addressLine2" name="addressLine2" required="required">
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="city" name="city" required="required">
                    </div>
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" placeholder="state" name="state" required="required">
                    </div>
                    <div class="form-group">
                        <label>PostalCode</label>
                        <input type="text" class="form-control" placeholder="postalCode" name="postalCode" required="required">
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="country" name="country" required="required">
                    </div>
                    <div class="form-group">
                        <label>Sales Rep Employee Number</label>
                        <input type="text" class="form-control" placeholder="salesRepEmployeeNumber" name="salesRepEmployeeNumber" required="required">
                    </div>
                    <div class="form-group">
                        <label>Credit Limit</label>
                        <input type="text" class="form-control" placeholder="creditLimit" name="creditLimit" required="required">
                    </div>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                </main>
                </th>
            </tr>
        </table>
</body>
</html>