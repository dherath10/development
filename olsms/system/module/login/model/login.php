<?php
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con;
//To create a login class
class login{
    
    function loginvalidate($u,$p){
       $con=$GLOBALS['con'];
 $sql="SELECT * FROM user u,login l, role r WHERE u.user_id=l.user_id AND 
     u.role_id=r.role_id AND l.username='$u' AND l.password='$p' "
         . "AND u.u_status='Active'";
 $result=$con->query($sql); //To execute query
 return $result;
 //$nor=$result->num_rows; //To count no of rows
 //echo $nor;
    }
    
    function log($d,$t,$u,$s,$ip){ //To Insert login Details
        $con=new mysqli("localhost","root","","olsms"); //Conncection string
        $sql="INSERT INTO log VALUES('','$d','$t','$u','$s','$ip','')";
        $con->query($sql);
    }
    
    
}

?>
