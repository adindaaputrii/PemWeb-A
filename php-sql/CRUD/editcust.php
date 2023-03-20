<?php
  include ('koneksi.php');

  $status = '';
  $result = '';
  //pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['customerNumber'])) {
        //query SQL
        $customerNumber_upd = $_GET['customerNumber'];
        $query = "SELECT * FROM customers WHERE customerNumber = '$customerNumber_upd'";

        //eksekusi query
        $result = mysqli_query(connection(), $query);
    }
  }

//melakukan pengecekan apakah ada form yang dipost
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
    //query SQL
    $sql = "UPDATE customers SET customerName='$customerName', contactLastName='$contactLastName', contactFirstName='$contactFirstName', phone='$phone', addressLine1='$addressLine1', addressLine2='$addressLine2', city='$city', state='$state', postalCode='$postalCode', country='$country', salesRepEmployeeNumber='$salesRepEmployeeNumber', creditLimit='$creditLimit' WHERE customerNumber='$customerNumber'";
    
    //eksekusi query
    $result = mysqli_query(connection(), $sql);
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
    <title>Edit Data Customers</title>
</head>
<body>
        <tr >
            <td colspan="3">
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <?php 
                if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Customer berhasil diupdate!</div>';
                }
                elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Customer gagal diupdate!</div>';
                }
                 ?>
            </td>
        </tr>
        <table>
            <h2>Edit Data Customers</h2>
                <form action="editcust.php" method="POST">
                <?php while($data = mysqli_fetch_array($result)): ?>
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
                
                </main>
        </table>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
</body>
</html>