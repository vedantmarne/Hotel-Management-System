<?php
//addserver_page.php
include("data_class.php");



$dname=$_GET['dname'];
$dage=$_GET['dage'];
$dgender=$_GET['dgender'];
$carcompany=$_GET['carcompany'];
$carbrand=$_GET['carbrand'];
$available=$_GET['available'];
$location=$_GET['location'];



if($dname==null||$dage==null||$dgender==null||$carcompany==null||$carbrand==null||$available==null||$location==null){
    
   	header("Location: adddriver.php");
}
elseif (!preg_match("/^[0-9]{2}$/i",$dage)) {
		$message="Enter a valid age";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/adddriver.php";';
            echo '</script>';
}
elseif (!preg_match("/^[A-Za-z]+$/i",$dname)) {
	$message="Name should contain only characters";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/adddriver.php";';
            echo '</script>';
}
elseif (!preg_match("/^[A-Za-z]+$/i",$carcompany)) {
	$message="Car company should contain only characters";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/adddriver.php";';
            echo '</script>';
}
elseif (!preg_match("/^[A-Za-z]+$/i",$carbrand)) {
	$message="Car brand should contain only characters";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/adddriver.php";';
            echo '</script>';
}
elseif (!preg_match("/^[A-Za-z]+$/i",$location)) {
	$message="Car location should contain only characters";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/adddriver.php";';
            echo '</script>';
}
else
{
	$obj=new data();
	$obj->setconnection();
	$obj->adddriver($dname,$dage,$dgender,$carcompany,$carbrand,$available,$location);
}



?>