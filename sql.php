<?php
$servername="localhost";
$username="root";
$password="";
$dbname="form2";

$con=mysqli_connect($servername,$username,$password,$dbname);

if(!$con)
echo "Error in inserting record".mysqli_connect_error();
?>