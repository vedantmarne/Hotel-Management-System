<?php
//addserver_page.php
include("data_class.php");



$identity=$_GET['identity'];
$idno=$_GET['idno'];
$cname=$_GET['cname'];
$cgender=$_GET['cgender'];
$country=$_GET['country'];
$croomno=$_GET['croomno'];
$checkedin=$_GET['checkedin'];
$deposit=$_GET['deposit'];



if($identity==null||$idno==null||$cname==null||$cgender==null||$country==null||$croomno==null||$checkedin==null||$deposit==null){
    
   	header("Location: newcustomer.php");
}
elseif (!preg_match("/^[0-9]{3}$/i",$croomno)) {
	$message="Enter a valid room no";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/newcustomer.php";';
            echo '</script>';
}
elseif (!preg_match("/^[0-9]{10}$/i",$idno)) {
	$message="Enter a valid id no";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/newcustomer.php";';
            echo '</script>';
}
elseif (!preg_match("/^[A-Za-z]+$/i",$cname)) {
	$message="Name should contain only characters";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/newcustomer.php";';
            echo '</script>';
}
elseif (!preg_match("/^[A-Za-z]+$/i",$country)) {
	$message="Country should contain only characters";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/newcustomer.php";';
            echo '</script>';
}
elseif (!preg_match("/^[A-Za-z]+$/i", $checkedin)) {
	$message="Checked in should contain only characters";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/newcustomer.php";';
            echo '</script>';
}
else
{
	$obj=new data();
	$obj->setconnection();
	$obj->newcustomer($identity,$idno,$cname,$cgender,$country,$croomno,$checkedin,$deposit);
}



?>