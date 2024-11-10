<?php
if(isset($_GET['id'])){

    include("config.php");
    $id =$_GET['id'];
    $stmt =$con->prepare('DELETE FROM cart WHERE id =?');
    $stmt->execute([$id]);
    $count = $stmt-> rowCount();
    if($count>0){
        header("location:cart.php");
        exit();
    }
}
else{
    header("location:index.php");
    exit();
}
?>