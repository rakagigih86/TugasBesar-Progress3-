<?php
    session_start();
    if(!isset($_SESSION["login"]))
    {
        echo $_SESSION["login"];
        header("Location:login.php");
        exit;
    }
    require 'functions.php';
    $spl=query(" SELECT * FROM supplier");
    if(isset($_POST["cari"]))
    {
        $spl=cari($_POST["keyword"]);
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
    
    <title>Document</title>
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
                    <li class="active"><a href="index.php">Data supplier</a></li>
                    <li><a href="tambah.php">Tambah data</a></li>
                    <li><a href="logout.php">keluar</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

    <div class="container">
        <h1> Daftar Supplier</h1>          
        <form action="" method="post">
            <input type ="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
            <button type ="submit" name=cari> cari </button>
        </form>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama Toko</th>
                <th>Jenis Barang</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Link Toko</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                <?php foreach($spl as $row):?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["Namatoko"]; ?></td>
                    <td><?= $row["Jenis"]; ?></td>
                    <td><?= $row["Telepon"]; ?></td>
                    <td><?= $row["Alamat"]; ?></td>
                    <td><?= $row["Link"]; ?></td>
                    <td><img src="image/<?php echo $row["Gambar"]; ?>"alt="" height="100" width="100" srcset=""></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row["id"];?>">Edit</a>
                        <a href="hapus.php?id=<?php echo $row["id"];?>"onclick="return confirm('Apakah data ini akan dihapus')">Hapus</a>
                </tr>
                <?php $i++ ?>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>
