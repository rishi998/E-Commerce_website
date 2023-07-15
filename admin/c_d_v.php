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
if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    
    $sql=mysqli_query($conn,"DELETE FROM users WHERE id=$id");
    if($sql==TRUE){
     $_SESSION['deleted']="<p class='text-danger'>User Deleted Successfully!</p>";
     header("location:customers.php");
    }
    else{
        $_SESSION['e-deleted']="<p class='text-danger'>Error Removing User!</p>";   
        header("location:customers.php");
    }
    

}
?>