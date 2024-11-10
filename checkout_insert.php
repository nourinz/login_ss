<?php

if($_SERVER ['REQUEST_METHOD']=="POST"){
include("config.php");
$first_name=$_POST['first'];
$last_name=$_POST['last'];
$email=$_POST['email'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$pro_number=$_POST['pro_number'];
$total_price=$_POST['total_price'];
$userid=$_POST['userid'];

echo $first_name;
echo $last_name;
echo $email;
echo $address;
echo $phone;
echo $pro_number;
echo $total_price;
echo $userid;


$stmt=$con->prepare('INSERT INTO orders(first_name,last_name,email,address,phone,product_number,total_price,userid)Values(?,?,?,?,?,?,?,?)');
$stmt->execute([$first_name,$last_name,$email,$address,$phone,$pro_number,$total_price,$userid]);
$stmt2 =$con->prepare('DELETE FROM cart WHERE userid=?');
$stmt2->execute([$userid]);

$count=$stmt2->rowCount();

if($count>0){
    header("location:index.php");
    exit();    
}

}else{
    header("location:index.php");
    exit();
}

?>