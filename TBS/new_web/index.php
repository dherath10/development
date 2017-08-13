<?php
include 'dbconnection.php';

$sql = "SELECT DISTINCT class from model";
$result = $con->query($sql);
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="website_css.css" type="text/css" />
        <script src="myjs/js1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">


            <ul class="nav nav-pills">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="ourpackages.php">Our Packages</a></li>
                <li><a href="signup.php">Sign up</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
            </ul>

        </div>

        <div class="level2">
            <div class="col-sm-12">
                <img src="images/logo_single.jpg">
            </div>
        </div>
        <div>
            <div>
                <img  class="level3_img" id="demo" src="images/slider3.jpg" onload="myimg1">
            </div>
        </div>

        <br/>

        <div class="container">

            <form method="post" action="bookingprocess.php" >
                
                <legend class="login_fieldset_legend_text">Quick Booking</legend>
                <div class="row">
                    <div class="col-sm-4" class="form-group">
                        <span class="quick_book_form_boot">  Title:<br/> </span>

                        <select name="title" required id="title" class="form-control">
                            <option>Set a title</option>
                            <option>Rev.</option>
                            <option>Mr.</option>
                            <option>Mrs.</option>
                            <option>Miss.</option>

                        </select>
                    </div>
                    <div class="col-sm-4" class="form-group">
                        <span class="quick_book_form_boot">    First Name:<br/></span>
                        <input type="text" name="fname" id="fname" required class="form-control">
                    </div>
                    <div class="col-sm-4" class="form-group">   
                        <span class="quick_book_form_boot">      Last Name:<br/></span>
                        <input type="text" name="lname" id="lname" required class="form-control">
                    </div>    
                </div>    
                <div class="row">   
                    <div class="col-sm-4" class="form-group">
                        <br/> 
                        <span class="quick_book_form_boot"> Email:<br/></span>
                        <input type="text" name="email" id="email" required class="form-control">
                    </div>
                    <div class="col-sm-4" class="form-group">
                        <br/>
                        <span class="quick_book_form_boot">  Telephone:<br/></span>
                        <input type="text" name="telno" id="telno" required class="form-control">
                    </div>
                </div>  
                <br/>
                <div class="row">

                    <div class="col-sm-12">


                        <span id="destination_text">  Destination: </span>

                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-sm-4" class="form-group">
                        <span class="quick_book_form_boot">  From:<br/></span>
                        <input type="text" name="from" id="from" required class="form-control">

                    </div>
                    <div class="col-sm-4" class="form-group">
                        <span class="quick_book_form_boot">  To:<br/></span>
                        <input type="text" name="to" id="to" required class="form-control">

                    </div>
                </div>
                <br/>
                <div class="row"> 
                    <div class="col-sm-4" class="form-group">

                        <span class="quick_book_form_boot"> Required Date:<br/></span>
                        <input type="date" name="rdate" id="rdate" required class="form-control">
                    </div> 
                    <div class="col-sm-4" class="form-group">
                        <span class="quick_book_form_boot"> Required Time:<br/></span>
                        <input type="time" name="rtime" id="rtime" required class="form-control">
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-4" class="form-group">
                        <span class="quick_book_form_boot"> Vehicle Class:<br/></span>

                        <select name="class" id="class" required class="form-control">
                            <option value="">Select a Class</option>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value=' . $row['class'] . '>' . $row['class'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4" class="form-group">

                        <span class="quick_book_form_boot">  A/C Type:<br/></span>

                        <select name="ac" id="ac" required class="form-control">
                            <option value="Non AC">Non A/C</option>
                            <option value="Front AC">Front A/C</option>
                            <option value="Dual AC">Dual A/C</option>
                        </select>
                    </div> 
                </div>

                <br/> 
                <div class="row">
                    <div class="col-sm-8" class="form-group">

                        <span class="quick_book_form_boot">  Remarks (if any):<br/></span>
                        <textarea rows="5" cols="75" name="remarks" id="remarks" class="form-control"></textarea>

                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-sm-4">

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <br/>

                      
                <legend></legend>
            </form>
        </div>


        <div  class="container-fluid">
            <div class="row">
                <div class="col-sm-4">

                    <div>

                        <div class="banner_main_1">
                            <img src="images/icon1.png" class="banner_img">
                            <div class="f_s_div">Fast &amp; 
                                <div id="f_s_s_div">Safe</div>
                            </div>
                            <p id="f_s_para">Having a fast and safe journey are the most important factors that a customer expects
                                from a cab service, because of this reason from the day we started our main
                                concern was to give a quick and a safe travel saving the valuable time 
                                of our customers and we assure you that we will continue to follow this practice
                                bringing you to the correct destination at the right time safely.</p>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4">
                    <div>
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
                </div>
                <div class="col-sm-4">

                    <div>
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
            </div>
        </div>

        <!--<div class="contact_bar">-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" id="contact_bar_div1">
                    <!--<div id="contact_bar_div1">-->
                    <div class="col-sm-3">
                        <img src="images/call.png" id="contact_bar_div_img1">

                    </div>
                    <div class="col-sm-6">
                        <br/>
                        <img src="images/telephone.png">
                        <!--<div class="contact_bar_no_div">-->
                        <span class="contact_bar_no">4 203 203 | 4 200 800</span>
                        <p class="contact_bar_note">Reserve Now!</p>
                        <!--</div>-->
                    </div>
                    <div class="col-sm-3">
                        <img src="images/call.png" id="contact_bar_div_img1">
                        <!--<img src="images/tax_bg.png" id="contact_bar_div_img2">-->

                    </div>
                </div>

            </div>
        </div>
        <div class="image_gallery_div">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12"> <p id="image_gallery_div_h1">Image Gallery</p></div>
                    <div class="col-sm-3">
                        <img src="images/cabs1 (1).jpg" id="image_gallery_imgs">
                        <img src="images/cabs2.jpg" id="image_gallery_imgs">
                        <img src="images/cabs1 (3).jpg" id="image_gallery_imgs">
                        <img src="images/cabs1 (3).jpg" id="image_gallery_imgs">

                    </div>
                    <div class="col-sm-3">
                        <img src="images/cabs1 (4).jpg" id="image_gallery_imgs">
                        <img src="images/cabs1 (7).jpg" id="image_gallery_imgs">
                        <img src="images/cabs1 (12).jpg" id="image_gallery_imgs">
                        <img src="images/cabs1 (12).jpg" id="image_gallery_imgs">

                    </div>
                    <div class="col-sm-3">
                        <img src="images/cabs1 (9).jpg" id="image_gallery_imgs">
                        <img src="images/cabs1 (10).jpg" id="image_gallery_imgs">
                        <img src="images/cabs1 (11).jpg" id="image_gallery_imgs">
                        <img src="images/cabs1 (11).jpg" id="image_gallery_imgs">

                    </div>
                    <div class="col-sm-3">
                        <img src="images/cabs1 (9).jpg" id="image_gallery_imgs">
                        <img src="images/cabs1 (10).jpg" id="image_gallery_imgs">
                        <img src="images/cabs1 (11).jpg" id="image_gallery_imgs">
                        <img src="images/cabs1 (11).jpg" id="image_gallery_imgs">

                    </div>


                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" id="footer_div">
                    <div class="col-sm-4">
                        <p id="footer_div_text1">Colombo<span id="footer_div_text1_p_span1">C</span>abs 
                            <span id="footer_div_text1_p_span2">&copy; 2016 | Privacy Policy</span></p>

                        <p id="footer_div_text2">Website Designed by Rasith Ranawaka</p><!--
                        -->
                    </div>
                    <div class="col-sm-4">

                        <p id="fb_logo_text">Like us on facebook
                            <a href="https://www.facebook.com/Colombo-Cabs-0114203303-395661753842077/">
                                &nbsp; <img src="images/facebook4.png" id="footer_div_img"> </a> </p> 
                    </div>
                    <div class="col-sm-4">
                        <p id="footer_div_text3_contact">Call Us: 4 203 203 / 4 200 800</p>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
