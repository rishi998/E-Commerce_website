<?php include('connection.php');
if (!empty($_SESSION['me'])) {
  $username = $_SESSION['me'];
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


  <section id="prodetails" class="section-p1">
    <div class="single-pro-image">
      <img src="img/products/f1.jpg" width="100%" alt="">

    </div>
    <div class="single-pro-details">
      <?php
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
        while ($row = mysqli_fetch_assoc($sql)) {
          $name = $row['p_name'];
          $image = $row['p_image'];
          $price = $row['p_price'];
          $disc = $row['p_disc'];
          $cat = $row['category'];
      ?>
          <h6>"Home / <?php echo $cat; ?>"</h6>
          <h4><?php echo $name; ?></h4>
          <h2><?php echo $price; ?></h2>
          <button href="cart_a.php?id=<?php echo $id; ?>" class="normal">Add To Cart</button>
          <h4><?php echo "₹" . $price; ?></h4>
          <span><?php echo $disc; ?></span><?php
                                          }
                                        } ?>


    </div>
  </section>


  <section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p> Summer Collection New Morden Design</p>
    <div class="pro-container">
      <?php
      $sql = mysqli_query($conn, "SELECT * FROM products");
      while ($row = mysqli_fetch_assoc($sql)) {
        $id = $row['id'];
        $image = $row['p_image'];
        $name = $row['p_name'];
        $price = $row['p_price'];
        $about = $row['p_disc']; ?>
        <div class="pro">
          <img src="img/dynamic_image/<?php echo $image ?>" alt="">
          <div class="des">
            <span>Free Shiping</span>
            <h5><?php echo $name ?></h5>
            <h4><?php echo "₹" . $price ?></h4>
          </div>
          <a href="cart_a.php?id=<?php echo $id; ?>"><i class="fal fa-shopping-cart cart"></i></a>
        </div><?php
            }
              ?>


    </div>
  </section>


  <section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
      <h4>Sign Up For Newsletters</h4>
      <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
    </div>
    <div class="form">
      <input type="text" placeholder="Your email address">
      <button class="normal">Sign Up</button>
    </div>
  </section>


  <footer class="section-p1">
    <div class="col">
      <img class="logo" src="img/brandd.png" alt="">
      <h4>Contact</h4>
      <p><strong>Address: </strong> Institute Of Technology, G/Floor<br> Dwarka Sector 9,New Delhi, Delhi
        110077</p>
      <p><strong>Phone: </strong>+91: 1800-2424-83838</p>
      <p><strong>Email: </strong>support.cara@helpdesk.com</p>
      <p><strong>Hours: </strong>9.00am to 7.00pm , Mon-Fri</p>
      <div class="follow">
        <h4>Follow us</h4>
        <div class="icon">
          <i class="fab fa-facebook-f"></i>
          <i class="fab fa-twitter"></i>
          <i class="fab fa-instagram"></i>
          <i class="fab fa-pinterest-p"></i>
          <i class="fab fa-youtube"></i>
        </div>
      </div>
    </div>
    <div class="col">
      <h4>About</h4>
      <a href="#">About us</a>
      <a href="#">Delivery Information</a>
      <a href="#">Privacy Policy</a>
      <a href="#">Term & Condition</a>
      <a href="#">Contact us</a>
    </div>
    <div class="col">
      <h4>My Account</h4>
      <a href="#">Sign In</a>
      <a href="#">View Cart</a>
      <a href="#">My Wishlist</a>
      <a href="#">Track My Order</a>
      <a href="#">Help</a>
    </div>
    <div class="col install">
      <h4>Install App</h4>
      <p>From App Store or Google Play</p>
      <div class="row">
        <img src="img/pay/app.jpg" alt="">
        <img src="img/pay/play.jpg" alt="">
      </div>
      <p>Secured Payment Gateways</p>
      <img src="img/pay/pay.png" alt="">
    </div>
    <div class="copyright">
      <p>© Copyright 2023, Managed By - <a href="https://github.com/Yashgarg1970">Yash Garg</a><a href="https://github.com/Gulshankumar22">&nbsp • Gulshan Kumar</a><a href="https://github.com/rishi998">&nbsp • Rishi Mehto</a></p>
    </div>
  </footer>


  <script>


  </script>
</body>

</html>