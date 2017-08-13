<?php
class dbconnection{
    function connection(){
         $hostname="localhost";
         $un="root";
         $ps="";
         $db="ehms";
        
        $con=new mysqli($hostname,$un,$ps,$db); //Connection string
        //Sql query
        return $con;
        
    }
    
}

?>