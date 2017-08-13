<?php
if(!(isset($_SESSION))){
    session_start();
 
}
    
    $rowuser=$_SESSION['rowuser'];
    $log_id=$rowuser['log_id'];
    
    include '../common/dbconnection.php';
    include '../model/loginmodel.php';
    $objlog=new log();
    $objlog->updateLog($log_id); //To update log record
    
    unset($_SESSION['rowuser']);
    unset($_SESSION['rowmodule']);
    
    
    header("refresh:5,url=../view/login.php"); //Redirecting   

?>
<html>
    <head>
        <title>OnLine Sales System</title>
        
        <link type="text/css" rel="stylesheet" href="../css/layout.css" />
        <link type="text/css" rel="stylesheet" href="../css/style.css" />
        <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     </head>
    <body>
        <div id="main">
            <div id="header">
                
                 <?php include '../common/header.php'; ?>            
                
            </div>
            <div id="logged">&nbsp;</div>
            <div id="navi">&nbsp;</div>
            <div id="content">
                <p class="cen">You are successfully logged out from System</p>
                <p class="cen"><i>(Redirecting to Login page within 5 seconds)</i></p>
                <p class="cen"><a href="../view/login.php">Login Out</a></p>
                  
                <p class="cen">
                    <img src="../images/loading.gif" />
                    
                </p>
                
                
                
            </div>
            <div id="footer" class="foo">
                
                 <?php include '../common/footer.php'; ?>  
            </div>
        </div>
        
        
    </body>
     
    <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">
    /*$(document).ready(function(){
    $('form').submit(function(){
        $('#msg').css('text-align','center');
       var uname=$('#uname').val(); //To get Username
       var pass=$('#pass').val(); //To get password
       if(uname=="" && pass==""){  //To check username and password          
           $('#msg').text("User Name and Password are empty");//To display error
           return false; //Stay at same page
       }else if(uname==""){
           $('#msg').text("User Name is empty");//To display error
           return false; //
           
       }else if(pass==""){
           $('#msg').text("Password is empty");//To display error
           return false; //
           
       }  
       
       
       
       
    });
    
});
    */
    </script>
    
    
</html>