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
        <li><a class="active" href="blog.php">Blog</a></li>
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

  <section id="page-header" class="blog-header">
    <h2>#readmore</h2>
    <p>Read all case studies about our products! </p>

  </section>
  <section id="blog">
    <div class="blog-box">
      <div class="blog-img">
        <img src="img/blog/b1.jpg" alt="">
      </div>
      <div class="blog-details">
        <h4>The cotton-Jersey Zip up Hoodies</h4>
        <p>When it comes to fashion, visuals are key. It’s no wonder, then, that many lovers of style turn to Instagram and fashion blogs to get their fill of all things fashion.

          Instagram is great when it comes to OOTDs—outfit of the day—and quick style inspirations, but blogs are where the serious fashionistas go to write about trends, advice, and the latest fashion innovations. Not feeling particularly stylish today? Fashion blogs can give you inspiration for dressing well even on those lazy mornings. Got your eye on this season’s hottest trends? These blogs are great for helping you figure out which clothing pieces and colors suit your frame. They can also provide you with ideas about mixing and matching pieces to create a dozen perfect looks without breaking the bank.

          The rise of fashionable Instagram influencers and stylists paved the way for the bloggers on our list to have a significant presence online. Many of these bloggers started out on social media, and their keen eye for style did not go unnoticed by their followers. While they have their own website, most of them continue to be active on Instagram and YouTube....</p>
        <a href="https://firstsiteguide.com/best-fashion-blogs/">CONTINUE READING</a>
      </div>
      <h1>27/06</h1>
    </div>
    <div class="blog-box">
      <div class="blog-img">
        <img src="img/blog/b7.jpg" alt="">
      </div>
      <div class="blog-details">
        <h4>I MOM-TO-BE LOOK PIÙ COOL DI CHIARA FERRAGNI</h4>
        <p>Essere delle “quasi-mamme” non vuol certo dire rinunciare a sfoggiare dei look iconici e incredibilmente al passo con le tendenze che moda comanda. Lo sa bene la nostra Chiara Ferragni, che in procinto di diventare mamma per la seconda volta, non ha mai smesso di stupire il suo popolo di milioni di seguaci con degli outfit che non fanno per niente rimpiangere i tempi delle passerelle e degli eventi mondani. Riuscire a ricreare i suoi look più amati non è poi un compito così arduo se si riesce, come lei sa fare, a mescolare i trend del momento con un bel pancione. Jeans baggy, tute oversize, joggers ma anche shorts carrot fit (per intenderci quelli con la vita arricciata) potrebbero diventare degli ottimi alleati per creare outfit iconici. Abbiamo scelto di selezionare i look che più abbiamo amato, proclamando ancora la nostra musa, regina indiscussa di stile. </p>
        <a href="https://theblondesalad.com/fashion/i-mom-to-be-look-piu-cool-di-chiara-ferragni/">CONTINUE READING</a>
      </div>
      <h1>13/01</h1>
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

  <script src="script.js"></script>
</body>

</html>