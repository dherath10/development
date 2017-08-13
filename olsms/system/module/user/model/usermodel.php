<?php
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con;

class user{
    
    function viewAllUser(){
        $con=$GLOBALS['con'];
  $sql="SELECT * FROM user u, role r WHERE u.role_id=r.role_id "
          . "ORDER BY u.user_id DESC";
  $result=$con->query($sql);
  return $result;
        
    } 
    
    function viewUser($user_id){
        $con=$GLOBALS['con'];
  $sql="SELECT * FROM user u, role r, login l WHERE u.role_id=r.role_id"
          . " AND u.user_id=l.user_id AND u.user_id='$user_id'";
  $result=$con->query($sql);
  return $result;
        
    } 
    
    function addUser($u_fname,$u_lname,$u_email,$u_image,$u_gender,$u_dob,
            $u_status,$role_id,$u_telno,$u_nic){
          $con=$GLOBALS['con'];
    $sql="INSERT INTO user VALUES('','$u_fname','$u_lname','$u_email',"
  . "'$u_image','$u_gender','$u_dob','$u_status','$role_id',"
            . "'$u_telno','$u_nic')";
    $result=$con->query($sql);
    return $result;
    
    }
    function addLogin($username,$pass,$user_id){
        $con=$GLOBALS['con'];
      $sql="INSERT INTO login VALUES('$username','$pass','$user_id')";
    $result=$con->query($sql);
    return $result;  
        
    }
    //To add rights into user_rights table
    function addUserRights($user_id,$e){
         $con=$GLOBALS['con'];//get connection string
        
            $sql="INSERT INTO user_rights VALUES('$user_id','$e')";
             $result=$con->query($sql);
             return $result;
        
    }
    //To delete user rights based on an Individual user
    function deleteUserRights($user_id){
        $con=$GLOBALS['con'];//get connection string
          $sql="DELETE FROM user_rights WHERE user_id='$user_id'";
             $result=$con->query($sql);
             return $result;
        
    }
    //To check User Name
    function checkUserName($username){
         $con=$GLOBALS['con'];//get connection string
             $sql="SELECT * FROM login WHERE username='$username'";
             $result=$con->query($sql);
             $nor=$result->num_rows;
             return $nor;
        
    }
    
    //To upadte an image
    function updateImage($user_id,$image_name){
         $con=$GLOBALS['con'];//get connection string
         $sql="UPDATE user SET u_image='$image_name' WHERE user_id='$user_id'";
         $r=$con->query($sql);
         return $r;
        
    }
    
    function viewUserPage($page1){
        $con=$GLOBALS['con'];//get connection string
        $sql="SELECT * FROM user u, role r WHERE u.role_id=r.role_id "
          . "ORDER BY u.user_id DESC LIMIT ".$page1.",5";
        $result=$con->query($sql);
        return $result;
    }
    function deactivateUser($user_id){
        $con=$GLOBALS['con'];//get connection string
        $sql="UPDATE user SET u_status='Deactive' WHERE user_id='$user_id'";
        $result=$con->query($sql);
        return $result;
        
    }
    
    function activateUser($user_id){
        $con=$GLOBALS['con'];//get connection string
        $sql="UPDATE user SET u_status='Active' WHERE user_id='$user_id'";
        $result=$con->query($sql);
        return $result;
        
    }
    
    function editUser($u_fname,$u_lname,$u_email,$u_gender,
          $u_dob,$role_id,$u_telno,$u_nic,$user_id){
            $con=$GLOBALS['con'];
            
   $sql="UPDATE user SET u_fname='$u_fname',u_lname='$u_lname',"
           . "u_email='$u_email',u_gender='$u_gender',u_dob='$u_dob',"
           . "role_id='$role_id',u_telno='$u_telno',u_nic='$u_nic'"
           . "WHERE user_id='$user_id'";
        $result=$con->query($sql);
        return $result;
        
    }
    
    function searchUsers($key){
         $con=$GLOBALS['con'];
         $sql="SELECT * FROM user u,role r WHERE u_fname LIKE '%$key%'"
                 . "AND r.role_id=u.role_id";
         $result=$con->query($sql);
         return $result;
        
    }
    
    
    
    
}

class role{
    
    function viewRole(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM role";
        $result=$con->query($sql);
        return $result;
    }
}

class module{
    function viewModule(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM module";
        $result=$con->query($sql);
        return $result;
    }
    
}

class rights{
    function viewModuleRights($m){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM rights WHERE module_id='$m'";
        $result=$con->query($sql);
        return $result;
    }
    function viewUserRights($m,$user_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM rights r,user_rights ur WHERE r.module_id='$m'"
                . "AND r.r_id=ur.r_id AND ur.user_id='$user_id'";
        $result=$con->query($sql);
        return $result;
    }
    
    function getRights($role_id,$r_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM role_rights WHERE role_id='$role_id'"
                . "AND r_id='$r_id'";
        $result=$con->query($sql);
        $no=$result->num_rows;
        return $no;
    }
    function checkRight($r_id,$user_id){
         $con=$GLOBALS['con'];
        $sql="SELECT * FROM user_rights WHERE r_id='$r_id'"
                . "AND user_id='$user_id'";
        $result=$con->query($sql);
        $no=$result->num_rows;
        return $no;
        
    }
    
    
    
}


