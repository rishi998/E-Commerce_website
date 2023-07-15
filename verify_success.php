<?php
include('connection.php');
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

<body>
    <div class="logoo">
        <a href="#"><img src="img/brandd.png" class="logo" alt=""></a>
    </div>
    <div class="container success" id="main-div" >
    
           <span style="margin-bottom: -28px;"><i class="fas fa-check-circle fa-fade"></i></span>
        
        <p>OTP Verified!</p>
        <span><p style="margin-top:-28px">Logging You In !</p></span>
    </div>
    <script>
        setTimeout(function(){
            window.location.replace("index.php");
        },1500);
    </script>

</body>

</html>