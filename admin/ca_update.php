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
    header("location:category.php");
    exit;
}
if (isset($_POST['save'])) {

    // ----------------iMAGE-------------------
    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];
        if ($image_name != "") {
            $ext = end(explode('.', $image_name));
            // ---------------create random name-------------
            $image_name = "Shop-cara" . rand(0, 999999) . "." . $ext;
            // ------------source-path------------
            $src = $_FILES['image']['tmp_name'];
            // ------------destination-path------------
            $dest = "../img/dynamic_image/category/". $image_name;
            // --------------upload-image-----------------
            $upload = move_uploaded_file($src, $dest);
            //---------check-image-uploaded-----------
            if ($upload == FALSE) {
                $_SESSION['deleted'] = "<p class='text-danger'>Image Upload error!</p>";
                header("location:ca_update.php");
                die();
            }
        }
    }
    // --------end------------------
    $name = $_POST['name'];
    $sql = mysqli_query($conn, "UPDATE categories SET c_name='$name', c_image='$image_name' WHERE id=$id;");
    if ($sql == TRUE) {
        header('location:category.php');
        $_SESSION['deleted'] = "<p class='text-success'>Category Updated Successfully!</p>";
    } else {
        header('location:category.php');
        $_SESSION['e-deleted'] = "<p class='text-danger'>Error Updating Category!</p>";
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
                <li><a href="orders.php">Orders</a></li>
                <li><a  href="products.php">Products</a></li>
                <li><a class="active" href="category.php">Category</a></li>
                <?php
                if (empty($username)) {
                ?>
                    <li id="lg-bag"><a href="login.php"><i class="fa-solid fa-user"></i></a></li>
                <?php
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
    <section id="p-info">
        <h1 style="text-align: center;margin-top:3%">Update Category</h1>
        <!-- customer info -->
        <div class="infor">
            <?php
            $sql = mysqli_query($conn, "SELECT * FROM categories WHERE id='$id'");
            if ($sql == TRUE) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $c_i = $row['c_image'];
                    $name = $row['c_name'];
                   
                }
            }

            ?>
            <table style="margin:2% 2%;">
                <thead class="text-center">
                    <tr>
                        <td class="px-2 text-wrap">Image</td>
                        <td class="px-3">Name</td>
                        
                        <td class="px-3">Action</td>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <form method="post" class="gg" enctype="multipart/form-data">
                            <td style="padding:10px">
                                <input type="file" class="form-control form-control-sm" accept=".jpg,.jpeg,.png" name="image" style="padding:2%;">

                            </td>
                            <td>

                                <input class="text-center form-control" type="text" name="name" value="<?php echo $name ?>">

                            </td>
                            <td>
                                <button type="submit" name="save" class="btn btn-sm btn-warning">Update</button>
                            </td>
                        </form>
                    </tr>

                </tbody>
            </table>
            <?php
            if (isset($_SESSION['deleted'])) {
                echo $_SESSION['deleted'];
                unset($_SESSION['deleted']);
            } ?>

        </div>
        <div class="back">

            <a class="btn btn-primary btn" href="category.php">Back</a>
        </div>
    </section>
</body>

</html>