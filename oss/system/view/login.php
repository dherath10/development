<html>
    <head>
        <title>OnLine Sales System</title>
        
        <link type="text/css" rel="stylesheet" href="../css/layout.css" />
        <link type="text/css" rel="stylesheet" href="../css/style.css" />
        <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   
        
    </head>
    <body style="background-color: #4f4f4f;">
        <div id="main">
            <div id="header">
                
                 <?php include '../common/header.php'; ?>            
                
            </div>
            <div id="logged">&nbsp;</div>
            <div id="navi">&nbsp;</div>
            <div id="content">
                 <div class="login-card">
                <h1>Log In</h1>
                <br />
                            
                
                <form method="post" name="login"
                      action="../controller/logincontroller.php" 
                      >   
                    <div id="msg" class="alert-danger">
                        <?php
                        if(isset($_REQUEST['msg'])){
                            echo base64_decode($_REQUEST['msg']);
                            
                        }
                        ?>
                    </div>        
                    
 <input type="text" name='uname' id='uname' placeholder="User Name" />
    
   <input type="password" name='pass' id='pass' placeholder="Password" />
   <input type="submit" value="Login" name="submit" class="login login-submit" />
                </form>
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