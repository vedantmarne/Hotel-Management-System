<?php
//addserver_page.php
include("data_class.php");



$idnumber=$_GET['idnumb'];
$roomnumber=$_GET['roomno'];
$custname=$_GET['custname'];
$checkedin=$_GET['checkedin'];
$amtpaid=$_GET['amtpaid'];




if($idnumber==null||$roomnumber==null||$custname==null||$checkedin==null||$amtpaid==null){
    
   	header("Location: updatecheck.php");
}
elseif (!preg_match("/^[0-9]{10}$/i",$idnumber)) {
	$message="Enter a Valid id no";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/updatecheck.php";';
            echo '</script>';
}
elseif (!preg_match("/^[0-9]{3}$/i",$roomnumber)) {
	$message="Enter a valid roomnumber";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/updatecheck.php";';
            echo '</script>';
}
elseif (!preg_match("/^[A-Za-z]+$/i",$custname)) {
		$message="Name should contain only characters";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/updatecheck.php";';
            echo '</script>';
}
elseif (!preg_match("/^[A-Za-z]+$/i",$checkedin)) {
	 $message="Checked-in should contain only characters";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/updatecheck.php";';
            echo '</script>';
}
else
{
	$obj=new data();
	$obj->setconnection();
	$obj->updatecheck($idnumber,$roomnumber,$custname,$checkedin,$amtpaid);
}