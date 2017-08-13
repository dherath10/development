 $(document).ready(function(){
     $("form").submit(function(event){
         
        var fname=$('#fname').val(); //To get the first Name
        var pat1=/^[a-zA-Z]+$/; //Regular Expression
        var email=$('#email').val();
        var pate=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
        var nic=$('#nic').val();
        var patnic=/^[0-9]{9}[vVxX]$/;
        var tel=$('#tel').val();
        var pattel=/^\+94[0-9]{10}$/;
        //Check fname value is empty
        if(fname==""){
            $("#show").text('Blank First Name'); //To display an error message
            document.getElementById('fname').focus();
            //if so default value must be prevented....
            //defalut value is true
            event.preventDefault();
            return false;  
        }
        
       if(!fname.match(pat1)){ //pattern is no there then
           $("#show").text('Invalid First Name'); //To display an error message
            //if so default value must be prevented....
            //defalut value is true
            event.preventDefault();
            return false;  
       }
       if(!email.match(pate)){ //pattern is no there then
           $("#show").text('Invalid Email Address'); //To display an error message
            //if so default value must be prevented....
            //defalut value is true
            event.preventDefault();
            return false;  
       }      
       //Current Date
       var today=new Date();
       var year=today.getFullYear();
       var month=today.getMonth();
       var date=today.getDate();
       //DOB
       var dob=$('#dob').val();
       var bday=new Date(dob);
       var byear=bday.getFullYear();
       var bmonth=bday.getMonth();
       var bdate=bday.getDate();
       age=year-byear;
       m=month-bmonth;
       d=date-bdate;
       if(m<0 || (m==0 && d<0)) {
           age--;
       }
       if(age<18){
           $("#show").text('Underage'); //To display an error message
           event.preventDefault();
            return false;  
           
       }
       if(age>60){
           $("#show").text('Overage'); //To display an error message
           event.preventDefault();
            return false;  
           
       }
       
        if(!nic.match(patnic)){ //pattern is no there then
           $("#show").text('Invalid NIC'); //To display an error message
            //if so default value must be prevented....
            //defalut value is true
            event.preventDefault();
            return false;  
       }
       
       if(!tel.match(pattel)){ //pattern is no there then
           $("#show").text('Invalid TEl No'); //To display an error message
            //if so default value must be prevented....
            //defalut value is true
            event.preventDefault();
            return false;  
       }
       
       if(!($('#male').is(':checked')) && !($('#female').is(':checked'))) { 
           
             $("#show").text('Gender not checked'); //To display an error message
            //if so default value must be prevented....
            //defalut value is true
            event.preventDefault();
            return false;  
         
         }
        
         //To check an image file (jpg,png,gif)
         if($('#user_image').val()!=""){
             
             var im=$('#user_image').val();
             var getExt=im.split(".");
             getExt=getExt.reverse();
             var ext1=getExt[0].toLowerCase();
             
             var ext=['jpg','png','gif'];
             if($.inArray(ext1,ext)==-1){
           $("#show").text('Extension is not valid'); //To display an error message
           event.preventDefault();
            return false;    
           
             }
             
         }
         
        
        
     });    
 });