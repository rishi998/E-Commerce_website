<?php
include('connection.php');
if(!empty($_SESSION['email'])){
$mail = $_SESSION["email"];
$userin = $_SESSION["userin"];
$error_message = "";
$success = "";
$succ = 0;
}
else{
        $mail=" ";
}
if (empty($_SESSION['user-in'])) {
    header("location:login.php");
    die();
}
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cara</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
  <link rel="manifest" href="img/favicon/site.webmanifest">
</head>

<body style="background-color: #fff;">
    <div class="logo">
        <a href="#"><img src="img/brandd.png" class="logo" alt=""></a>


        <span class="icon-close">
            <a href="login.php" style="text-decoration: none;"><i style="text-decoration: none;color:black;" class="fa-solid fa-circle-xmark fa-2x"></i></a>
        </span>
    </div>
    <div class="container" id="main-div">
        <h1>OTP Verification</h1>
        <p>Please enter the OTP sent to Email</p><br>
        <a style="font-size:12px;margin-top:-4%;margin-bottom:6%;">~ &nbsp <?php echo $mail ?> &nbsp ~</a>

        <?php
        if (!empty($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        ?>


        <form method="post" class="checking">
            <input type="text" class="flds" id="digit1" name="otp_1" maxlength="1" required>
            <input type="text" class="flds" id="digit2" name="otp_2" maxlength="1" required>
            <input type="text" class="flds" id="digit3" name="otp_3" maxlength="1" required>
            <input type="text" class="flds" id="digit4" name="otp_4" maxlength="1" required>
            <input type="text" class="flds" id="digit5" name="otp_5" maxlength="1" required>
            <input type="text" class="flds" id="digit6" name="otp_6" maxlength="1" required>
            <div class="btn">
            <input type="submit" class="button" value="Verify" name="check">
            </div>
        </form>

        <script src="script.js"></script>
    </div>
</body>

</html>

<?php
if (isset($_POST["check"])) {
    $a = $_POST['otp_1'];
    $b = $_POST['otp_2'];
    $c = $_POST['otp_3'];
    $d = $_POST['otp_4'];
    $e = $_POST['otp_5'];
    $f = $_POST['otp_6'];
    $otp = $a . $b . $c . $d . $e . $f;

    $result = mysqli_query($conn, "SELECT * FROM otp_expiry WHERE otp=$otp AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 2 MINUTE)");
    $count  = mysqli_num_rows($result);
    if ($count > 0) {
        $result = mysqli_query($conn, "UPDATE otp_expiry SET is_expired = 1 WHERE otp = $otp");
        if ($result == TRUE) {
            $delete = mysqli_query($conn, "DELETE FROM otp_expiry WHERE create_at < (NOW()- INTERVAL 1 DAY) OR create_at < (NOW()- INTERVAL 5 MINUTE)");

            $_SESSION["me"] = $userin;
            $_SESSION["user-log"]='gg';

            header("location:verify_success.php");
        }
    } else {
        $_SESSION['error'] = "<h1 style='color:red;font-size:15px;font-weight:500;margin-top:-7%;margin-bottom:0px;'>Invalid OTP!</h1>";
        header("location:verify_login.php");
    }
}
?>