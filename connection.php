<?php
$host = "localhost";
$uname= "root";
$pwd = "";
$database = "users_db";
try {
    $pdoconn = new PDO("mysql:host=$host; dbname=$database", $uname, $pwd);

}
catch(PDOException $e)
{
    die("Can not access DB ".$database.", ".$e->getMessage());
}
?>