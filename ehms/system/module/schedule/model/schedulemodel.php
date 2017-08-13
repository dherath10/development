<?php
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con;//Globalize value

class schedule{
    
    function addDonor($donor_title,$donor_name,$donor_add,$donor_tel,$donor_email,$donor_nic,$passwd){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO donor VALUES ('','$donor_title','$donor_name','$donor_add',"
                . "'$donor_tel','$donor_email','Active','$donor_nic','$passwd')";
        $result=$con->query($sql);
        return $result;
        
    }
    
    function addSchedule($date,$status,$donor_id,$id){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO schedule VALUES ('','$date','$status','$donor_id','$id')";
        $result=$con->query($sql);
        return $result;
        
    }
    
    function getDonorID($donor_name,$donor_tel){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM donor "
            . "WHERE donor_name='$donor_name' AND donor_tel='$donor_tel'";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
        $donor_id=$row['donor_id'];
        return $donor_id;
    }

}
?>
