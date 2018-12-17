<?php
session_start();
if(isset($_COOKIE['login']))
{
    if($_COOKIE['login']=='true')
    {
        $_SESSION['login']=true;
    }
}
if(isset($_SESSION["login"]))
{
    header("location:home.php");
    exit;
}
require 'functions.php';

if(isset($_POST["login"]))
{
        $username=$_POST["username"];
        $password=$_POST["password"];

    $result=mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");

    if(mysqli_num_rows($result)===1)
    {
        $row=mysqli_fetch_assoc($result);
        $hash = password_hash($password,PASSWORD_DEFAULT);
        if(password_verify($password,$hash))
        {
            $_SESSION["login"]=true;

            if(isset($_POST['remember']))
            {
                setcookie('id',$row['id'],time()+60);
                setcookie('key',hash(sha256,$row['username']),time()+60);
            }

            header("Location:home.php");
            exit;
        }
    }
    $error=true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="login.css">
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
    
    <title>Halaman Login</title>
    <style>
        label {
            display:block;
        }
    </style>
</head>
<body>
    <?php if(isset($error)):?>
        <p style="color:red;font-style=bold">
        Username dan password salah</p>
    <?php endif?>

    <div class="container">
            <div class="row" id="pwd-container">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <section class="login-form">
                    <form method="post" action="" role="login">
                        <h1>Login</h1>
                        
                        <input type="text" name="username" placeholder="Username" required class="form-control input-lg" />
      
                        <input type="password" class="form-control input-lg" id="password" placeholder="Password" required="" />
          
                        <div class="pwstrength_viewport_progress"></div>
                        <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Sign in</button>
                    </form>
                </section>  
            </div>
            <div class="col-md-4"></div>
            </div>  
        </div>
    </form>
    
</body>
</html>
