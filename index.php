<?php
include('config.php');

$stmt = $con->prepare('SELECT *FROM products');
$stmt ->execute();
$products =$stmt->fetchAll();

if(isset ($_COOKIE['user'])){
    $stmt2 = $con->prepare('SELECT id FROM users WHERE username = ?');
    $stmt2 ->execute([$_COOKIE['user']]);
    $userid = $stmt2->fetch();
}


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/all.min.css">
        <title>Home</title>
    </head>
    <body>
        <div class="header">
            <div class="container">
                <a href class="logo"><span>A</span>karatona</a>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="#shop">Shop</a></li>
                    <li><a href="#footer">Contact</a></li>
                    <?php 
                    if(isset ($_COOKIE['user'])){?>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="signout.php">Sign out</a></li>
                    <?php }?>
                </ul>
            </div>
        </div>
        <div class="landing">
            <div class="container">
                <div class="text">
                    <p class="first">Lorem ips elit. Aspernatur aut dol</p>
                    <?php if(isset($_COOKIE['user'])){?>
                        <h1>Hi,<?php echo $_COOKIE["user"];?> Welcome to our store</h1>
                    <?php }else{?>
                        <h1>Welcome to our store</h1>
                        <?php } ?>
                    
                    <p class="two">Lorem ipsu elit.Enim nihil, nesciunt r</p>
                    <a href>Lets Start</a>
                </div>
                <img src="images/house.jpg" alt="Hello" />
            </div>
        </div>

        <div class="pro_landing" id="shop">
            <div class="main-text">
                Our Product

            </div>
            <div class="container">
                <?php foreach($products as $product) {
                ?>
                <div class="cart">
                    <img src="<?php echo $product['image']?>" alt>
                    <div class="des">
                        <span>New York</span>
                        <h4><?php echo $product['name']?></h4>
                        <div class="rate">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                            <h3><?php echo $product['price']?></h3>
                        </div>
                        <?php if(isset ($_COOKIE['user'])){?>
                        <a href="cartinsert.php?name=<?php echo $product['name']?>&image=<?php echo $product['image']?>&price=<?php echo $product['price']?>&userid=<?php echo $userid['id'] ?>"><i class="fa-solid fa-cart-shopping"></i> </a>
                        <?php }else{?>
                        <a href="signin.php" style="color :var(--main-color) ; ">Please sign in before add to cart</a>    
                        <?php }?>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>

        <div class="footer" id="footer">
            <div class="container">
                <a href class="logo"><span>A</span>karatona</a>
                <a href class="logo2">obey_221075</a>
                <ul>
                    <li><a href>Home</a></li>
                    <li><a href="#shop">Shop</a></li>
                    <li><a href="signup.php">Sign up</a></li>
                </ul>
                <div class="social">
                    <a href><i class="fa-brands fa-facebook"></i></a>
                    <a href></a><i class="fa-brands fa-instagram"></i></a>
                    <a href><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="copy">
                &copy; 2024 <span>A</span>karatona all rights reserved
            </div>
        </div>
    </body>
</html>