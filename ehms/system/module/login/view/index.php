<html>
    <head>
        <title>Elder's Home Management System</title>
        <link rel="icon" href="../../../images/donate-icon-2x.png" />
  <link rel="stylesheet" type="text/css" 
        href="../../../bootstrap/css/bootstrap.min.css" />
  <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">
  </script>
  <link rel="stylesheet" type="text/css" href="../../../css/layout.css" />
  <link rel="stylesheet" type="text/css" href="../../../css/style.css" />
  <script type="text/javascript" src="../../../js/loginvalidatej.js">
     
  </script>
  
    </head>
    <body>
        <div id='main'>
            <div id='header'>
                <?php include('../../../common/header.php'); ?>
            </div>
            <div id="navi">&nbsp;</div>
            <div id="contents">
                <div class="login-card">
                <h1>Log In</h1>
                <br />
                <div class="al"><span class="alert-danger" id="msg">
                        </span></div>
                
                <?php if(isset($_GET['msg'])){  //Check whether msg existing ?>
                    
                <p class="alert-danger" align="center"> 
                    <?php      echo $_GET['msg']; ?> 
                </p>
                    <?php
                }
                ?>
                <form method="post" name="login"
                      action="../controller/logincontroller.php" 
                      onsubmit="return validateLogin()">    
 <input type="text" name='uname' id='uname' placeholder="User Name" />
    
   <input type="password" name='pass' id='pass' placeholder="Password" />
   <input type="submit" value="Login" name="submit" class="login login-submit" />
                </form>
                </div>   
                
            </div>
            <div id="footer">
                <?php include('../../../common/footer.php'); ?>
             </div> 
        </div>
        
    </body>
</html>