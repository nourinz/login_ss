<?php 
if(!(isset($_COOKIE['user']))){
    header("location:index.php");
    exit();

}
include('config.php');
$stmt2 = $con->prepare('SELECT id FROM users WHERE username = ?');
$stmt2 ->execute([$_COOKIE['user']]);
$userid = $stmt2->fetch();

$stmt = $con->prepare('SELECT *FROM cart WHERE userid = ? ');
$stmt ->execute([$userid['id']]);
$carts =$stmt->fetchAll();
$count =$stmt->rowCount();
if($count>0){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cart.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="container">
            <a href class="logo"><span>A</span>karatona</a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#shop">Shop</a></li>
                <li><a href>Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="table">
        <div class="container">
        <div class="main-text">
                Your Cart :
        </div>
            <table>
                <thead>
                    <tr>
                        <td>Image</td>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Control</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($carts as $cart) {?>
                    <tr>
                        <td><img src="<?php echo $cart['image']?>" alt=""></td>
                        <td><?php echo $cart['name']?></td>
                        <td><?php echo "$" . $cart['price']?></td>
                        <td><a href="delete.php?id= <?php echo $cart['id'] ?>"><button>Delete</button></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="check-out">
                <a href="checkout.php"><button>Check out</button></a>
            </div>
        </div>
    </div>
</body>
</html>
<?php }
else{
  echo "<p style =' display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #088178;
    font-size: 25px;
    font-weight: bold;'>Your cart is empty, you will redirect after 5 seconds</p>";   
    header("refresh:5;url=index.php#shop");
    exit();
}?>
