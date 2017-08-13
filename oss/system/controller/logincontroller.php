<?php
//Start the session
if(!isset($_SESSION)){
    session_start();
}
date_default_timezone_set("Asia/Colombo"); //To change time zone
//Login Controller
//Server Side Include - to include a file
include '../common/dbconnection.php';
include '../model/loginmodel.php';


$uname=$_POST['uname'];
$pass=$_POST['pass'];
$pass=sha1($pass); //To encrypt using secure hash algorithm


//Server side validation

if($uname=="" and $pass==""){
    $msg="User Name and Password are Empty";
    $msg=  base64_encode($msg); //To encode the message
    //Redirecting and passing data through URL
    header("Location:../view/login.php?msg=$msg");   
}else{

$obj=new login(); //To create object using login class
$result=$obj->validateLogin($uname, $pass); //To call a funtion
$nor=$result->num_rows;

if($nor==0){
    $msg="User Name or Password Invalid";
    $msg=  base64_encode($msg);
    header("Location:../view/login.php?msg=$msg"); 
}else{ //Valid user name and password
    
    $rowuser=$result->fetch_assoc();
    
    //To get Modules
    $role_id=$rowuser['role_id'];
    $obja=new module();
    $rowmodule=$obja->getModule($role_id);
    
    //To get remote ip address - http://stackoverflow.com/questions/15699101/get-the-client-ip-address-using-php
    function get_ip_address(){
        $ipaddress='';
        if(isset($_SERVER['HTTP_CLIENT_IP'])){
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        }else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];       
        }else if(isset($_SERVER['REMOTE_ADDR'])){
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        }else{
            $ipaddress="UNKNOWN";
        }
        return $ipaddress;
    }
    
    $log_ip=get_ip_address();
    
    $objlog=new log();
    $log_id=$objlog->insertLog($log_ip, $rowuser['user_id']); //Maintaining logs
    
    $rowuser['log_id']=$log_id;
    
    //print_r($rowuser);
    //print_r($rowmodule);
    $_SESSION['rowuser']=$rowuser;
    //Role Modules
    $_SESSION['rowmodule']=$rowmodule;
    header("Location:../view/dashboard.php"); 
    
}


}