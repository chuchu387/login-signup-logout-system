<?php
$server= "localhost";
$username="root";
$password="";
$dbname="registration";

$con= mysqli_connect($server, $username, $password, $dbname);
if(!$con){
    echo "not connected";
}

?>