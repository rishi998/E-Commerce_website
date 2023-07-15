<?php include('connection.php');
if (!empty($_SESSION['log-in'])) {
    $username = $_SESSION['log-in'];
}
?>
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql=mysqli_query($conn,"SELECT * FROM products WHERE id=$id;");
    while($row=mysqli_fetch_assoc($sql)){
        $name=$row['p_name'];
        $image=$row['p_image'];
        $price=$row['p_price'];
    }

$sql=mysqli_query($conn,"INSERT INTO cart SET name='$name',image='$image',price='$price',qty=1,total=$price");
header("location:cart.php");
}
?>
