<?php include('connection.php');
if (!empty($_SESSION['log-in'])) {
    $username = $_SESSION['log-in'];
}
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql2 = mysqli_query($conn, "DELETE FROM cart WHERE id=$id");
    if ($sql == TRUE) {
        $_SESSION['deleted'] = "<p class='text-danger'>Item Removed Successfully!</p>";
        header("location:cart.php");
    } else {
        $_SESSION['e-deleted'] = "<p class='text-danger'>Error Removing Item!</p>";
        header("location:cart.php");
    }
}
