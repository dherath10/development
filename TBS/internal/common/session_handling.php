<?php
if(count($row)==0){
    $msg=base64_encode("Please Login....");
    header("Location:../../login/view/index.php?msg=$msg");
};
?>

