<?php
//To create db connection 
class dbconnection{    
    function connection(){
      $con=new mysqli("localhost","root","","olsms"); //Conncection string
      return $con;
     }
 
}
