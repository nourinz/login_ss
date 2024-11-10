<?php



$host = "mysql:host=localhost;dbname=acaratona";
$user ="root";
$password="";
try{
    $con = NEW PDO($host,$user,$password);
}
catch(PDOException $e){
    $e->getMessage();
}


?>