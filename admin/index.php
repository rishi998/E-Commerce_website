<?php include('../connection.php');
if (!empty($_SESSION['log-in'])) {
  $username = $_SESSION['log-in'];
}
if (empty($_SESSION['log-in'])) {
  $_SESSION['failed'] = "<div style='color:#ed8585;'><span class='rr' style='width:fit-content;margin-left:10%;padding-top:5px;color:white,font-size:15px;font-weight:500;'>Login In First !</span><div>";
  header("location:login.php");
  die();
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
  <link rel="manifest" href="img/favicon/site.webmanifest">
</head>

<body>
  <section id="header">
    <a href="#"><img src="../img/brandd.png" class="logo" alt=""></a>
    <div>
      <ul id="navbar">
        <?php
        if (empty($username)) {
        ?>
          <li id="lg-bag"><a href="login.php"><i class="fa-solid fa-user"></i></a></li><?php
                                                                                      } else {
                                                                                        ?>
          <li id="lg-bag"><a><i class="fa-solid fa-user dropbtn" onclick="myFunction()"></i>&nbsp<?php echo $username; ?></a></li>
          <div id="myDropdown" class="dropdown-content" style="margin:106px  0 0 19px">
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> &nbsp Logout</a>
          </div>
        <?php
                                                                                      }
        ?>

      </ul>
    </div>
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

  </section>
  <section id="main">
    <div class="info-box">

      <div class="box">
        <h4>Customers</h4>
        <h2>
          <?php
          $sql=mysqli_query($conn,"SELECT * FROM users;");
          $count=mysqli_num_rows($sql);
          echo "$count";
          ?> 
        </h2>
        <span><a href="customers.php"><i class="fas fa-angle-right"></i></a></span>
      </div>
      <div class="box">
        <h4>Orders</h4>
        <h2>
        <?php
          $sql=mysqli_query($conn,"SELECT * FROM orders;");
          $count=mysqli_num_rows($sql);
          echo "$count";
          ?>

        </h2>
        <span><a href="orders.php"><i class="fas fa-angle-right"></i></a></span>

      </div>
      <div class="box">
        <h4>Products</h4>
        <h2 style="font-weight:400">
        <?php
          $sql=mysqli_query($conn,"SELECT * FROM products;");
          $count=mysqli_num_rows($sql);
          echo "$count";
          ?>
        </h2>
        <span><a href="products.php"><i class="fas fa-angle-right"></i></a></span>

      </div>
      <div class="box">
        <h4>Categories</h4>
        <h2>
        <?php
          $sql=mysqli_query($conn,"SELECT * FROM categories;");
          $count=mysqli_num_rows($sql);
          echo "$count";
          ?>
        </h2>
        <span><a href="category.php"><i class="fas fa-angle-right"></i></a></span>

      </div>
    </div>
  </section>
</body>

</html>