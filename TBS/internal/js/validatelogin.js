$(document).ready(function(){
    $("form").submit(function(){
        //Both User Name and Password are empty
       if($("#uname").val()=="" && $("#pass").val()==""){
           $("#error").text("Empty User Name and Password");
           $("#uname").focus();
           return false;
       }
       //Empty User Name only
       if($("#uname").val()==""){
           $("#error").text("Empty User Name");
           $("#uname").focus();
           return false;
       }
       //Empty Password only
       if($("#pass").val()==""){
           $("#error").text("Empty Password");
           $("#pass").focus();
           return false;
       }

    });
});

