<?php

require 'db.php';
// TAMBAH DATA
if(isset($_POST['submit'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    
    if(!empty($nama_produk) && !empty($harga)) {
        $db->query("INSERT INTO cms (nama_produk, harga, deskripsi) VALUES ('$nama_produk', '$harga', '$deskripsi')");
    }
}

// READ DATA
$ambil_data = $db->query("SELECT * FROM cms");
$baris = array();
while($row = $ambil_data->fetchArray()) {
    $baris[] = $row;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <style>
        body {
            font-family: Poppins;
        }
        .container,
        .tabel-produk {
            margin-top: 100px;
        }
        .container {
            width: 400px;
            box-shadow: 0 0 5px grey;
            overflow: hidden;
            border-radius: 10px;
            float: left;
            margin-left: 10%;
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

        /* TABEL DATA */
        .tabel-produk {
            float: right;
            margin-right: 10%;
            width: 50%;
            text-align: center;
        }
        .tabel-produk th {
            color: grey;
            background-color: grey;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>TAMBAH PRODUK</h1>
        <div class="form-container">
            <form method="POST">
                <!-- INPUT NAMA -->
                <div class="input-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk">
                </div>
                <!-- INPUT NAMA -->
                <div class="input-group">
                    <label>Harga</label>
                    <input type="number" name="harga">
                </div>
                <!-- INPUT NAMA -->
                <div class="input-group">
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi">
                </div>
                <!-- SUBMIT BUTTON -->
                <div class="input-group">
                    <input type="submit" name="submit">
                </div>
            </form>
        </div>
    </div>
    <table border=1 cellspacing=0 cellpadding=10 class="tabel-produk">
        <thead>
            <tr>
                <td>No.</td>
                <td>Nama Produk</td>
                <td>Harga</td>
                <td>Deskripsi</td>
                <td colspan=2>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($baris as $key => $produk) { ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $produk['nama_produk']; ?></td>
                <td>Rp<?php echo $produk['harga']; ?></td>
                <td><?php echo $produk['deskripsi']; ?></td>
                <td><a href="update.php?id=<?php echo $produk['id']; ?>">Edit</a></td>
                <td><a onclick="return alert('Apakah kamu yakin?')" href="delete.php?id=<?php echo $produk['id']; ?>">Hapus</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>