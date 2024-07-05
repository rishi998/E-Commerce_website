<?php include('connection.php');
if(!empty($_SESSION['me'])){
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
        <li><a  class="active" href="contact.php">Contact</a></li>
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
    <section id="page-header" class="about-header">
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you!</p>
    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency location or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p>Integrated Institute Of Technology, G/Floor, Complex, Dwarka Sector 9, Dwarka, New Delhi, Delhi
                        110077</p>

                </li>
                <li>
                    <i class="fal fa-envelope"></i>
                    <p>support.cara@helpdesk.com</p>

                </li>
                <li>
                    <i class="fal fa-phone-alt"></i>
                    <p>+91 1800-2424-83838</p>

                </li>
                <li>
                    <i class="fal fa-clock"></i>
                    <p>Monday to Friday: 9.00am to 7.00pm</p>

                </li>
            </div>
        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.5757211638156!2d77.06119741020007!3d28.582500586251154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1b193a4dc58b%3A0x9c097820f11213aa!2sIntegrated%20Institute%20Of%20Technology!5e0!3m2!1sen!2sin!4v1686810428185!5m2!1sen!2sin"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <section id="form-details">
        <form action="">
            <span>Leave A Message</span>
            <h2>We love to hear from you!</h2>
            <input type="text" placeholder="Your Name">
            <input type="text" placeholder="Email">
            <input type="text" placeholder="Subject">
            <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
            <button type="submit" class="normal">Submit</button>
        </form>
        <div class="people">
            <div>
                <img src="img/1668753199005.jpg" alt="">
                <p><span>Yash Garg</span>Backend Developer<br>Phone: +91 8810239956<br>Email:
                    yashgarg1970@gmail.com</p>
            </div>
            <div>

                <img src="img/rishi.jpg" alt="">
                <p><span>Rishi Mehto</span>Front End Developer<br>Phone: +91 7034592910<br>Email:rishimehto.1653@gmail.com
                </p>
            </div>
            <div>
                <img src="img/gulu.jpg" alt="">
                <p><span>Gulshan Kumar</span>Front End Developer<br>Phone: +91 9202239956<br>Email:
                    gulshanborwal.2076@gmail.com</p>
            </div>

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
            <img  class="logo"src="img/brandd.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address: </strong> Institute Of Technology, G/Floor<br> Dwarka Sector 9,New Delhi, Delhi
                110077</p>
                <p><strong>Phone: </strong>+91:  1800-2424-83838</p>
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