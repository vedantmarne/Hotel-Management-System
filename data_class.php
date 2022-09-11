<?php include("db_connect.php");

class data extends db_connect {

    private $bookpic;
    private $bookname;
    private $bookdetail;
    private $bookaudor;
    private $bookpub;
    private $branch;
    private $bookprice;
    private $bookquantity;
    private $type;

    private $book;
    private $userselect;
    private $days;
    private $getdate;
    private $returnDate;





    function __construct() {
        // echo " constructor ";
        echo "</br></br>";
    }


    function addroom($roomno,$avail,$status,$roomprice,$bedtype){
        $this->$roomno=$roomno;
        $this->$avail=$avail;
        $this->$status=$status;
        $this->$roomprice=$roomprice;
        $this->$bedtype=$bedtype;


         $q="INSERT INTO room VALUES('$roomno','$avail','$status','$roomprice','$bedtype')";

        if($this->connection->exec($q)) {
            $message="Room Details Added Successfully";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/addrooms.php";';
            echo '</script>';
            //header("Location:admin_service_dashboard.php?msg=done");
        }
        else 
        {
            $message="Room Details failed to added";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/addrooms.php";';
            echo '</script>';
            //header("Location:admin_service_dashboard.php?msg=fail");
        }

    }


    function userLogin($t1, $t2) {
        $q="SELECT * FROM login where username='$t1' and password='$t2'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();
        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $logid=$row['id'];
                header("location: hotelmanagementsystem.php?userlogid=$logid");
            }
        }

        else {
             $message="Invalid Login";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/Login.php";';
            echo '</script>';
        }

    }

    function adminLogin($t1, $t2) {

        $q="SELECT * FROM admin where email='$t1' and pass='$t2'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $logid=$row['id'];
                header("location: admin_service_dashboard.php?logid=$logid");
            }
        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }



    function addemployee($ename,$eage,$egender,$ejob,$esalary,$ephone,$eaadhar,$eemail) {
        $this->$ename=$ename;
        $this->$eage=$eage;
        $this->$egender=$egender;
        $this->$esalary=$esalary;
        $this->$ephone=$ephone;
        $this->$eaadhar=$eaadhar;
        $this->$eemail=$eemail;
        $this->$ejob=$ejob;
        

       $q="INSERT INTO employee VALUES('$ename','$eage','$egender','$ejob','$esalary','$ephone','$eaadhar','$eemail')";

        if($this->connection->exec($q)) {
            $message="Employee Details Added Successfully";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/addemployee.php";';
            echo '</script>';
            //header("Location:admin_service_dashboard.php?msg=done");
        }
        else 
        {
            $message="Employee Details failed to added";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/addemployee.php";';
            echo '</script>';
            //header("Location:admin_service_dashboard.php?msg=fail");
        }

    }

    
    function adddriver($dname,$dage,$dgender,$carcompany,$carbrand,$available,$location){
        $this->$dname=$dname;
        $this->$dage=$dage;
        $this->$dgender=$dgender;
        $this->$carcompany=$carcompany;
        $this->$carbrand=$carbrand;
        $this->$available=$available;
        $this->$location=$location;


         $q="INSERT INTO driver VALUES('$dname','$dage','$dgender','$carcompany','$carbrand','$available','$location')";

        if($this->connection->exec($q)) {
            $message="Driver Details Added Successfully";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/adddriver.php";';
            echo '</script>';
            //header("Location:admin_service_dashboard.php?msg=done");
        }
        else 
        {
            $message="Driver Details failed to added";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/adddriver.php";';
            echo '</script>';
            //header("Location:admin_service_dashboard.php?msg=fail");
        }

    }


    function newcustomer($identity,$idno,$cname,$cgender,$country,$croomno,$checkedin,$deposit){
        $this->$identity=$identity;
        $this->$idno=$idno;
        $this->$cname=$cname;
        $this->$cgender=$cgender;
        $this->$country=$country;
        $this->$croomno=$croomno;
        $this->$checkedin=$checkedin;
         $this->$deposit=$deposit;


         $q="INSERT INTO customer VALUES('$identity','$idno','$cname','$cgender','$country','$croomno','$checkedin','$deposit')";

        if($this->connection->exec($q)) {
            $message="Customer Details Added Successfully";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/newcustomer.php";';
            echo '</script>';
            //header("Location:admin_service_dashboard.php?msg=done");
        }
        else 
        {
            $message="Customer Details failed to added";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/newcustomer.php";';
            echo '</script>';
            //header("Location:admin_service_dashboard.php?msg=fail");
        }

    }



    private $id;



    function getissuebook($userloginid) {

        $newfine="";
        $issuereturn="";

        $q="SELECT * FROM issuebook where userid='$userloginid'";
        $recordSetss=$this->connection->query($q);


        foreach($recordSetss->fetchAll() as $row) {
            $issuereturn=$row['issuereturn'];
            $fine=$row['fine'];
            $newfine= $fine;

            
                //  $newbookrent=$row['bookrent']+1;
        }


        $getdate= date("d/m/Y");
        if($issuereturn<$getdate){
            $q="UPDATE issuebook SET fine='$newfine' where userid='$userloginid'";

            if($this->connection->exec($q)) {
                $q="SELECT * FROM issuebook where userid='$userloginid' ";
                $data=$this->connection->query($q);
                return $data;
            }
            else{
                $q="SELECT * FROM issuebook where userid='$userloginid' ";
                $data=$this->connection->query($q);
                return $data;  
            }

        }
        else{
            $q="SELECT * FROM issuebook where userid='$userloginid'";
            $data=$this->connection->query($q);
            return $data;

        }






    }

    

    function getroom() {
        $q="SELECT * FROM room";
        $data=$this->connection->query($q);
        return $data;
    }



    function getbookissue(){
        $q="SELECT * FROM book where bookava !=0 ";
        $data=$this->connection->query($q);
        return $data;
    }

    function userdata() {
        $q="SELECT * FROM userdata ";
        $data=$this->connection->query($q);
        return $data;
    }


    function getbookdetail($id){
        $q="SELECT * FROM book where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }

    function userdetail($id){
        $q="SELECT * FROM userdata where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }



    function requestbook($userid,$bookid){

        $q="SELECT * FROM book where id='$bookid'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where id='$userid'";
        $recordSet=$this->connection->query($q);

        foreach($recordSet->fetchAll() as $row) {
            $username=$row['name'];
            $usertype=$row['type'];
        }

        foreach($recordSetss->fetchAll() as $row) {
            $bookname=$row['bookname'];
        }

        if($usertype=="student"){
            $days=7;
        }
        if($usertype=="teacher"){
            $days=21;
        }


        $q="INSERT INTO requestbook (id,userid,bookid,username,usertype,bookname,issuedays)VALUES('','$userid', '$bookid', '$username', '$usertype', '$bookname', '$days')";

        if($this->connection->exec($q)) {
            header("Location:otheruser_dashboard.php?userlogid=$userid");
        }

        else {
            header("Location:otheruser_dashboard.php?msg=fail");
        }

    }


    function returnbook($id){
        $fine="";
        $bookava="";
        $issuebook="";
        $bookrentel="";

        $q="SELECT * FROM issuebook where id='$id'";
        $recordSet=$this->connection->query($q);

        foreach($recordSet->fetchAll() as $row) {
            $userid=$row['userid'];
            $issuebook=$row['issuebook'];
            $fine=$row['fine'];

        }
        if($fine==0){

        $q="SELECT * FROM book where bookname='$issuebook'";
        $recordSet=$this->connection->query($q);   

        foreach($recordSet->fetchAll() as $row) {
            $bookava=$row['bookava']+1;
            $bookrentel=$row['bookrent']-1;
        }
        $q="UPDATE book SET bookava='$bookava', bookrent='$bookrentel' where bookname='$issuebook'";
        $this->connection->exec($q);

        $q="DELETE from issuebook where id=$id and issuebook='$issuebook' and fine='0' ";
        if($this->connection->exec($q)){
    
            header("Location:otheruser_dashboard.php?userlogid=$userid");
         }
        //  else{
        //     header("Location:otheruser_dashboard.php?msg=fail");
        //  }
        }
        // if($fine!=0){
        //     header("Location:otheruser_dashboard.php?userlogid=$userid&msg=fine");
        // }
       

    }

    function checkout($idnumber)
    {
        $this->$idnumber= $idnumber;
        $q="DELETE from customer where numb='$idnumber'";
        

            if($this->connection->exec($q)) 
            {
                $message="Customer Details Deleted Successfully";
                echo '<script language="javascript">';
                echo 'alert("'.$message.'");';
                echo 'window.location="http://localhost/Hotel Management System/checkout.php";';
                echo '</script>';
            //header("Location:admin_service_dashboard.php?msg=done");
            }
            else 
            {
                $message="Customer Details failed to deleted";
                echo '<script language="javascript">';
                echo 'alert("'.$message.'");';
                echo 'window.location="http://localhost/Hotel Management System/checkout.php";';
                echo '</script>';
                //header("Location:admin_service_dashboard.php?msg=fail");
            }

    }

    function deletebook($id){
        $q="DELETE from book where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:admin_service_dashboard.php?msg=done");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=fail");
        }
    }

        function issuereport(){
            $q="SELECT * FROM issuebook ";
            $data=$this->connection->query($q);
            return $data;
            
        }

        function requestbookdata(){
            $q="SELECT * FROM requestbook ";
            $data=$this->connection->query($q);
            return $data;
        }

      // issue issuebookapprove
      function issuebookapprove($book,$userselect,$days,$getdate,$returnDate,$redid){
        $this->$book= $book;
        $this->$userselect=$userselect;
        $this->$days=$days;
        $this->$getdate=$getdate;
        $this->$returnDate=$returnDate;


        $q="SELECT * FROM book where bookname='$book'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where name='$userselect'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $issueid=$row['id'];
                $issuetype=$row['type'];

                // header("location: admin_service_dashboard.php?logid=$logid");
            }
            foreach($recordSetss->fetchAll() as $row) {
                $bookid=$row['id'];
                $bookname=$row['bookname'];

                    $newbookava=$row['bookava']-1;
                     $newbookrent=$row['bookrent']+1;
            }

        
            $q="UPDATE book SET bookava='$newbookava', bookrent='$newbookrent' where id='$bookid'";
            if($this->connection->exec($q)){

            $q="INSERT INTO issuebook (userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine)VALUES('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";

            if($this->connection->exec($q)) {

                $q="DELETE from requestbook where id='$redid'";
                $this->connection->exec($q);
                header("Location:admin_service_dashboard.php?msg=done");
            }
    
            else {
                header("Location:admin_service_dashboard.php?msg=fail");
            }
            }
            else{
               header("Location:admin_service_dashboard.php?msg=fail");
            }




        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }


    }
    
    // issue book
    function updateroom($roomno,$status)
    {
        $this->$roomno= $roomno;
        $this->$status=$status;
    
        
            $q="UPDATE room SET clean_status='$status' where room_number='$roomno'";
            
        if($this->connection->exec($q)) {
            $message="Room Updated Successfully";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/updateroom.php";';
            echo '</script>';
            //header("Location:admin_service_dashboard.php?msg=done");
        }
        else 
        {
            $message="Room Update failed";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/updateroom.php";';
            echo '</script>';
            //header("Location:admin_service_dashboard.php?msg=fail");
        }


    }


    function updatecheck($idnumber,$roomnumber,$custname,$checkedin,$amtpaid)
    {
        $this->$idnumber=$idnumber;
        $this->$roomnumber=$roomnumber;
        $this->$custname=$custname;
        $this->$checkedin=$checkedin;
        $this->$amtpaid=$amtpaid;

    
        
            $q="UPDATE customer SET room_number='$roomnumber',name='$custname',status='$checkedin',deposit='$amtpaid' WHERE numb='$idnumber'";
            
        if($this->connection->exec($q)) {
            $message="Checked-In Updated Successfully";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/updatecheck.php";';
            echo '</script>';
            //header("Location:admin_service_dashboard.php?msg=done");
        }
        else 
        {
            $message="Checked-In Update failed";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/Hotel Management System/updatecheck.php";';
            echo '</script>';
            //header("Location:admin_service_dashboard.php?msg=fail");
        }


    }



}