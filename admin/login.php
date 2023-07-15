<?php 
include('../connection.php');
if(isset($_POST['signin'])){
    $user = $_POST['username'];
    $pass = $_POST['passsword'];
    $sql="SELECT * FROM admin WHERE username='$user' AND passsword='$pass'";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    if($count>0){
        $_SESSION['log-in']=$user;
        header("location:index.php");
    }
    else{
        $_SESSION['login-error']="<div style='color:#ed8585;'><span class='rr' style='width:fit-content;margin-left:10%;padding-top:5px;color:white,font-size:15px;font-weight:500;'>Invalid Username or Password!</span><div>";
        echo '<script>
        setTimeout(function(){
            window.location.replace("login.php");
        },700);
        
        </script>';
       
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cara</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="stylle.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../img/favicon/site.webmanifest">
</head>

<body>
    <section>
        <div class="bk">
        <div class="wrapper">

            <div class="form-box login">
                <h2>Login</h2>
                <?php
                if (!empty($_SESSION['login-error'])) {
                    echo $_SESSION['login-error'];
                    unset($_SESSION['login-error']);
                }
                if (!empty($_SESSION['failed'])) {
                    echo $_SESSION['failed'];
                    unset($_SESSION['failed']);
                } ?>
                <form action="#" class="frm" method="post">
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-envelope fa-fade"></i></span>
                        <input type="text" name="username" required>
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-lock fa-fade"></i></span>
                        <input type="password" name="passsword" required>
                        <label>Password</label>
                    </div>
                    <input type="submit" id="signin" class="btnn" name="signin" value="Sign In"></input>


                </form>
            </div>
        </div>
        </div>
    </section>
</body>

</html>