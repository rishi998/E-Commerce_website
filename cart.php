<?php include("connection.php");
if (isset($_POST['pay'])) {
    header("location:address.php");
    $_SESSION['proceed'] = "gg";
}
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
                <li id="lg-bag"><a class="active" href="cart.php"><i class="fas fa-shopping-bag"></i></a></li>
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

    <section id="page-header" class="about--header">
        <h2>#Great_Choice</h2>
        <p>THANKYOU , For showing your trust!</p>
    </section>
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>SNo.</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                    <td><i class="far fa-times-circle"></i></td>
                </tr>

            </thead>
            <tbody>
              


                    <?php
                    $sn=1;
                    $tt=0;
                    $sql = mysqli_query($conn, "SELECT * FROM cart");
                    while ($row = mysqli_fetch_assoc($sql)) {
                        
                        $id = $row['id'];
                        $image = $row['image'];
                        $name = $row['name'];
                        $price = $row['price'];
                        $amt = $row['total'];
                        $qty = $row['qty']; 
                        $amtt=$qty*$amt;
                        ?>
                          <tr>
                        <td><?php echo $sn.".";?></td>
                        <td><img src="img/dynamic_image/<?php echo $image;?>"></td>
                        <td><?php echo $name;?></td>
                        <td><?php echo "₹".$price;?></td>
                        <td><form method="post"><input type="number" name="qty" min="0" value="1" ></form></td>
                        <td><?php echo "₹".$amtt;?></td>
                        <td><a href="cart_d.php?id=<?php echo $id?>"><i class="far fa-times-circle" style="color:black"></i></a></td>
                          </tr>
                    <?php
                    $sn++;
                    $tt+=$amt;
                    }
                    ?>
               
            </tbody>
        </table>
    </section>
    <section id="cart-add">
        <div id="coupon">
            <h3>Apply Coupon</h3>
            <div>
                <input type="text" placeholder="Enter Your Coupon">
                <button class="normal">Apply</button>
            </div>
        </div>
        <div id="subtotal">
            <h3>Order:</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td><?php echo "₹"." ".$tt;?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>

                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong><?php echo "₹"." ".$tt;?></strong></td>
                </tr>
            </table>
            <form method="post">
                <input class="yy" name="pay" type="submit" value="Proceed to checkout"></input>
            </form>
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