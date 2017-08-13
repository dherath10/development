<html>
    <head>
        <title>Taxi Booking System for Colombo Cabs</title>
        <!-- favicon -->
        <link rel="icon" href="../../../images/yellow-taxi-10035627.jpg" />
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" 
              href="../../../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" 
              href="../../../css/loginlayout.css" />
        <link rel="stylesheet" type="text/css" 
              href="../../../css/style.css" />
        <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">
        </script>
        <script type="text/javascript" src="../../../js/validatelogin.js">
            </script>
        
    </head>
    <body>
        <div id="loginmain">
            <div id="loginheader">Taxi Booking System</div>
            <div id="logincontent">
                <div class="login-card">                    
                    <h1>Login</h1>
                    <div id="error" class="alert-danger al">
                        <?php
                        if(isset($_REQUEST['msg'])){
                            echo base64_decode($_REQUEST['msg']);
                        }
                        
                        ?>
                    </div>
                    <br/>
                    <form action="../controller/logincontroller.php"
                          method="post">
                    <input type="text" id="uname" name="uname" 
                           placeholder="User Name" />
                    <input type="password" id="pass" name="pass" 
                           placeholder="Password" />
                    <input type="submit" name="login" value="Login"
                           class="login login-submit" />
                    </form>
                    
                </div>
            </div>
            <div id="loginfooter">&copy; Colombo Cabs </div>
            
        </div>
        
    </body>
</html>
