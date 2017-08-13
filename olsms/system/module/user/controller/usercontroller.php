<?php
$action=$_GET['action'];
include '../model/usermodel.php';
$ob=new user();
if($action=="add"){
    echo $u_fname=$_POST['u_fname'];
    $u_lname=$_POST['u_lname'];
    $username=$_POST['username'];
    $u_email=$_POST['u_email'];
    $u_dob=$_POST['u_dob'];
    $u_nic=$_POST['u_nic'];
    $u_telno=$_POST['u_telno'];
    $u_gender=$_POST['u_gender'];
    $role_id=$_POST['role_id'];
    
    $user_rights=$_POST['user_rights'];
   
    $nor=$ob->checkUserName($username);
    
    if($nor==0){    
    $r=$ob->addUser($u_fname,$u_lname,$u_email,"",$u_gender,$u_dob,
            "Active",$role_id,$u_telno,$u_nic);
    if($r){
        //echo "Added";
        $user_id=$con->insert_id; 
        
        //To call addUserRights function
        foreach ($user_rights as $e){
        $re=$ob->addUserRights($user_id, $e);        
        }
         //$pass=sha1($u_nic);
        $pass=sha1("123");
        //Add into lOGIN Table
        $r1=$ob->addLogin($username,$pass,$user_id);
        $msg="A record has been added....";
        $status=1;
        
        //Adding user image
        if($_FILES['u_image']['name']!=""){ //If a file has been uploaded 
            $image_name=$_FILES['u_image']['name'];//To get file name
$image_name_tmp=$_FILES['u_image']['tmp_name'];//To get file name temp location
        $image_new=$user_id."_".$image_name; //New Image Name
        $path="../../../images/user_images/".$image_new; //New Path to move
        move_uploaded_file($image_name_tmp, $path); //To move the file
        //To update an image in user table
        $ob->updateImage($user_id,$image_new);
               
        }
        
        
        
    }else{
         $msg="A record has not been added...."; //User not addded.......
         $status=0;
    }        
        $m=  base64_encode($msg);
        header("Location:../view/user.php?m=$m&status=$status");
    }else{
        $msg="Existing User Name";
        $m=base64_encode($msg); //To encode 
        $status=0; //To define an error
        header("Location:../view/adduser.php?m=$m&status=$status");
    } 
    
    
}

if($action=="deactivate"){
    $user_id=$_GET['user_id'];
    $page=$_GET['page'];
    $result=$ob->deactivateUser($user_id); 
    if($result){
        $msg="User ID : ".$user_id." has been deactivated";
        $status=1;
    }else{
        $msg="User ID : ".$user_id." has not been deactivated";
        $status=0;
    }
    $m=base64_encode($msg);
    header("Location:../view/user.php?m=$m&status=$status&page=$page");
}

if($action=="activate"){
    $user_id=$_GET['user_id'];
    $page=$_GET['page'];
    $result=$ob->activateUser($user_id); 
    if($result){
        $msg="User ID : ".$user_id." has been activated";
        $status=1;
    }else{
        $msg="User ID : ".$user_id." has not been activated";
        $status=0;
    }
    $m=base64_encode($msg);
    header("Location:../view/user.php?m=$m&status=$status&page=$page");
}

if($action=="edit"){
    echo $u_fname=$_POST['u_fname'];
    $u_lname=$_POST['u_lname'];
    $username=$_POST['username'];
    $u_email=$_POST['u_email'];
    $u_dob=$_POST['u_dob'];
    $u_nic=$_POST['u_nic'];
    $u_telno=$_POST['u_telno'];
    $u_gender=$_POST['u_gender'];
    $role_id=$_POST['role_id'];
    
    $user_rights=$_POST['user_rights'];
    $user_id=$_GET['user_id'];
    
  $r=$ob->editUser($u_fname,$u_lname,$u_email,$u_gender,
          $u_dob,$role_id,$u_telno,$u_nic,$user_id);
    if($r){
        $msg="User has been updated";
        $status=1;
    }else{
        $msg="User has not been updated";
        $status=0;
    }
    
    //Edit user image
        if($_FILES['u_image']['name']!=""){ //If a file has been uploaded 
            $image_name=$_FILES['u_image']['name'];//To get file name
$image_name_tmp=$_FILES['u_image']['tmp_name'];//To get file name temp location
        $image_new=$user_id."_".$image_name; //New Image Name
        $path="../../../images/user_images/".$image_new; //New Path to move
        move_uploaded_file($image_name_tmp, $path); //To move the file
        //To update an image in user table
        $ob->updateImage($user_id,$image_new);      
        
        }
        //Delete user rights of User ID
        $r1=$ob->deleteUserRights($user_id);
        
      //INSERT USER RIGHTS FOR USER ID
        foreach ($user_rights as $e){
        $re=$ob->addUserRights($user_id, $e);        
        }
    
    
    $m=base64_encode($msg);
  header("Location:../view/edituser.php?m=$m&status=$status&user_id=$user_id");

}