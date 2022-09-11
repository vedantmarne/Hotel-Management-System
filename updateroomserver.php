<?php
//addserver_page.php
include("data_class.php");



$roomno=$_GET['roomno'];
$status=$_GET['status'];




if($roomno==null||$status==null){
    
   	header("Location: updaterooms.php");
}
elseif (!preg_match("/^[0-9]{3}$/i",$roomno)) {
	$message="Enter a valid room no";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/updateroom.php";';
            echo '</script>';
}
else
{
	$obj=new data();
	$obj->setconnection();
	$obj->updateroom($roomno,$status);
}



?>