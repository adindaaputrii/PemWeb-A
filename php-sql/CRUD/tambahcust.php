<?php 
  include ('koneksi.php'); 

  $status = '';
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
      $query = "INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) VALUES('$customerNumber','$customerName','$contactLastName','$contactFirstName','$phone','$addressLine1','$addressLine2','$city','$state','$postalCode','$country','$salesRepEmployeeNumber','$creditLimit')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
      //redirect ke halaman lain
      header('Location: customers&products.php?status='.$status); 
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Customer</title>
</head>
<body>
    <tr >
        <td colspan="3">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <?php 
            if ($status=='ok') {
            echo '<br><br><div class="alert alert-success" role="alert">Data Customer berhasil disimpan</div>';
            }
            elseif($status=='err'){
            echo '<br><br><div class="alert alert-danger" role="alert">Data Customer gagal disimpan</div>';
            }
            ?>
        </td>
    </tr>
    <a href="customers&products.php">DATA CUSTOMERS</a>
    <table>
        <h2>Tambah Data Customer</h2>
        <form action="tambahcust.php" method="POST">
        <tr>
            <td>Customer Number</td>
            <td><input type="text" class="form-control" placeholder="customerNumber" name="customerNumber" required="required"></td>
        </tr>
        <tr>
            <td>Customer Name</td>
            <td><input type="text" class="form-control" placeholder="customerName" name="customerName" required="required"></td>
        </tr>       
        <tr>
            <td>Contact Last Name</td>
            <td><input type="text" class="form-control" placeholder="contactLastName" name="contactLastName" required="required"></td>
        </tr>   
        <tr>
            <td>Contact First Name</td>
            <td><input type="text" class="form-control" placeholder="contactFirstName" name="contactFirstName" required="required"></td>
        </tr> 
        <tr>
            <td>Phone</td>
            <td><input type="text" class="form-control" placeholder="phone" name="phone" require="required"></td>
        </tr>         
        <tr>
            <td>Address Line 1</td>
            <td><input type="text" class="form-control" placeholder="addressLine1" name="addressLine1" required="required"></td>
        </tr>         
        <tr>
            <td>Address Line 2</td>
            <td><input type="text" class="form-control" placeholder="addressLine2" name="addressLine2" required="required"></td>
        </tr>       
        <tr>
            <td>City</td>
            <td><input type="text" class="form-control" placeholder="city" name="city" required="required"></td>
        </tr>           
        <tr>
            <td>State</td>
            <td><input type="text" class="form-control" placeholder="state" name="state" required="required"></td>
        </tr>           
        <tr>
            <td>PostalCode</td>
            <td><input type="text" class="form-control" placeholder="postalCode" name="postalCode" required="required"></td>
        </tr>
        <tr>
            <td>Country</td>
            <td><input type="text" class="form-control" placeholder="country" name="country" required="required"></td>
        </tr>       
        <tr>
            <td>Sales Rep Employee Number</td>
            <td><input type="text" class="form-control" placeholder="salesRepEmployeeNumber" name="salesRepEmployeeNumber" required="required"></td>
        </tr>      
        <tr>
            <td>Credit Limit</td>
            <td><input type="text" class="form-control" placeholder="creditLimit" name="creditLimit" required="required"></td>
        </tr>  
            </main>
    </table>
        <button type="submit" class="btn btn-primary">Simpan</button> 
        </form>
</body>
</html>