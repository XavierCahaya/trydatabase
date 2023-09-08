<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
    function Validasi() {
        var name = document.forms["addUser"]["name"].value;
        var address = document.forms["addUser"]["address"].value;

        if (name === "" || address === "") {
            alert("Mohon Masukan Nama dan Alamat");
            return false;
        }
    }
</script>
    <title>ADD RENTS</title>
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
    <form action="add.php" method="POST" name="addUser" onsubmit="return Validasi();">
    <div style="text-align: center; margin-top: 200px;">
    <table border="1" cellpadding="15" cellspacing="0" style="border-collapse: collapse; width: 300px; margin: 0 auto;">
    <tr>
        <td colspan="4"><a href="index.php" class="btn btn-primary">Kembali</a></td>
    </tr>
    <tr>
    <td style="text-align: right; font-weight: bold; color: white;">Name:</td>
    <td><input type="text" name="name" style="height: 30px;"></td>
</tr>
<tr>
    <td style="text-align: right; font-weight: bold; color: white;">Address:</td>
    <td><input type="text" name="address" style="height: 30px;"></td>
</tr>
<tr>
    <td colspan="4"><button type="submit" name="Submit" class="btn btn-success">Add</button></td>
</tr>
    </table>
</div>
</form>
    <!-- Handle permintaan POST dari form diatas -->
    <?php
if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];

    // Memanggil koneksi menuju database
    include_once("connection.php");

    // Query untuk insert data ke database
    $result = mysqli_query($mysqli, "INSERT INTO users (name, address) VALUES ('$name', '$address')");

    if ($result) {
        echo '<script>alert("Berhasil menambah user."); window.location.href = "index.php";</script>';
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }    
}
?>
</body>
</html>