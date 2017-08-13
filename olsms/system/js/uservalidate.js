$(document).ready(function(){
   $('form').submit(function(event){
      var u_fname=$('#u_fname').val(); 
      var u_lname=$('#u_lname').val();
      var username=$('#username').val();
      var u_email=$('#u_email').val();
      var u_dob=$('#u_dob').val();
      var u_nic=$('#u_nic').val();
      var u_telno=$('#u_telno').val();
      var role_id=$('#role_id').val();
            
      var pat=/^[a-zA-Z]+$/; //Regular Expression
      var patemail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,6})+$/;
      var patnic=/^[0-9]{9}[vVxX]$/;
      var pattel=/^[0][0-9]{9}$/;
       
       //Curent date
      var cdate=new Date();
      var cyear=cdate.getFullYear();
      var cmonth=cdate.getMonth();
      var cday=cdate.getDate();
      
      //Birth date
      var bdate=new Date(u_dob);
      var byear=bdate.getFullYear();
      var bmonth=bdate.getMonth();
      var bday=bdate.getDate();
      
      
     
      
    if(u_fname==""){ //Blank First name
           $('#msg').text("First name is blank"); //Display Message
           document.getElementById('u_fname').focus(); //Focus on text field
            event.preventDefault(); 
            return false;// prevent submission
       }
       
     if(!u_fname.match(pat)){
         $('#msg').text("First name is invalid"); //Display Message
           document.getElementById('u_fname').focus(); //Focus on text field
           document.getElementById('u_fname').select(); //Focus on text field 
           event.preventDefault(); 
            return false;// prevent submission
         
     }
     if(u_lname==""){ //Blank First name
           $('#msg').text("Last name is blank"); //Display Message
           document.getElementById('u_lname').focus(); //Focus on text field
            event.preventDefault(); 
            return false;// prevent submission
       }
       
     if(!u_lname.match(pat)){
         $('#msg').text("Last name is invalid"); //Display Message
           document.getElementById('u_lname').focus(); //Focus on text field
           document.getElementById('u_lname').select(); //Focus on text field 
           event.preventDefault(); 
            return false;// prevent submission
         
     }
     
     if(username==""){ //Blank User name
           $('#msg').text("User Name is blank"); //Display Message
           document.getElementById('username').focus(); //Focus on text field
            event.preventDefault(); 
            return false;// prevent submission
       }
       
       if(!u_email.match(patemail)){ //Email validity
         $('#msg').text("Email is invalid"); //Display Message
           document.getElementById('u_email').focus(); //Focus on text field
           document.getElementById('u_email').select(); //Focus on text field 
           event.preventDefault(); 
            return false;// prevent submission
         
     }
     var age=cyear-byear;
     var month=cmonth-bmonth;
     var day=cday-bday;
     
     if(month<0 || ( month==0 && day<0))  {
         age--;
         
     }  
   if(age<18){ //less than 18
         $('#msg').text("Under Age"); //Display Message
           document.getElementById('u_dob').focus(); //Focus on text field
           document.getElementById('u_dob').select(); //Focus on text field 
           event.preventDefault(); 
            return false;// prevent submission
         
     }
     if(age>=60){ //Greater than or equal to 60
         $('#msg').text("Over Age"); //Display Message
           document.getElementById('u_dob').focus(); //Focus on text field
           document.getElementById('u_dob').select(); //Focus on text field 
           event.preventDefault(); 
            return false;// prevent submission
         
     }
     
     
     if(!u_nic.match(patnic)){ //Email validity
         $('#msg').text("NIC is invalid"); //Display Message
           document.getElementById('u_nic').focus(); //Focus on text field
           document.getElementById('u_nic').select(); //Focus on text field 
           event.preventDefault(); 
            return false;// prevent submission
         
     }
    
    
    //To check DOB and NIC    
    //Old NIC
    var n=u_nic.substring(0,2);    
    var d=u_dob.substring(2,4);
    //nEW NIC
    var n1=u_nic.substring(0,4);
    var d1=u_dob.substring(0,4);
    if(n==d || n1==d1){ //Email validity       
         
     }else{
         
         $('#msg').text("NIC and DOB dont matching"); //Display Message
           document.getElementById('u_nic').focus(); //Focus on text field
           document.getElementById('u_nic').select(); //Focus on text field 
           event.preventDefault(); 
            return false;// prevent submission
     }
     
     
     if(!u_telno.match(pattel)){ //Email validity
         $('#msg').text("Telephone is invalid"); //Display Message
           document.getElementById('u_telno').focus(); //Focus on text field
           document.getElementById('u_telno').select(); //Focus on text field 
           event.preventDefault(); 
            return false;// prevent submission
         
     }
     
     if(!($('#male').is(':checked')) && !($('#female').is(':checked'))) { 
           
             $("#msg").text('Gender not checked'); //To display an error message
            //if so default value must be prevented....
            //defalut value is true
            event.preventDefault();
            return false;         
         }    
     
     if(role_id==""){ //Blank First name
           $('#msg').text("Role Name is blank"); //Display Message
           document.getElementById('role_id').focus(); //Focus on text field
            event.preventDefault(); 
            return false;// prevent submission
       }
    
     //To check an image file (jpg,png,gif)
         if($('#u_image').val()!=""){             
             var im=$('#u_image').val();
             var getExt=im.split(".");
             getExt=getExt.reverse();
             var ext1=getExt[0].toLowerCase();             
             var ext=['jpg','png','gif'];
             if($.inArray(ext1,ext)==-1){ //To get the position
           $("#msg").text('Extension is not valid'); //To display an error message
           event.preventDefault();
            return false;    
           
             }
         }     
       
   });
    
});


