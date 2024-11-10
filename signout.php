<?php
if(isset ($_COOKIE['user'])){
    setcookie("user","dasd",strtotime("-1 year"));
    header("location:index.php");
    exit();
}


?>