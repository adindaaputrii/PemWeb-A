<?php 
  include ('koneksi.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['customerNumber'])) {
          //query SQL
        $customerNumber = $_GET['customerNumber'];
        $query = "DELETE FROM customers WHERE customerNumber = '$customerNumber'"; 

          //eksekusi query
        $result = mysqli_query(connection(), $query);

        if ($result) {
            $status = 'ok';
        }
        else{
            $status = 'error';
        }

        //redirect ke halaman lain
        header('Location: customers&products.php?status='.$status);
      }  
  }