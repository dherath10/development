<?php
if(!isset($GLOBAL['con'])){
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBAL['con']=$con; //to put con as a superglobal variable
}

class user{
    //To view all user
    function viewalluser(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM user u, role r, login l, district d, province p WHERE u.user_id=l.user_id AND u.role_id=r.role_id AND u.district_id=d.district_id AND d.province_id=p.province_id";
        
        $result=$con->query($sql);
        return $result;
    }
    
    function addUser($user_fname,$user_lname,$user_email,$user_tel_no,$ui,$role_id,$user_nic,$user_status,$dob,$gender,$district_id,$user_name,$tmp){
        $con=$GLOBALS['con'];
        if($ui!=""){
        $uinew=time()."_".$ui; // to create a unique image name
        }else{
            $uinew="";
        }
        $sql="INSERT INTO user VALUES('','$user_fname','$user_lname','$user_email','$user_tel_no','$uinew','$role_id','$user_nic','$user_status','$dob','$gender','$district_id')";
        
        
        $result=$con->query($sql);
        $last_id=$con->insert_id;
        $p=  sha1("123");
        $sqllogin="INSERT INTO login VALUES('$user_name','$p','$last_id')";
        $resultlogin=$con->query($sqllogin);
        
        if($ui!=""){
            $path="../../../images/user_image/".$uinew;
            move_uploaded_file($tmp, $path);
    }
    return $result;
    
}
    
    function updateUser($user_fname,$user_lname,$user_email,$user_tel_no,$ui,$role_id,$user_nic,$user_status,$dob,$gender,$district_id,$user_id,$tmp){
        $con=$GLOBALS['con'];
//        to delete old image
        $sqlselect="SELECT user_image FROM user WHERE user_id='$user_id'";
        $resultselect=$con->query($sqlselect);
        $rowselect=$resultselect->fetch_assoc();
        if($rowselect['user_image']!=""){
            $path="../../../images/user_image/".$rowselect['user_image'];
            unlink($path);
        }
        
//        To update user
        $sql="UPDATE user SET user_fname='$user_fname', user_lname='$user_lname', user_email='$user_email', user_tel_no='$user_tel_no',role_id='$role_id', user_nic='$user_nic', user_status='$user_status', dob='$dob', gender='$gender', district_id='$district_id' WHERE user_id='$user_id'";
        $result=$con->query($sql);
        
         if($ui!=""){
        $uinew=time()."_".$ui; // to create a unique image name
        $path="../../../images/user_image/".$uinew;
            move_uploaded_file($tmp, $path);
        $sqli="UPDATE user SET user_image='$uinew' WHERE user_id='$user_id'";
        $resulti=$con->query($sqli);
        }
        return $result;
    }

    function viewuserlimit($page1){
    $con=$GLOBALS['con'];
    $sql1="SELECT * FROM user u, role r, login l, district d, province p WHERE u.user_id=l.user_id AND u.role_id=r.role_id AND u.district_id=d.district_id AND d.province_id=p.province_id ORDER BY u.user_id LIMIT $page1,5";
    $r1=$con->query($sql1);
    return $r1;
}

    function viewusersearch($key){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM user u, role r, login l, district d, province p WHERE u.user_id=l.user_id AND u.role_id=r.role_id AND u.district_id=d.district_id AND d.province_id=p.province_id AND (u.user_fname LIKE '%$key%' OR u.user_lname LIKE '%$key%' OR u.user_nic LIKE '%$key%')";
        $r=$con->query($sql);
        return $r;
}  
    
    function statusDeactive($user_id){
        $con=$GLOBALS['con'];
        $sql="UPDATE user SET user_status='Deactive' WHERE user_id='$user_id'";
        $result=$con->query($sql);
        return $result;
    }
    
    function statusActive($user_id){
        $con=$GLOBALS['con'];
        $sql="UPDATE user SET user_status='Active' WHERE user_id='$user_id'";
        $result=$con->query($sql);
        return $result;
    }
    
    function Delete($user_id){
        $con=$GLOBALS['con'];
        $sql="DELETE user,login FROM user,login WHERE login.user_id=user.user_id AND user.user_id='$user_id'";
        $result=$con->query($sql);
        return $result;
        
    }
   
}
?>