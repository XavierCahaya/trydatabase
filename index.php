<?php

// Memanggil koneksi menuju database
include_once("connection.php");

// Memanggil data dari database
$result = mysqli_query($mysqli, 'SELECT * FROM users');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Users</title>
</head>
<body>
    <style>
        body {
            background-image: url('motel.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    table {
    border-collapse: collapse;
    margin: 0 auto;
    width: 100%;
    max-width: 600px;
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
}
    th {
        background-color: #0066FF;
        text-align: center;
        padding: 8px;
    }

    td {
        background-color: #FFFFFF80;
        border: 1px solid #ddd;
        padding: 8px;
    }
</style>


<table border="1">
    <tr>
        <td colspan="4"><a href="add.php" class="btn btn-primary">Tambah User</a></td>
    </tr>
<tr>
    <th style="color: white;">ID</th>
    <th style="color: white;">Name</th>
    <th style="color: white;">Address</th>
    <th style="color: white;">Action</th>
</tr>

    <!-- Add your table data rows here -->
        <?php
        $count=1;
            while($user_data = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $count; $count++ ?></td>
            <td><?php echo $user_data['name']; ?></td>
            <td><?php echo $user_data['address']; ?></td>
            <td style="text-align: center;">
            <a href="edit.php?id=<?php echo $user_data['id']; ?>" class="btn btn-warning">Edit</a>
            <a href="delete.php?id=<?php echo $user_data['id']; ?>" class="btn btn-danger">Delete</a>
            </td>   
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>