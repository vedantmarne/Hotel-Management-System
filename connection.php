<?php

$servername="localhost";
$username="root";
$password="root";
$database="hms";

//creating database connection 

$conn=mysqli_connect($servername,$username,$password,$database);

//checking connection

if(!$conn)
{
	die("Failed to connect".mysqli_connect_error());
}



?>