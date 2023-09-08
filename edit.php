<?php
include_once("connection.php");

// Update
if (isset($_POST['update'])) {
    $id = $_POST['id']; // Get the user's ID from the hidden field
    $name = $_POST['name'];
    $address = $_POST['address'];

    // Query to update data for the selected user
    $query = mysqli_query($mysqli,
        "UPDATE users SET name='$name', address='$address' WHERE id='$id'");

    if ($query) {
        header('Location: index.php');
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}

// Ambil data user
$id = $_GET['id'];

$query = mysqli_query($mysqli, "SELECT * FROM users WHERE id='$id'");

while ($user_data = mysqli_fetch_array($query)) {
    $name = $user_data['name'];
    $address = $user_data['address'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>EDIT USER</title>
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
    td {
        background-color: #FFFFFF77;
        border: 3px solid #ddd;
        padding: 8px;
    }
</style>
    <form action="edit.php" method="POST" name="editUser">
    <div style="text-align: center; margin-top: 200px;">
    <table border="1"style="border-collapse: collapse; width: 300px; margin: 0 auto;">
    <tr>
    <td colspan="4"><a href="index.php" class="btn btn-primary">Kembali</a></td>
</tr>
            <tr>
            <td style="text-align: right; font-weight: bold; color: white;">Name</td>
                <td><input type="text" name="name" style="height: 25px" value="<?= $name ?>"></td>
            </tr>
            <tr>
            <td style="text-align: right; font-weight: bold; color: white;">Address</td>
            <td><input type="text" name="address" style="height: 25px" value="<?= $address ?>"></td>
            </tr>
            <tr>
            <td colspan="4"><button type="submit" name="update" class="btn btn-success">Update</button></td>
            </tr>
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></td>
        </table>
        </div>
    </form>
</body>
</html>