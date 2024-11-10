<?php

include("config.php");
if(isset($_GET['name']) && isset($_GET['image']) && isset($_GET['price']) && isset($_GET['userid'])){

$name=$_GET['name'];
$image=$_GET['image'];
$price=str_replace("$","", $_GET['price']);
$userid=$_GET['userid'];

    $stmt=$con->prepare('INSERT INTO cart(name,image,price,userid)Values(?,?,?,?)');
    $stmt->execute([$name,$image,$price,$userid]);
    $count=$stmt->rowCount();
    if($count>0){
        header("location:cart.php");
        exit();    
    }
}else{
    header("location:index.php");
    exit();
}
?>