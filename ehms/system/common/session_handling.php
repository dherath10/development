<?php
if(count($_SESSION['userinfo'])==0){
    $msg="Please Login";
    header("Location:../../login/view/index.php?msg=$msg");
    exit;
    
}
?>

