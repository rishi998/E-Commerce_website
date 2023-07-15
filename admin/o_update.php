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
<?php
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    header("location:orders.php");
    exit;
}
if (isset($_POST['save'])) {
    $val = $_POST['values'];
    if ($val == 1 or $val == 2 or $val == 3) {
        if ($val == 1) {
            $sql = mysqli_query($conn, "UPDATE orders SET status='placed' WHERE id=$id");
            header("location:orders.php");
        } elseif ($val == 2) {
            $sql = mysqli_query($conn, "UPDATE orders SET status='on_delivery' WHERE id=$id");
            header("location:orders.php");

        } elseif ($val == 3) {
            $sql = mysqli_query($conn, "UPDATE orders SET status='delivered'WHERE id=$id");
            header("location:orders.php");

        }
    } else {
        header("location:orders.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

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
                <li><a href="index.php">Home</a></li>
                <li><a href="customers.php">Customers</a></li>
                <li><a class="active" href="orders.php">Orders</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="category.php">Category</a></li>
                <?php
                if (empty($username)) {
                ?>
                    <li id="lg-bag"><a href="login.php"><i class="fa-solid fa-user"></i></a></li><?php
                                                                                                } else {
                                                                                                    ?>
                    <li id="lg-bag"><a><i class="fa-solid fa-user dropbtn" onclick="myFunction()"></i>&nbsp<?php echo $username; ?></a></li>
                    <div id="myDropdown" class="dropdown-content">
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
    <section id="o-info">
        <h1 style="text-align: center;">Update Order</h1>
        <!-- customer info -->
        <div class="infor">

            <table style="margin-left:2%;margin-right:2%;">
                <thead class="text-center">
                    <tr>
                        <td class="px-3">Order_ID</td>
                        <td class="px-2">Customer Name</td>
                        <td class="px-5 text-wrap">Address</td>
                        <td class="px-5">Bill</td>
                        <td class="px-3">Transaction-ID</td>
                        <td class="px-2">Trx-Available</td>
                        <td class="px-3">Update Status</td>
                        <td class="px-3">Action</td>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM orders WHERE id='$id'");
                    if ($sql == TRUE) {
                        while ($row = mysqli_fetch_assoc($sql)) {
                            $o_id = $row['order_id'];
                            $name = $row['u_name'];
                            $address = $row['address'];
                            $price = $row['order_price'];
                            $trx = $row['trx_id'];
                            $trx_a = "";
                            $query = mysqli_query($conn, "SELECT * FROM payment WHERE username ='$name'");
                            if ($query == TRUE) {
                                $status = $row['status'];
                                if ($status == "OK") {
                                    $trx_a = "Verified";
                                } elseif ($status == "NONE") {
                                    $trx_a = "No Transaction";
                                } else {
                                    $trx_a = "-";
                                }
                            }
                    ?>
                            <tr>
                                <td><?php echo $o_id; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $address; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $trx; ?></td>
                                <td><?php echo $trx_a; ?></td>
                                <td>
                                    <form method="post">
                                        <select class="form-select form-select-sm" name="values">
                                            <option class="selected" value="0">-</option>
                                            <option class="text-primary fw-bold" value="1">Placed</option>
                                            <option class="text-success fw-bold" value="2">Out For Delivery</option>
                                            <option class="text-secondary fw-bold" value="3">Delivered</option>
                                        </select>

                                </td>
                                <td>
                                    <button type="submit" name="save" class="btn btn-sm btn-warning">Update</button>
                                </td>
                                </form>
                            </tr><?php

                                }
                            }
                                    ?>

                </tbody>
            </table>


        </div>
        <div class="back">

            <a class="btn btn-primary btn" href="orders.php">Back</a>
        </div>
    </section>
</body>

</html>