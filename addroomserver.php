<?php
//addserver_page.php
include("data_class.php");



$roomno=$_GET['roomno'];
$avail=$_GET['avail'];
$status=$_GET['status'];
$roomprice=$_GET['roomprice'];
$bedtype=$_GET['bedtype'];



if($roomno==null||$avail==null||$status==null||$roomprice==null||$bedtype==null){
    
   	header("Location: addrooms.php");
}
elseif (!preg_match("/^[0-9]{3}$/i",$roomno)) {
	$message="Enter a valid room no";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/addrooms.php";';
            echo '</script>';
}
else
{
	$obj=new data();
	$obj->setconnection();
	$obj->addroom($roomno,$avail,$status,$roomprice,$bedtype);
}



?>