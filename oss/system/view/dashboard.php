<?php
include '../common/session.php'; //To call session page
include '../common/dbconnection.php';
include '../common/commonQuery.php';

$objcq=new commonQuery();
$rowmodule=$_SESSION['rowmodule'];

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
            <div id="logged">
 
                <div class="logalign"><i class="glyphicon glyphicon-user"></i> 
     <?php echo $rowuser['user_fname']." ".$rowuser['user_lname']; ?> 
     <a href="../view/logout.php">Logout</a>
 </div>
                
                
                &nbsp;</div>
            <div id="navi">&nbsp;</div>
            <div id="content">
                <h2 style="text-align: center">
                    <?php echo $rowuser['role_name']; ?> Dashboard</h2>
                 
                <div class="container">
                    <div class="row">
                        <?php foreach($rowmodule as $v) { ?>
                        <div class="col-md-3">
                            <?php 
                           $rowm=$objcq->viewModule($v);
                           $m_name=$rowm['module_name']; //Module name
                           $url=$m_name.".php"; //To define page name
                           $url=  strtolower($url); //To get lowercase
                            
                            ?>
                            <table align="center" border="0">
                                <tr><td>&nbsp;</td></tr>
                                <tr>
   <th>
       <a href="<?php echo $url; ?>">
       <img src="../images/<?php echo $rowm['module_image']; ?>"
            width="100" height="100"/></a></th>
                                </tr>
                               
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <th class="cen">
 <a href="<?php echo $url; ?>"> <?php echo $rowm['module_name']; ?></a></th>
                                </tr>
                                 <tr><td>&nbsp;</td></tr>
                            </table>
                            
                        </div>
                        <?php } ?>
                  
                        
                        
                    </div>
                    
                    
                </div>
                
                
                
                
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