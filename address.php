<?php include('connection.php');
if (empty($_SESSION['user-log'])) {
  $_SESSION['failed'] = "<div style='color:#ed8585;'><span class='rr' style='width:fit-content;margin-left:10%;padding-top:5px;color:white,font-size:15px;font-weight:500;'>Login In First !</span><div>";
  header("location:login.php");
  die();
}
// $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
if (!empty($_SESSION['proceed'])) {
  if (!empty($_SESSION['me'])) {
    $username = $_SESSION['me'];
  }
}
if(isset($_POST['save'])){
  $fname=$_POST['fname'];
  $lstname=$_POST['lstname'];
  $addr=$_POST['addr'];
  $zip=$_POST['zip'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $no=$_POST['no'];
  $altno=$_POST['altno'];
  $fadd=$fname."  ".$lstname."  ".$addr."  ".$zip."  ".$city."  ".$state."  ".$no."  ".$altno;
  $_SESSION['fadd']=$fadd;
  $sql=mysqli_query($conn,"INSERT INTO user_ship SET username='$username',fname='$fname',lstname='$lstname',addr='$addr',zip='$zip',city='$city',statee='$state',noo=$no,altno=$altno;");
  header("location:payment.php");
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
  <link rel="stylesheet" href="style.css">
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
  <link rel="manifest" href="img/favicon/site.webmanifest">
</head>

<body>
  <section id="header">
    <a href="#"><img src="img/brandd.png" class="logo" alt=""></a>
    <div>
      <ul id="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li id="lg-bag"><a href="cart.php"><i class="fas fa-shopping-bag"></i></a></li>
        <?php
        if (empty($username)) {
        ?>
          <li id="lg-bag"><a href="login.php"><i class="fa-solid fa-user"></i></a></li><?php
                                                                                      } else {
                                                                                        ?>
          <li id="lg-bag"><a><i class="fa-solid fa-user dropbtn" onclick="myFunction()"></i>&nbsp<?php echo $username; ?></a></li>
          <div id="myDropdown" class="dropdown-content">
            <a href="profile.php"> <i class="fas fa-user-circle"></i> &nbsp Profile</a>
            <a href="order.php"><i class="fas fa-box"></i> &nbsp Orders</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> &nbsp Logout</a>
          </div>
        <?php
                                                                                      }
        ?>

      </ul>
    </div>

  </section>
  <script>
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>


  <div class="container ship" id="demo">

    <h1>Shipping</h1>
    <p>Please enter your shipping details.</p>
    <hr />
    <form action="" method="post">
      <div class="form">
        <div class="fields fields--2">
          <label class="field">
            <span class="field__label" for="firstname">First name</span>
            <input class="field__input" type="text"  name="fname" id="firstname" />
          </label>
          <label class="field">
            <span class="field__label" for="lastname">Last name</span>
            <input class="field__input" type="text"  name="lstname" id="lastname" />
          </label>
        </div>
        <label class="field">
          <span class="field__label" for="address">Address</span>
          <input class="field__input" type="text" name="addr" id="address" />
        </label>

        <div class="fields fields--3">
          <label class="field">
            <span class="field__label" for="zipcode">Zip code</span>
            <input class="field__input" type="text" name="zip" id="zipcode" />
          </label>
          <label class="field">
            <span class="field__label" for="city">City</span>
            <input class="field__input" type="text"  name="city" id="city" />
          </label>
          <label class="field">
            <span class="field__label" for="state">State</span>
            <input class="field__input" type="text" name="state" id="state" />
          </label>
        </div>
        <label class="field">
          <span class="field__label" for="Phone no.">Phone no.</span>
          <input class="field__input" type="text"  name="no" id="phone no." />
        </label>
        <label class="field">
          <span class="field__label" for="Phone no.">Alternate Phone no.</span>
          <input class="field__input" type="text" name="altno" id="Alternate no." />
        </label>
      </div>
      <hr />
      <input class="button" id="savedetail" type="submit"  name="save" value="Next"></input>
  </div>
  </form>
</body>

</html>