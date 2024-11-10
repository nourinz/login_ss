<?php
include("config.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];  
    
    $stmt=$con->prepare('SELECT username,password FROM users WHERE username =? AND password = ?');
    $stmt->execute([$username,$password]);
    $count=$stmt->rowCount();
    if($count>0){
        setcookie("user",$username,strtotime("+1 year"));
        header("location:index.php");
        exit();    
    }else{
        $error='<p style ="margin-bottom:10px;
        color:red;
        font-size:17px;
        font-weight:bold;">Username our password incorrect</p>';
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>Sign in</title>
</head>
<body>
    <div class="header">
        <div class="container">
            <a href class="logo"><span>A</span>karatona</a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#shop">Shop</a></li>
                <li><a href="index.php#footer">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="center">
        <div class="form" >
            <form action="" id="form" method="POST">
                <h1>Sign in</h1>
                <p class="check">Please check your data</p>
                <?php if(isset($error)){
                        echo $error;
                }?>
                <div class="input-box">
                    <input type="text" placeholder="Username" id="username" name="username" value="<?php if(isset($username))echo $username;?>">
                    <i class="fa-solid fa-user"></i>
                    <p class="username-er"></p>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" id="password" name ="password">
                    <i class="fa-solid fa-lock"></i>
                    <p class="password-er">Please enter your Password</p>
                </div>
                <button type="submit">Sign in</button>
                <p class="link">Don't have Account? <a href="signup.php">Create</a></p>
            </form>
        </div>
    </div>
    <script src="js/signin.js"></script>
</body>
</html>