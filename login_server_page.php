<?php

include("data_class.php");

$login_email=$_GET['floatingInput'];
$login_pasword=$_GET['floatingPassword'];


if($login_email==null||$login_pasword==null){
    
    if($login_email==null){
        $message="Invalid Login";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/Login.php";';
            echo '</script>';
    }
    if($login_pasword==null){
        $message="Invalid Login";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/Login.php";';
            echo '</script>';
    }

    header("Location: Login.php");
}

elseif($login_email!=null&&$login_pasword!=null){
    $obj=new data();
    $obj->setconnection();
    $obj->userLogin($login_email,$login_pasword);

}