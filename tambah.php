<?php

    $conn=mysqli_connect("localhost","root","","rakagigih");


    if(isset($_POST['submit']))
    {
        $namatoko=$_POST["Namatoko"];
        $jenis=$_POST["Jenis"];
        $telepon=$_POST["Telepon"];
        $alamat=$_POST["Alamat"];
        $link=$_POST["Link"];
        $gambar=$_POST["Gambar"];

        $query=" INSERT INTO supplier
                VALUES
                ('','$namatoko','$jenis','$telepon','$alamat','$link','$gambar')";
        mysqli_query($conn,$query);






        if(mysqli_affected_rows($conn)>0){
            echo"data berhasil disimpan";
        }
        else{
            echo"gagal";
            echo"<br>";
            echo mysqli_error($conn);
        }
    }
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
        
    <title>Tambah Data</title>
    <style>
        label {
            display:block;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><img src="../bismillahuas/image/logo.jpg"style="height:180%;"></a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="index.php">Data supplier</a></li>
                    <li class="active"><a href="tambah.php">Tambah data</a></li>
                    <li><a href="logout.php">keluar</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    <h1>Tambah Data Supplier</h1>
    <form action="" method="post" enctype="multipart/from-data">
        <ul>
            <li>
                <label for="Namatoko">Nama Toko</label>
                <input type="text" name="Namatoko" id="Namatoko" required>
            </li>
            <li>
                <label for="Jenis">Jenis Barang</label>
                <input type="text" name="Jenis" id="Jenis" required>
            </li>
            <li>
                <label for="Telepon">No Telepon</label>
                <input type="text" name="Telepon" id="Telepon" required>
            </li>
            <li>
                <label for="Alamat">Alamat</label>
                <input type="text" name="Alamat" id="Alamat" required>
            </li>
            <li>
                <label for="Link">Link</label>
                <input type="text" name="Link" id="Link" required>
            </li>
            <li>
                <label for="Gambar">Gambar</label>
                <input type="file" name="Gambar" id="Gambar" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah</button>
            </li>
        </ul>
    </form>
</body>
</html>