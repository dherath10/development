<?php
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con;//Globalize value

class user{
    
    function getUserName($key){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM login WHERE username='$key'";
        $result=$con->query($sql);
        return $result;
        
    }
    
function addUser($fname,$lname,$email,$role_id,
        $status,$user_image,$gender,$dob,$nic,
        $tel,$address,$uname){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO user VALUES ('','$fname','$lname','$email','$role_id','$status','$user_image','$gender','$dob','$nic','$tel','$address')";
        $r=$con->query($sql);
        if($r){
            //$p=sha1($nic);
            $p=sha1("123");
            echo $user_id=$con->insert_id;
      $sqla="INSERT INTO login VALUES ('$uname','$p','$user_id')";
      $ra=$con->query($sqla);
        $result=$user_id;
        }else{
          
        $result=0;
            
        }
        return $result;
        
    }
//To update image.......
    function updateImage($user_id,$new){
        $con=$GLOBALS['con'];
        $sql="UPDATE user SET user_image='$new' WHERE user_id='$user_id'";
        $result=$con->query($sql);
        
    }
    
    //To update image.......
    function getUser($user_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM login l,user u,role r WHERE l.user_id=u.user_id AND "
        . "u.role_id=r.role_id AND u.user_id='$user_id'";
        $result=$con->query($sql);
        return $result;
        
    }
    
    
      function getUserJob($user_id){
        $con=$GLOBALS['con'];
        //To get job details
        $sqlj="SELECT * FROM jobdetail WHERE user_id='$user_id'";
        $resultj=$con->query($sqlj);
        return $resultj;
        
    }
    
    
 //To add job detail
    function addJob($jtitle,$jfield,$jfrom,$jto,$oname,$user_id){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO jobdetail VALUES"
                . "('','$jtitle','$jfield','$jfrom','$jto','$oname','$user_id')";
        $result=$con->query($sql);
        return $result;
    }
    
  
    function deactivateUser($user_id){
           $con=$GLOBALS['con'];
    $sql="UPDATE user SET user_status='Deactive' WHERE user_id='$user_id'";
           $result=$con->query($sql);
           return $result;       
        
    }
    
    function activateUser($user_id){
           $con=$GLOBALS['con'];
    $sql="UPDATE user SET user_status='Active' WHERE user_id='$user_id'";
           $result=$con->query($sql);
           return $result;       
        
    }
     function deleteUser($user_id){
           $con=$GLOBALS['con'];
    $sql="DELETE user,login FROM user,login WHERE user.user_id='$user_id' "
            . "AND user.user_id=login.user_id";
           $result=$con->query($sql);
           
    $sqld="DELETE FROM jobdetail WHERE user_id='$user_id'";
    $resultd=$con->query($sqld);
           return $result;       
        
    }
    
    function updateUser($fname,$lname,$email,$role_id,$gender,
            $dob,$nic,$tel,$address,$user_id){
         $con=$GLOBALS['con'];
         $sql="UPDATE user SET fname='$fname',lname='$lname',email='$email',role_id='$role_id',gender='$gender',dob='$dob', nic='$nic',tel='$tel',address='$address' WHERE user_id='$user_id'";
        
        $result=$con->query($sql);
           return $result; 
        
    }
    
    
    
}


?>

