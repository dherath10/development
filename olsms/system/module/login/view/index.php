<html>
    <head> 
        <title>OnLine Sale Management System</title>
        <link rel="icon" href="../../../images/bi.png" />
        <link rel="stylesheet" type="text/css" 
              href="../../../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../../../css/layout.css" />
    <link rel="stylesheet" type="text/css" href="../../../css/style.css" /> 
    <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">
     
    </script>
    <script type="text/javascript" src="../../../js/loginvalidate.js">
    </script>
    </head>
    <body>
        <div id="main">
            <div id="header">
               <?php include '../../../common/header.php'; ?>      
              
            </div>
            <div id="navi">&nbsp;</div>
            <div id="contents">
                <div class="login-card">
                    <h1>Log-in</h1>
                    <p class="alert-danger" id="msg">
                        <?php 
                        //To display invalid user name or password
                        if(isset($_REQUEST['msg'])){
                            
                            $msg=$_REQUEST['msg'];
                            $msg1=  base64_decode($msg);
                            echo $msg1;
                            
                        }
                        
                        ?>
                        
                    </p>
          <form method="post" action="../controller/logincontroller.php">
            <input type="text" name="username" id="username" 
                               placeholder="User Name" />
               <input type="password" name="password" id="password"
                               placeholder="Password" />
               <input type="submit" name="login" value="Login"
                      class="login login-submit" />
                        
                    </form>
                    
                </div>
                
                
                
            </div>      
            <div id="footer">
                
               <?php include '../../../common/footer.php'; ?> 
            </div>            
        </div>
        
    </body>
    
</html>
