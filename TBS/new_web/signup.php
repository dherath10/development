
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Logins & Bookings</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="website_css.css" type="text/css" />
        <script src="js/js1.js"></script>
    </head>
    <body>
        <div class="menu_block" id="navigation">
            <div>
                <div>
                    <nav>
                        <ul class="my-menu">
                            <li ><a href="index.php">Home</a></li>
                            <li><a href="aboutus.php">About Us</a></li>
                            <li><a href="ourpackages.php">Our Packages</a></li>
                            <li class="current_link"><a href="signup.php">Sign up</a></li>
                            <li><a href="contactus.php">Contact Us</a></li>
                            
                        </ul>
                    </nav>
                </div>
                <div class="level2">
                    <img src="images/logo_single.jpg">
                </div>
                
                <div class="quick_book_maindiv">
                    <div class="quick_book_div3">
                        <form>
                            <fieldset>
                                <legend id="quick_book_legend">Quick Booking</legend>
                            <table class="quick_book_form_log">
                                <tr id="date_tr">
                                    <td>
                                       First Name:<br/>
                                       <input type="text" name="name">
                                    </td>
                                    <td>
                                        Last Name:<br/>
                                       <input type="text" name="name">
                                    </td>
                                </tr>
                                
                                <tr id="quick_book_space">
                                    <td colspan="2">
                                    <br/>
                                        Address:<br/>
                                        <textarea rows="3" cols="75"></textarea>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td colspan="2">
                                    <br/>
                                        Required Date:<br/>
                                        <input type="text" name="name" size="50">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="destination_text" colspan="2">
                                    <br/>
                                        Destination:
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       From:<br/>
                                       <input type="text" name="name">
                                    </td>
                                    <td>
                                        To:<br/>
                                       <input type="text" name="name">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td colspan="2">
                                    <br/>
                                        Special Notes (if any):<br/>
                                        <textarea rows="5" cols="75"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <br/>
                                        <button type="submit" name="submit">Submit</button>
                                    </td>
                                </tr>
                            </table> 
                            </fieldset>       
                        </form>
                    </div>
                    
                    <div class="login_maindiv">
                        <form>
                            <fieldset id="login_fieldset">
                                <legend class="login_fieldset_legend_text">Login</legend>
                                <br/>
                                Username:<br/>
                                <input type="text" name="uname"><br/>
                                <br/>
                                Password:<br/>
                                <input type="password" name="pass"><br/>
                                <br/>
                                <button type="submit" name="login">Login</button>
                            </fieldset>
                                
                        </form>
                    </div>
                    
                </div>
                
                <div class="footer_div">
                        <a href="https://www.facebook.com/Colombo-Cabs-0114203303-395661753842077/">
                            <img src="images/facebook4.png" id="footer_div_img"> </a> 
                        <p id="fb_logo_text">Like us on facebook</p>
                            
                        
                        <p id="footer_div_text1">Colombo<span id="footer_div_text1_p_span1">C</span>abs 
                            <span id="footer_div_text1_p_span2">&copy; 2016 | Privacy Policy</span></p>
                        
                        <p id="footer_div_text2">Website Designed by Rasith Ranawaka</p>
                        
                        <p id="footer_div_text3_contact">Call Us: 4 203 203 / 4 200 800</p>
                      
                </div>
               
                        
                        
            </div>
                     
        </div>
            
        
    </body>
</html>
