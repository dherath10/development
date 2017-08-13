<?php

include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con; //To put as a superglobal variable

class booking{
    function viewallbookings(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM reservation r, customer c WHERE r.cus_id=c.cus_id ORDER BY r.res_id DESC";
        $result=$con->query($sql);
        return $result;
    }
    function updateResNot($res_id){
        $con=$GLOBALS['con'];
        $sql="UPDATE reservation SET res_not='Seen' WHERE res_id='$res_id'";
        $result=$con->query($sql);
        return $result;
    }
    
     function viewbookinglimit($page1){
        $con=$GLOBALS['con'];
        $sql1="SELECT * FROM reservation r, customer c WHERE r.res_id=c.cus_id ORDER BY date LIMIT $page1,5";
        $r1=$con->query($sql1);
        return $r1;
    }
    
    function addBooking($title,$user_fname,$user_lname,$user_email,$user_tel_no,$from,$to,$date,$time,$class,$ac_type,$remarks){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO customer VALUES('','$title','$user_fname','$user_lname','$user_tel_no','$user_email','Active')";
        $result=$con->query($sql);
        $cus_id=$con->insert_id;
       
        $sql1="INSERT INTO reservation VALUES ('$cus_id','$from','$to','$date','$time','$class','$ac_type','$cus_id','','','$remarks')";
        $result1=$con->query($sql1);
   
        return $result;
    }
            
    function deleteBooking($res_id){
                   $con=$GLOBALS['con'];
                   $sqld="DELETE FROM reservation WHERE reservation.res_id='$res_id'";
                   $resultd=$con->query($sqld);
                   
                   
                   return $resultd;
                   
               
    }
}
?>
