<?php 
include ('koneksi.php');
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
    <h2>Tabel Pegawai</h2>
    <table>
        <thead>
            <tr>
                <th>Employee Number</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Extension</th>
                <th>Email</th>
                <th>Office Code</th>
                <th>Reports To</th>
                <th>Job Title</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            //menampilkan data dari database
            $query = "SELECT * FROM employees";
            $result = mysqli_query(connection(), $query);
            ?>

            <?php while($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $data ['employeeNumber']; ?></td>
                    <td><?php echo $data ['lastName']; ?></td>
                    <td><?php echo $data ['firstName']; ?></td>
                    <td><?php echo $data ['extension']; ?></td>
                    <td><?php echo $data ['email']; ?></td>
                    <td><?php echo $data ['officeCode']; ?></td>
                    <td><?php echo $data ['reportsTo']; ?></td>
                    <td><?php echo $data ['jobTitle']; ?></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>

    <br>

    <h2>Tabel Lini Produk</h2>
    <table>
    <thead>
            <tr>
                <th>Product Line</th>
                <th>Text Description</th>
                <th>HTML Description</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            //menampilkan data dari database
            $query = "SELECT * FROM productlines";
            $result = mysqli_query(connection(), $query);
            ?>

            <?php while($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $data ['productLine']; ?></td>
                    <td><?php echo $data ['textDescription']; ?></td>
                    <td><?php echo $data ['htmlDescription']; ?></td>
                    <td><?php echo $data ['image']; ?></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</body>
</html>