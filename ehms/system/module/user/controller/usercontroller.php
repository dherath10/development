<?php
include '../model/usermodel.php';
$obj=new user();
$action=$_GET['action'];
if($action=="add"){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $dob=$_POST['dob'];
    $nic=$_POST['nic'];
    $tel=$_POST['tel'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $role_id=$_POST['role_id'];
    
    //To check user Name 
    $result=$obj->getUserName($uname);
    $nor=$result->num_rows;
    if($nor==0){
    $r=$obj->addUser($fname,$lname,$email,$role_id,'Active',
            $user_image,$gender,$dob,$nic,$tel,$address,$uname);
    
    if($r!=0){
        $msg="A record has been added..";
        $id=1;
        //To check image is non-empty
        if($_FILES['user_image']['name']!=""){
        $user_image=$_FILES['user_image']['name'];
        //Move the photo after adding user into DB
        $new=time()."_".$user_image;
        $path="../../../images/user_images/".$new; //New path
        echo $old=$_FILES['user_image']['tmp_name']; //Old path
        move_uploaded_file($old, $path); //To move an image 
        $obj->updateImage($r, $new);
        } 
        $m=base64_encode($msg);
   header("Location:../view/addjobdetails.php?user_id=$r");
        
    }else{
        $msg="A record has not been added";
        $id=0;
        $m=base64_encode($msg);
   header("Location:../view/user.php?msg=$m&id=$id");
    }
     
    }else{
        $msg="Existing User Name";
         $m=base64_encode($msg);
   header("Location:../view/adduser.php?msg=$m");
    }
    
   
}

if($action=="job"){
    $user_id=$_GET['user_id'];
    $jtitle=$_POST['jtitle'];
     $jfield=$_POST['jfield'];
      $jfrom=$_POST['jfrom'];
       $jto=$_POST['jto'];
        $oname=$_POST['oname'];
    
    $result=$obj->addJob($jtitle,$jfield,$jfrom,$jto,$oname,$user_id);
    if($result){
        $msg="A job detail has been added.";
    }else{
        $msg="A job detail has not been added.";
    }
    header("Location:../view/addjobdetails.php?user_id=$user_id");
}

if($action=="deactive"){
    $user_id=$_GET['user_id'];
    $page=$_GET['page'];
    $result=$obj->deactivateUser($user_id);
    if($result){
        $msg="User ID : ".$user_id." has been deactivated";
        $id=1;
    }else{
       $msg="User ID : ".$user_id." has not been deactivated";
       $id=0;
    }
    $m=  base64_encode($msg);
    header("Location:../view/user.php?msg=$m&id=$id&page=$page");
    
}

if($action=="active"){
    $user_id=$_GET['user_id'];
    echo $page=$_GET['page'];
    $result=$obj->activateUser($user_id);
    if($result){
        $msg="User ID : ".$user_id." has been activated";
        $id=1;
    }else{
       $msg="User ID : ".$user_id." has not been activated";
       $id=0;
    }
    $m=  base64_encode($msg);
    header("Location:../view/user.php?msg=$m&id=$id&page=$page");
    
}

if($action=="delete"){
   $user_id=$_GET['user_id'];
    $page=$_GET['page']; 
    $result=$obj->deleteUser($user_id);
    if($result){
        $msg="User ID : ".$user_id." has been deleted";
        $id=1;
    }else{
       $msg="User ID : ".$user_id." has not been deleted";
       $id=0;
    }
    $m=  base64_encode($msg);
    header("Location:../view/user.php?msg=$m&id=$id&page=$page");
    
}


//To update
if($action=="update"){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
  
    $email=$_POST['email'];
    $dob=$_POST['dob'];
    $nic=$_POST['nic'];
    $tel=$_POST['tel'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $role_id=$_POST['role_id'];
    $user_id=$_GET['user_id'];
   $r=$obj->updateUser($fname,$lname,$email,$role_id,$gender,$dob,$nic,$tel,$address,$user_id); 

   if($r){
        $msg="User ID : ".$user_id." has been updated";
        $id=1;
        
        //To check image is non-empty
        if($_FILES['user_image']['name']!=""){
        $user_image=$_FILES['user_image']['name'];
        //Move the photo after adding user into DB
        $new=time()."_".$user_image;
        $path="../../../images/user_images/".$new; //New path
        $old=$_FILES['user_image']['tmp_name']; //Old path
        move_uploaded_file($old, $path); //To move an image 
        $obj->updateImage($user_id, $new);
        } 
        
        
    }else{
       $msg="User ID : ".$user_id." has not been updated";
       $id=0;
    }
    $m=  base64_encode($msg);
    header("Location:../view/user.php?msg=$m&id=$id");
   
   
}
    ?>

