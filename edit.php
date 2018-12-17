<?php

    require 'functions.php';
    if(isset($_POST['submit']))
    {


        if(edit($_POST)>0)
        {
            echo "
            <script>
                alert('data berhasil disimpan');
                document.location.href='index.php';
            </script>

            ";
        }else{
            echo "
            <script>
                alert('data gagal disimpan');
                document.location.href='tambah_data.php';
            </script>";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }
    $id=$_GET["id"];
    //var_dump($id);

    //query berdasarkan id
    $spl=query("SELECT * FROM supplier WHERE id=$id")[0];
    //var_dump($spl[0]["Nama"]);
    //var_dump($spl);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
            <!-- Bootstrap CSS -->
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
    
            <!-- jQuery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Bootstrap JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <title>Update data</title>
    <style>
        label {
            display:block;
        }
    </style>
</head>
<body>
    <h1>Update Data Supplier</h1>
    <form action="" method="post" >
        <li>
            <input type="hidden" name="id" value="<?= $spl["id"] ?>">
        </li>
        <ul>
            <li>
                <label for="Namatoko">Nama Toko :</label>
                <input type="text" name="Namatoko" id="Namatoko" value="<?= $spl["Namatoko"]; ?>" >
            </li>
            <li>
                <label for="Jenis">Jenis Barang :</label>
                <input type="text" name="Jenis" id="Jenis" required value="<?= $spl["Jenis"]; ?>" >
            </li>
            <li>
                <label for="Telepon">Telepon :</label>
                <input type="text" name="Telepon" id="Telepon" required value="<?= $spl["Telepon"]; ?>" >
            </li>
            <li>
                <label for="Alamat">Alamat :</label>
                <input type="text" name="Alamat" id="Alamat" required value="<?= $spl["Alamat"]; ?>" >
            </li>
            <li>
                <label for="Link">Link :</label>
                <input type="text" name="Link" id="Link" required value="<?= $spl["Link"]; ?>" >
            </li>
            <li>
                <label for="Gambar">Gambar :</label>
                <input type="file" name="Gambar" id="Gambar" required value="<?= $spl["Gambar"]; ?>" >
            </li>
            <li>
                <button type="submit" name="submit"> Update </button>
            </li>
        </ul>
    </form>    
</body>
</html>