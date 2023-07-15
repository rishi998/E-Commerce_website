<?php
include('connection.php');
if (isset($_POST['signin'])) {
    date_default_timezone_set("Asia/Kolkata");
    $username = $_POST['username'];
    $pass = $_POST['passsword'];
    $sql = "SELECT * FROM users WHERE username='$username' AND passsword='$pass'";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $email = $row['email'];
        }
        $otp = rand(100000, 999999);
        // Send OTP
        require_once("mail_function.php");
        $mail_status = sendOTP($email, $otp);

        if ($mail_status == 1) {
            $result = mysqli_query($conn, "INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s") . "')");
            $current_id = mysqli_insert_id($conn);
            if (!empty($current_id)) {
                $success = 1;
                $_SESSION['userin'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['user-in'] = "gg";
            }
            header("location:verify_login.php");
        }
    } else {
        $_SESSION['login-error'] = "<div style='color:#ed8585;'><span class='rr' style='width:fit-content;margin-left:10%;padding-top:5px;color:white,font-size:15px;font-weight:500;'>Invalid Username or Password!</span><div>";
        echo '<script>
        setTimeout(function(){
            window.location.replace("login.php");
        },500);
        
        </script>';
    }
}
if (isset($_POST['signup'])) {
    
    $mail = $_POST['email'];
    $fname = $_POST['fullname'];
    $userr = $_POST['username'];
    $pask = $_POST['passsword'];
    $_SESSION['b-email'] = $mail;
    $_SESSION['b-fname'] = $fname;
    $_SESSION['b-userr'] = $userr;
    $_SESSION['b-pask'] = $pask;
    date_default_timezone_set("Asia/Kolkata");
    $email = $_POST['email'];
    $_SESSION["email"] = $email;
    $otp = rand(100000, 999999);
    // Send OTP
    require_once("mail_function.php");
    $mail_status = sendOTP($_POST["email"], $otp);
    if ($mail_status == 1) {
        $result = mysqli_query($conn, "INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s") . "')");
        $current_id = mysqli_insert_id($conn);
        if (!empty($current_id)) {
            $success = 1;
            $_SESSION['user-in'] = "gg";
        }
        header("location:verify_register.php");
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech2etc Ecommerce Tutorial</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="bk">
        <div class="wrapper">

            <span class="icon-close">
                <a href="index.php" style="text-decoration: none;"><i class="fa-solid fa-circle-xmark " style="text-decoration: none;color:black;"></i></a>
            </span>
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
                    <div class="remember-forgot">
                        <label><input type="checkbox">&nbsp Remember me &nbsp</label>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <input type="submit" id="signin" class="btnn" name="signin" value="Sign In"></input>

                    <div class="login-register">
                        <p>Don't have an account? &nbsp <a href="#" class="register-link"><strong>Sign up</strong></a></p>
                    </div>
                </form>
            </div>
            <!-- ---------------------------------register----------------------- -->
            <div class="form-box register">
                <h2>Register</h2>
                <form action="#" class="frm" method="post">
                    <div class="input-box">
                        <span class="icon">
                            <i class="fa-solid fa-paper-plane"></i>
                        </span>
                        <input type="text" name="email" required>

                        <label>Email</label>

                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <!-- <i class="fa-solid fa-envelope fa-beat-fade"></i>    -->
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <input type="text" name="fullname" required>
                        <label>Full Name</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <input type="text" name="username" required>
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="passsword" required>
                        <label>Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox" required> I agree to the terms & conditions
                    </div>
                    <input type="submit" class="btnn" name="signup" value="Sign up"></input>
                    <div class="login-register">
                        <p>Already have an account? &nbsp <a href="#" class="login-link"><strong>Sign In</strong></a></p>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>