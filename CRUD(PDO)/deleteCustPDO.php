<?php 
    include ('koneksiPDO.php');

    $status = '';
    $result = '';

    //pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['customerNumber'])) {
            //query SQL
            $customerNumber_upd = $_GET['customerNumber'];
            $query = $conn->prepare("DELETE FROM customers WHERE customerNumber = :customerNumber ");
            //binding data
            $query->bindParam(':customerNumber',$customerNumber_upd);
            //eksekusi query
            if ($query->execute()) {
              $status = 'ok';
            }else {
              $status = 'err';
            }

        //redirect ke halaman awal
        header('Location: cust&prodPDO.php?status='.$status);
}
}
?>