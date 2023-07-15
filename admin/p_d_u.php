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
if (isset($_GET['id']) and isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];

    if ($type == "delete") {
        $sql = mysqli_query($conn, "SELECT * FROM  products WHERE id=$id");
        while($row=mysqli_fetch_assoc($sql)){
            $image=$row['p_image'];
        }
        $sql2 = mysqli_query($conn, "DELETE FROM products WHERE id=$id");
        if ($sql == TRUE) {
            if($image!=""){
                $removepath="../img/dynamic_image/".$image;
                $remove=unlink($removepath);
            }
            $_SESSION['deleted'] = "<p class='text-danger'>Product Removed Successfully!</p>";
            header("location:products.php");
        } else {
            $_SESSION['e-deleted'] = "<p class='text-danger'>Error Removing Product!</p>";
            header("location:products.php");
        }
    }
    elseif ($type == "update") {
        $_SESSION['id']=$id;
       header("location:p_update.php");
       

    }
    else{
        header("location:products.php");
    }
}
?>