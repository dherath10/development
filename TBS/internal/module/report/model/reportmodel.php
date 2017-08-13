<?php
if(!isset($GLOBALS['con'])){
include '../../../common/dbconnection.php'; //to connect database
$ob=new dbconnection();
$con=$ob->connection();
$GLOBAL['con']=$con; //to put con as a superglobal variable
}
class report{ //login class
    function bookingAnalysisByDate($f,$t){ //loginvalidate method

        $con=$GLOBALS['con'];
        
$sql="SELECT * FROM reservation r,customer c WHERE r.cus_id=c.cus_id AND r.date BETWEEN '$f' AND '$t'";

        $result=$con->query($sql); //to execute the sql query
        return $result;
    }
    
    function getMonthBooking($pat){ //loginvalidate method

        $con=$GLOBALS['con'];
        
$sql="SELECT * FROM reservation  WHERE date LIKE '$pat%'";
        $result=$con->query($sql); //to execute the sql query
        $count=$result->num_rows;
        return $count;
    }
}


