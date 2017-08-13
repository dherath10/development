<?php
if(!isset($GLOBALS['con'])){
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con; //to put con as a superglobal variable
}
class display{
    function displayRole(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM role";
        $result=$con->query($sql);
        return $result;
    }
    
    function displaydistrict(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM district";
        $result=$con->query($sql);
        return $result;
    }
    
    function displayaUser($user_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM user u, role r, login l, district d, province p WHERE u.user_id=l.user_id AND u.role_id=r.role_id AND u.district_id=d.district_id AND d.province_id=p.province_id AND u.user_id='$user_id'";
        $result=$con->query($sql);
        $no = $result->num_rows;
        return $result;
        
    }
    
    function viewLog($user_name){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM log WHERE user_name='$user_name' ORDER BY log_id DESC";
        $result=$con->query($sql);
        return $result;
    }
    
    function viewAllLog(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM log ORDER BY log_id DESC";
        $result=$con->query($sql);
        return $result;
    }
    
    function viewUserName(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM login ORDER BY user_id DESC";
        $result=$con->query($sql);
        return $result;
    }
    
    function displayMake(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM make ORDER BY make_id ASC";
        $result=$con->query($sql);
        return $result;
    }
    
    function displayModel($make_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM model WHERE make_id='$make_id'";
        $result=$con->query($sql);
        return $result;
    }
    
    function getBackupDetails(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM backup b,user u WHERE u.user_id=b.user_id ORDER BY b.back_id DESC";
        $result=$con->query($sql);
        return $result;
        
        
    }
    function unseenNotification(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM reservation WHERE res_not='Unseen' ORDER BY res_id DESC";
        $result=$con->query($sql);
        return $result;
        
        
    }
}