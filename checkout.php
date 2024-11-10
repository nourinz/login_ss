<?php

if(!(isset($_COOKIE['user']))){
    header("location:index.php");
    exit();

}

include('config.php');
$stmt2 = $con->prepare('SELECT id FROM users WHERE username = ?');
$stmt2 ->execute([$_COOKIE['user']]);
$userid = $stmt2->fetch();

$stmt = $con->prepare('SELECT COUNT(id) FROM cart WHERE userid = ? ');
$stmt ->execute([$userid['id']]);
$Number_of_product=$stmt->fetchColumn();


$stmt = $con->prepare('SELECT SUM(price) FROM cart WHERE userid = ? ');
$stmt ->execute([$userid['id']]);
$Total_price=$stmt->fetchColumn();



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>Document</title>
</head>
<body>
<div class="header">
        <div class="container">
            <a href class="logo"><span>A</span>karatona</a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#shop">Shop</a></li>
                <li><a href="index.php#footer">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="center">
        <div class="form">
            <form action="checkout_insert.php" id="form" method="post">
                <h1>Check out</h1>
                <div class="two-input">
                    <div class="input-box">
                        <input type="text" placeholder="First name" id="first" name="first">
                        <i class="fa-solid fa-user"></i>
                        <p class="username-er"></p>
                    </div>
                    <div class="input-box">
                    <input type="text" placeholder="Last name" id="last" name="last">
                    <i class="fa-solid fa-user"></i>
                    <p class="username-er"></p>
                    </div>
                </div>
                
                <div class="input-box">
                    <input type="text" placeholder="E-mail" id="email" name="email">
                    <i class="fa-solid fa-envelope"></i>
                    <p class="email-er"></p>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Address" id="address" name="address">
                    <i class="fa-solid fa-house"></i>
                    <p class="password-er"></p>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Phone number" id="phone" name="phone">
                    <i class="fa-solid fa-house"></i>
                    <p class="password2-er"></p>
                </div>
                    <input type="hidden" value="<?php echo $Number_of_product;?>" name ="pro_number">
                    <input type="hidden" value="<?php echo $Total_price;?>" name ="total_price">
                    <input type="hidden" value="<?php echo $userid['id'];?>" name ="userid">
                    <p class="info">Number of product: <?php echo $Number_of_product;?></p>
                    <p class="info">Total price:<?php echo $Total_price;?></p>
                    <button type="submit">Place order</button>
                
            </form>
        </div>
    </div>
</body>
</html>