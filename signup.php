
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>Sign up</title>
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
            <form action="insert.php" id="form" method="post">
                <h1>Sign up</h1>
                <p class="check">Please check your data</p>
                <div class="input-box">
                    <input type="text" placeholder="Username" id="username" name="username">
                    <i class="fa-solid fa-user"></i>
                    <p class="username-er"></p>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="E-mail" id="email" name="email">
                    <i class="fa-solid fa-envelope"></i>
                    <p class="email-er">Please enter your E-mail</p>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" id="password" name="password">
                    <i class="fa-solid fa-lock"></i>
                    <p class="password-er">Please enter your Password</p>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Confirm Password" id="password2" name="password2">
                    <i class="fa-solid fa-lock"></i>
                    <p class="password2-er">Please enter your Confirm Password</p>
                </div>
                <button type="submit">Sign up</button>
                <p class="link">Already have an account? <a href="signin.php">Sign in</a></p>
            </form>
        </div>
    </div>
    <script src="js/signup.js"></script>
</body>
</html>