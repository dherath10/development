 $(document).ready(function(){
     $("form").submit(function(event){
            if($('#uname').val()=="" && $('#pass').val()==""){
                    
                  $('#msg').text("User Name and Password are Blank");
                    event.preventDefault();
                    return false;                
                }
                 if($('#uname').val()==""){                    
                  $('#msg').text("User Name is Blank");
                    event.preventDefault();
                    return false;
                
                }
                 if($('#pass').val()==""){
                    
                  $('#msg').text("Password is Blank");
                    event.preventDefault();
                    return false;
                
                }
         
     });       
        
     
 });