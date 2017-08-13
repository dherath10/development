<?php

if(!isset($_SESSION)){
    session_start();
    
}
unset($_SESSION['userinfo']); //Destroy Sessions

unset($_SESSION['session_id']);

header("refresh:5,url=../../login/view/index.php");//Redirect into 
//login page in 5 seconds

?>
