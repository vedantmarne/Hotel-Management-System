<!--


<?php

//$servername="localhost";
//$username="root";
//$password="root";
//$database="hms";

//creating database connection 

//$conn=mysqli_connect($servername,$username,$password,$database);

//checking connection

//if(!$conn)
{
	//die("Failed to connect".mysqli_connect_error());
}



?>
-->


<?php
class db_connect{
protected $connection;

function setconnection(){
    try{
        $this->connection=new PDO("mysql:host=localhost; dbname=hms","root","root");
        // echo "Done";
    }catch(PDOException $e){
        echo "Error";
        //die();

    }
}

}