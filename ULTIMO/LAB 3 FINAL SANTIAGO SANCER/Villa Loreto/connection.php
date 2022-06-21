<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "villaloreto";

$con = mysqli_connect($dbhost , $dbuser , $dbpass , $dbname); 

if(!$con){
    die("fallo la conexión!");
}

?>