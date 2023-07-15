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
                <li><a href="orders.php">Orders</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a class="active" href="category.php">Category</a></li>
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
    <section id="c-info">
        <h1 style="text-align: center;">Category Information</h1>
        <!-- customer info -->
        <div class="search">
            <form method="post">
                <input type="text" name="c_name" placeholder="" required>
                <button type="submit" class="btn btn-primary btn-sm" name="srch"><span class="fa fa-search fa-sm"></span> &nbspSearch</button>

                <p style="margin-left:3%;">
                    <?php
                    if (isset($_SESSION['deleted'])) {
                        echo $_SESSION['deleted'];
                        unset($_SESSION['deleted']);
                    }
                    if (isset($_SESSION['e-deleted'])) {
                        echo $_SESSION['e-deleted'];
                        unset($_SESSION['e-deleted']);
                    }
                    ?>
                </p>
                <a  style="margin-left:55%" class="btn btn-secondary btn-sm" href="ca_add.php">Add Category</a>

            </form>
        </div>
        <div class="infor">
            <table style="width:80%;">
                <thead class="text-center">
                    <tr>
                        <td class="px-3">Sno.</td>
                        <td class="px-3">Image</td>
                        <td class="px-3">Name</td>
                        <td class="px-3">Action</td>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php

                    if (isset($_POST['srch'])) {
                        $sno = 1;

                        $name = $_POST['c_name'];
                        $sql = mysqli_query($conn, "SELECT * FROM categories WHERE c_name='$name' ;");
                        $count = mysqli_num_rows($sql);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($sql)) {
                                $id = $row['id'];
                                $name = $row['c_name'];
                                $image = $row['c_image'];

                    ?> <tr>
                                    <td><?php echo $sno; ?>.</td>
                                    <td >
                                        <?php
                                        if($image==""){
                                            echo "-";
                                        }
                                        else{
                                            ?>
                                            <img style="width: 80px;height:50px;" src="../img/dynamic_image/category/<?php echo $image;?>"><?php
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $name; ?></td>
                                    <td>
                                        <a href="ca_d_u.php?id=<?php echo $id ?>&type=<?php echo "update"?>" class="btn btn-warning btn-sm">Update</a>
                                        <a href="ca_d_u.php?id=<?php echo $id ?>&type=<?php echo "delete"?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                    <?php $sno++; ?>

                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="p-4 text-danger" style="font-weight:500">No Category with: <?php echo $name; ?> : Found!</td>
                                <td></td>
                                <td></td>
                            </tr><?php

                                }
                            } else {
                                $query = mysqli_query($conn, "SELECT * FROM categories");
                                $c = mysqli_num_rows($query);
                                if ($c > 0) {
                                    $sn = 1;
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        $id = $row['id'];
                                        $name = $row['c_name'];
                                        $image = $row['c_image'];
                                    ?> <tr>
                                    <td><?php echo $sn; ?>.</td>
                                    <td >
                                        <?php
                                        if($image==""){
                                            echo "-";
                                        }
                                        else{
                                            ?>
                                            <img style="width: 80px;height:50px;" src="../img/dynamic_image/category/<?php echo $image;?>"><?php
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $name; ?></td>
                                   
                                    <td>

                                        <a href="ca_d_u.php?id=<?php echo $id ?>&type=<?php echo "update"?>" class="btn btn-warning btn-sm">Update</a>
                                        <a href="ca_d_u.php?id=<?php echo $id ?>&type=<?php echo "delete"?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                    <?php $sn++; ?>

                                </tr>
                            <?php
                                    }
                                } else {
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="p-5 text-danger" style="font-weight:500">Category Not Found!</td>
                                <td></td>
                                <td></td>
                            </tr><?php
                                }
                            }
                                    ?>

                </tbody>
            </table>

        </div>
    </section>
</body>

</html>