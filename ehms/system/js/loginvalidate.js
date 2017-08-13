 //Login validate Function
      function validateLogin(){
          var un=document.getElementById('uname');
          var pw=document.getElementById('pass');
          if(un.value=="" && pw.value==""){ //To check both username and password
  document.getElementById('msg').innerHTML= "Blank User Name and Password";
            un.focus();
              return false;
          }
          //To Check Blank user name
          else if(un.value==""){
         //To display inside HTML page
            document.getElementById('msg').innerHTML= "Blank User Name";
         //To focus to user name field
          un.focus();
         //Stop submitting to next page using false
          return false;
         //Using return send the value back to place where the function is called
          
        }else if(pw.value==""){ //To check password
              document.getElementById('msg').innerHTML= "Blank Password";
              pw.focus();
              return false;
          }  
          
      }      

