<?php 
    
    include ('koneksiPDO.php');

    $status = '';
    $result = '';

    //pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['productCode'])) {
            //query SQL
            $productCode_upd = $_GET['productCode'];
            $query = $conn->prepare("DELETE FROM products WHERE productCode = :productCode ");
            //binding data
            $query->bindParam(':productCode',$productCode_upd);
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