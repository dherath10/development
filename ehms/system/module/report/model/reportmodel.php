<?php
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con;//Globalize value

class report{
    function getBooked($type,$from,$to){
        $con=$GLOBALS['con'];
        $sql="SELECT COUNT(*) AS booked FROM schedule "
       . "WHERE ts_id='$type' AND sch_date BETWEEN '$from' AND '$to'";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
        return $row['booked'];
        
    }
    
    function getPaymentByDate($from){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM donation d,donor do "
                . "WHERE d.donor_id=do.donor_id AND donation_date='$from'";
        $result=$con->query($sql);
        return $result;
        
    }
    
    
    
    
}

