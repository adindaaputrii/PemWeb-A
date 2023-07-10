<?php

    include ('koneksiPDO.php');

    $status = '';
    $result = '';
    //pengecekan apakah ada variable GET yang dikirim
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['customerNumber'])) {
            //query SQL
            $customerNumber_upd = $_GET['customerNumber'];
            $query = $conn->prepare("SELECT * FROM customers WHERE customerNumber = :customerNumber");
            //binding data
            $query->bindParam(':customerNumber',$customerNumber_upd);
            //eksekusi query
            $query->execute(); 
        }
    }

    //pengecekan apakah ada form yang dipost
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
    $query = $conn->prepare("UPDATE customers SET customerName=:customerName, contactLastName=:contactLastName, contactFirstName=:contactFirstName, phone=:phone, addressLine1=:addressLine1, addressLine2=:addressLine2, city=:city, state=:state, postalCode=:postalCode, country=:country, salesRepEmployeeNumber=:salesRepEmployeeNumber, creditLimit=:creditLimit WHERE customerNumber=:customerNumber"); 

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

     //redirect ke halaman lain
    header('Location: cust&prodPDO.php?status='.$status);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Data Customer</title>
</head>
<body>
    <tr >
        <td colspan="3">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <?php 
            if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Update Data Customer Berhasil!</div>';
            }elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Update Data Customer Gagal!</div>';
            }
            ?>
        </td>
    </tr>
        <table>
            <tr>
                <th>
                    <h2>Update Data Customer</h2>
                    <form action="updateCustPDO.php" method="POST">
                    <?php while($data = $query->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td>Customer Number</td>
                            <td><input type="text" class="form-control" placeholder="customerNumber" name="customerNumber" value="<?php echo $data['customerNumber'];  ?>" required="required" readonly></td>
                        </tr>
                        <tr>
                            <td>Customer Name</td>
                            <td><input type="text" class="form-control" placeholder="customerName" name="customerName" value="<?php echo $data['customerName'];  ?>" required="required"></td>
                        </tr>
                        <tr>
                            <td>Contact Last Name</td>
                            <td><input type="text" class="form-control" placeholder="contactLastName" name="contactLastName" value="<?php echo $data['contactLastName'];  ?>" required="required" ></td>
                        </tr>
                        <tr>
                            <td>Contact First Name</td>
                            <td><input type="text" class="form-control" placeholder="contactFirstName" name="contactFirstName" value="<?php echo $data['contactFirstName'];  ?>" required="required"></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="text" class="form-control" placeholder="phone" name="phone" value="<?php echo $data['phone'];  ?>" required="required"></td>
                        </tr>
                        <tr>
                            <td>Address Line 1</td>
                            <td><input type="text" class="form-control" placeholder="addressLine1" name="addressLine1" value="<?php echo $data['addressLine1'];  ?>" required="required"></td>
                        </tr>
                        <tr>
                            <td>Address Line 2</td>
                            <td><input type="text" class="form-control" placeholder="addressLine2" name="addressLine2" value="<?php echo $data['addressLine2'];  ?>" required="required" ></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><input type="text" class="form-control" placeholder="city" name="city" value="<?php echo $data['city'];  ?>"    required="required"></td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td><input type="text" class="form-control" placeholder="state" name="state" value="<?php echo $data['state'];  ?>" required="required" ></td>
                        </tr>
                        <tr>
                            <td>Postal Code</td>
                            <td><input type="text" class="form-control" placeholder="postalCode" name="postalCode" value="<?php echo $data['postalCode'];  ?>" required="required"></td>
                        </tr>
                        <tr>
                            <td>Sales Rep Employee Number</td>
                            <td><input type="text" class="form-control" placeholder="salesRepEmployeeNumber" name="salesRepEmployeeNumber" value="<?php echo $data['salesRepEmployeeNumber'];  ?>" required="required"></td>
                        </tr>
                        <tr>
                            <td>Credit Limit</td>
                            <td><input type="text" class="form-control" placeholder="creditLimit" name="creditLimit" value="<?php echo $data['creditLimit'];  ?>" required="required"></td>
                        </tr>
                        <?php endwhile; ?>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    </main>
                </th>
            </tr>
        </table>
</body>
</html>