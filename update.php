<?php 

require 'db.php';

$id = $_GET['id'];
// READ DATA
$ambil_data = $db->query("SELECT nama_produk, harga, deskripsi FROM cms WHERE id='$id'");
$baris = array();
$data_untuk_edit = $ambil_data->fetchArray();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nama_produk']) && isset($_POST['deskripsi']) && isset($_POST['harga']) && $_POST['nama_produk'] && $_POST['harga'] && $_POST['deskripsi'] != '') {
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $db->query("UPDATE cms SET nama_produk='$nama_produk', harga='$harga', deskripsi='$deskripsi' WHERE id='$id'");
        
        // Redirect setelah update untuk melihat perubahan
        header("Location: index.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
    <style>
        body {
            font-family: Poppins;
        }
        .container {
            width: 400px;
            box-shadow: 0 0 5px grey;
            overflow: hidden;
            border-radius: 10px;
            float: left;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        .form-container {
            width: 200px;
            display: table;
            margin: 0 auto;
        }
        .input-group {
            margin: 15px 0;
            text-align: center;
        }
        label {
            display: block;
            text-align: start;
            margin: 5px 0 5px 8px;
        }
        input {
            padding: 5px 10px;
        }
        input[type="submit"] {
            cursor: pointer;
            margin-bottom: 20px;
            padding: 7px 70px;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>UPDATE PRODUK</h1>
        <div class="form-container">
            <form method="POST" action="update.php?id=<?php echo $id; ?>">
                <!-- INPUT NAMA -->
                <div class="input-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" value="<?php echo $data_untuk_edit['nama_produk']; ?>">
                </div>
                <!-- INPUT NAMA -->
                <div class="input-group">
                    <label>Harga</label>
                    <input type="number" name="harga" value="<?php echo $data_untuk_edit['harga']; ?>">
                </div>
                <!-- INPUT NAMA -->
                <div class="input-group">
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi" value="<?php echo $data_untuk_edit['deskripsi']; ?>">
                </div>
                <!-- SUBMIT BUTTON -->
                <div class="input-group">
                    <input type="submit" value="Update">
                </div>
            </form>
        </div>
        <div class="input-group">
            <a href="index.php">Kembali</a>
        </div>
    </div>
</body>
</html>
