<?php
if(!isset($GLOBALS['con'])){
include '../../../common/dbconnection.php'; //to connect database
$ob=new dbconnection();
$con=$ob->connection();
$GLOBAL['con']=$con; //to put con as a superglobal variable
}
class login{ //login class
    private $user_name;
    private $password;

    function loginvalidate($u,$p){ //loginvalidate method

        $con=$GLOBALS['con'];
        //to get data from user, login and role tables based on un and pw
        $sql="SELECT * FROM user u,login l,role r WHERE u.role_id=r.role_id AND u.user_id=l.user_id AND l.user_name='$u' AND l.password='$p' AND u.user_status='Active'";

        $result=$con->query($sql); //to execute the sql query
        return $result;
    }
    
    function log($uname,$session_id,$ip){
        $con=$GLOBALS['con'];
        date_default_timezone_set('Asia/colombo');
        $cdate=date('Y-m-d');
        $ctime= date('H:i:s');
        $sql="INSERT INTO log values('','$cdate','$ctime','$ip','$session_id','$uname')";
        $result=$con->query($sql);
        
    }
}

?>
