<?php
include 'dbconnection.php';

$sql="SELECT DISTINCT class FROM model";
$result=$con->query($sql);
?>
<html>
    <head>
        <title>Home1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">-->
        <link rel="stylesheet" href="website_css.css" type="text/css" />
        <script src="js/js1.js"></script>
        <link type="text/css" rel="stylesheet" href="../internal/bootstrap/css/bootstrap.min.css" />
    </head>
    <body>

        <div class="menu_block" id="navigation">
            <div>
                <div>
                    <nav>
                        <ul class="my-menu">
                            <li class="current_link"><a href="index.php">Home</a></li>
                            <li><a href="aboutus.php">About Us</a></li>
                            <li><a href="ourpackages.php">Our Packages</a></li>
                            <li><a href="signup.php">Sign Up</a></li>
                            <li><a href="contactus.php">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="level2">
                    <img src="images/logo_single.jpg">
                </div>
                <div>
                    <div>
                        <img class="level3_img" id="demo" src="images/slider1.jpg" onload="myimg1">
                    </div>
                   
<!--                    <div>-->
                    <div>
                    
                        <form class="quick_book_form" 
                              action="bookingprocess.php" method="post">
                         <fieldset>
                                <legend id="legend_booking">Quick Booking</legend>
                                <table class="quick_book_form_table" align='center'>
                                    <tr>
                                        <td>
                                       Title:<br/>
                                       <!--<input type="text" name="name">-->
                                       <select name="title" required id="title" class="input-sm">
                                            <option value="">Set a Title</option>
                                            <option value="Rev">Rev.</option>
                                           <option value="Mr">Mr.</option>
                                           <option value="Mrs">Mrs.</option>
                                           <option value="Miss">Miss.</option>
                                          
                                       </select>
                                    </td>
                                    <td>
                                       First Name:<br/>
                                       <input type="text" name="fname" id="fname" 
                                              required>
                                    </td>
                                    <td>
                                        Last Name:<br/>
                                        <input type="text" name="lname" id="lname" 
                                               required>
                                    </td>
                                    </tr>
                                    
                                    <tr>
                                    <td>
                                       <br/> 
                                        Email:<br/>
                                        <input type="email" name="email" id="email" required>
                                    </td>
                                    <td>
                                        <br/>
                                        Telephone:<br/>
                                        <input type="text" name="telno" id="telno" required>
                                    </td>
                                    
                                </tr>
                                
                                <tr>
                                    <td id="destination_text">
                                    <br/>
                                        Destination:
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       From:<br/>
                                       <input type="text" name="from" id="from" required 
                                              size="40">
                                    </td>
                                    <td>
                                        To:<br/>
                                        <input type="text" name="to" id="to" required size="40">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                    <br/>
                                        Required Date:<br/>
                                        <input type="date" name="rdate" id="rdate" required>
                                    </td>
                                    <td>
                                    <br/>
                                        Required Time:<br/>
                                        <input type="time" name="rtime" id="rtime" required>
                                    </td>
                                    <td colspan="2">
                                    <br/>
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <br/>
                                        Vehicle Class:<br/>
                                        <!--<input type="text" name="name" size="25">-->
                                        <select name="class" id="class"
                                                required>
                                            <option value="">Select a Class</option>
        <?php while($row=$result->fetch_assoc()){
            
            
            echo '<option value='.$row['class'].'>'.$row['class'].'</option>';
            
            
            
        }
        ?>                                         
                                        
                                        </select>
                                    </td>
                                    <td>
                                    <br/>
                                        A/C Type:<br/>
                                        <!--<input type="text" name="name" size="25">-->
                                        <select name="ac" id="ac" required>
                                            <option value="Non AC">Non AC</option>
                                            <option value="Front AC">Front AC</option>
                                            <option value="Dual AC">Dual AC</option>
                                        </select>
                                    </td>
                                </tr>
                            
                                
                                <tr>
                                    <td colspan="2">
                                    <br/>
                                        Remarks (if any):<br/>
                                        <textarea rows="5" cols="75"
                              id="remarks"  name="remarks"></textarea>
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
                    <!--</div>-->
                    </div>
                      
                    
                    <div class="banner_section">
                        
                        <div class="banner_main">
                        
                            <div class="banner_main_1">
                        
                                 
                                <img src="images/icon1.png" class="banner_img">
                                <div class="f_s_div">Fast &amp; 
                                    <div id="f_s_s_div">Safe</div>
                                </div>
                                <p id="f_s_para">Having a fast and safe journey is the most important factors that a customer expects
                                            from a cab service, because of this reason from the day we started our main
                                            concern was to give a quick and a safe travel saving the valuable time 
                                            of our customers and we assure you that we will continue to follow this practice
                                            bringing you to the correct destination at the right time safely.</p>
                            </div>
                                 
                        </div>
                        <div class="banner_main">
                            <div class="banner_main_1">
                                <img src="images/icon3.png" class="banner_img">
                                <div class="f_s_div">Best 
                                    <div id="f_s_s_div">Prices</div>
                                </div>
                                <p id="f_s_para">In the increasing demand for taxi services within the country a customer always
                                    looks for the best prices along with safety and quickness for their hires.Due to
                                    this reason, we as your service provider always offer the best prices 
                                    for your hires with good quality travel for your convenience, although 
                                    we reduce our prices, our service quality never reduces.</p>
                            </div>
                        </div>
                        
                        <div class="banner_main">
                            <div class="banner_main_1">
                                <img src="images/icon2.png" class="banner_img">
                                <div class="f_s_div">Quality 
                                    <div id="f_s_s_div">Service</div>
                                </div>
                                <p id="f_s_para">We very well know that our customer trust and relationship builds upon the
                                    quality service we provide for the customers.Also we know that since the day we
                                    started until now, we have won the hearts of many customers and we 
                                    believe that is because of the quality service we provide,  
                                     and we promise to give best quality
                                        service to our customers always.</p>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="contact_bar">
                        <div id="contact_bar_div1">
                            <div>
                                <img src="images/tax_bg.png" id="contact_bar_div_img1">
                                <img src="images/tax_bg.png" id="contact_bar_div_img2">
                                <img src="images/tax_bg.png" id="contact_bar_div_img3">
                                <img src="images/tax_bg.png" id="contact_bar_div_img4">
                            
                            </div>
                            <div>
                                <img src="images/telephone.png" id="contact_bar_div2_img">
                                <div class="contact_bar_no_div">
                                <p class="contact_bar_no">4 203 203 / 4 200 800</p>
                                <p class="contact_bar_note">Reserve Now!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="image_gallery_div">
                            <p id="image_gallery_div_h1">Image Gallery</p>
                            <img src="images/cabs1 (1).jpg" id="image_gallery_imgs">
                            <img src="images/cabs2.jpg" id="image_gallery_imgs">
                            <img src="images/cabs1 (3).jpg" id="image_gallery_imgs">
                            <img src="images/cabs1 (4).jpg" id="image_gallery_imgs">
                            <img src="images/cabs1 (7).jpg" id="image_gallery_imgs">
                            <img src="images/cabs1 (12).jpg" id="image_gallery_imgs">
                            <img src="images/cabs1 (9).jpg" id="image_gallery_imgs">
                            <img src="images/cabs1 (10).jpg" id="image_gallery_imgs">
                            <img src="images/cabs1 (11).jpg" id="image_gallery_imgs">
                            
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
            </div>
        
    </body>
</html>
