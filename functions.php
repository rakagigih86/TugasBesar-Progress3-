<?php

    $conn=mysqli_connect("localhost","root","","rakagigih");

    if(!$conn){
        die('Koneksi Error : '.mysqli_connect_errno()
        .' - '.mysqli_connect_error());
    }

    $result=mysqli_query($conn,"SELECT * FROM supplier");


    function query($query_kedua)
    {
        
        global $conn;
        $result=mysqli_query($conn,$query_kedua);

        $rows = [];
        while ( $row = mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }

    function tambah ($data)
    {
        global $conn;

        $namatoko=htmlspecialchars($data["Namatoko"]);
        $jenis=htmlspecialchars($data["Jenis"]);
        $telepon=htmlspecialchars($data["Telepon"]);
        $alamat=htmlspecialchars($data["Alamat"]);
        $link=htmlspecialchars($data["Link"]);

        $gambar=upload();
        if(!$gambar)
        {
            return false;
        }
        $query= " INSERT INTO supplier
                    VALUES
                    ('','$namatoko','$jenis','$telepon','$alamat','$link','$gambar')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);

    }

    function hapus ($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM supplier WHERE id=$id ");
        return mysqli_affected_rows($conn);
    }
    function edit ($data){
        global $conn;

        $id=$data["id"];
        $namatoko=htmlspecialchars($data["Namatoko"]);
        $jenis=htmlspecialchars($data["Jenis"]);
        $telepon=htmlspecialchars($data["Telepon"]);
        $alamat=htmlspecialchars($data["Alamat"]);
        $link=htmlspecialchars($data["Link"]);
        $gambar=htmlspecialchars($data["Gambar"]);

        $query= "UPDATE supplier SET
                    Namatoko='$namatoko',
                    Jenis='$jenis',
                    Telepon='$telepon',
                    Alamat='$alamat',
                    Link='$link',
                    Gambar='$gambar'
                    WHERE id= $id";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    

    }
    function cari($keyword)
    {
        $sql="SELECT * from supplier
            WHERE
            Namatoko LIKE '%$keyword%' OR
            Jenis LIKE '%$keyword%' OR
            Telepon LIKE '%$keyword%' OR
            Alamat LIKE '%$keyword%' OR
            Link LIKE '%$keyword%'
            ";

        return query($sql);
    }

    function registrasi($data)
    {
        global $conn;

        $username=strtolower(stripcslashes($data['username']));
        $password=mysqli_real_escape_string($conn,$data['password']);
        $password2=mysqli_real_escape_string($conn,$data['password2']);

        $result=mysqli_query($conn,"SELECT username FROM user where username='$username'");

        if(mysqli_fetch_assoc($result))
        {
            echo "
                <script>
                    alert('username sudah ada');
                </script>
            ";
            return false;
        }
        if($password!==$password2)
        {
            echo"
            <script>
                alert('password anda tidak sama');
            </script>
            ";
            return false;
        }
        $password=md5($password);
        $password=password_hash($password,PASSWORD_DEFAULT);
        var_dump($password);
        mysqli_query($conn,"INSERT INTO user values('','$username','$password')");

        return mysqli_affected_rows($conn);
    }
?>