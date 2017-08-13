<?php
    class dbconnection{

    function connection(){
        $con=new mysqli("localhost","root","","tbs"); //connection string
        return $con;
    }
}
?>
