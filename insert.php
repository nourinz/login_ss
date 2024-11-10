<?php
include("config.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];

    $stmt=$con->prepare('INSERT INTO users(username,email,password,password2)Values(?,?,?,?)');
    $stmt->execute([$username,$email,$password,$password2]);
    $count=$stmt->rowCount();
    if($count>0){
        setcookie("user",$username,strtotime("+1 year"));
        header("location:index.php");
        exit();    
    }
}else{
    header("location:index.php");
    exit();
}
?>