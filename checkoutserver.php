<?php
//addserver_page.php
include("data_class.php");



$idnumber=$_GET['idnum'];





if($idnumber==null){
    
   	header("Location: checkout.php");
}
elseif (!preg_match("/^[0-9]{10}$/i",$idnumber)) {
	$message="Enter a valid id no";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/checkout.php";';
            echo '</script>';
}
else
{
	$obj=new data();
	$obj->setconnection();
	$obj->checkout($idnumber);
}


?>