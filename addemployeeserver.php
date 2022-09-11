<?php
//addserver_page.php
include("data_class.php");



$ename=$_GET['ename'];
$eage=$_GET['eage'];
$egender=$_GET['egender'];
$ejob=$_GET['ejob'];
$esalary=$_GET['esalary'];
$ephone=$_GET['ephone'];
$eaadhar=$_GET['eaadhar'];
$eemail=$_GET['eemail'];


if($ename==null||$eage==null||$egender==null||$esalary==null||$ephone==null||$eaadhar==null||$eemail==null){
    
   	header("Location: addemployee.php");
}
elseif(!preg_match("/^[0-9]{10}$/i",$ephone)) 
{
            $message="Enter 10 digit mobile number";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/addemployee.php";';
            echo '</script>';
}
elseif (!preg_match("/^[0-9]{12}$/i",$eaadhar)) {
    $message="Enter 12 digit adhaar number";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/addemployee.php";';
            echo '</script>';
}
elseif (!preg_match("/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/i",$eemail)) {
    $message="Enter valid email-id";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/addemployee.php";';
            echo '</script>';
}
elseif (!preg_match("/^[0-9]{2}$/i",$eage)) {
    $message="Enter a valid age";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/addemployee.php";';
            echo '</script>';
}
elseif (!preg_match("/^([a-zA-Z]+\s)*[a-zA-Z]+$/i",$ename)) {
  $message="Name should contain only characters";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/addemployee.php";';
            echo '</script>';
}
else
{
	$obj=new data();
	$obj->setconnection();
	$obj->addemployee($ename,$eage,$egender,$ejob,$esalary,$ephone,$eaadhar,$eemail);
}



?>


<!--
if (move_uploaded_file($_FILES["bookphoto"]["tmp_name"],"uploads/" . $_FILES["bookphoto"]["name"])) {

    $bookpic=$_FILES["bookphoto"]["name"];

$obj=new data();
$obj->setconnection();
$obj->addemployee($ename,$eage,$egender,$esalary,$ephone,$eaadhar,$eemail);
  } 
  else {
     echo "File not uploaded";
  }

  -->