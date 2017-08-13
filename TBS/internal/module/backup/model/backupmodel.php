<?php

include '../../../common/session.php';
$user_id=$row['user_id'];

include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con; //To put as a superglobal variable

class backup{
    function takeBackup($user_id,$tid){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO backup VALUES('',CURDATE(),CURTIME(),'$tid','$user_id')";
        $result=$con->query($sql);
        return $result;
        
        
        
       
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
/* backup the db OR just a table */
function backup_tables($tables = '*')
{
 $link=$GLOBALS['con'];
  //mysql_select_db($name,$link);
    //get all of the tables
  if($tables == '*')
  {
    $tables = array();
    $result = mysqli_query($link,'SHOW TABLES');
    while($row = mysqli_fetch_row($result))
    {
      $tables[] = $row[0];
    }
  }
  else
  {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }
  
  //cycle through
  foreach($tables as $table)
  {
    $result = mysqli_query($link,'SELECT * FROM '.$table);
    $num_fields = mysqli_num_fields($result);
    
    //$return.= 'DROP TABLE '.$table.';';
    $row2 = mysqli_fetch_row(mysqli_query($link,'SHOW CREATE TABLE '.$table));
    $return.= "\n\n".$row2[1].";\n\n";
    
    for ($i = 0; $i < $num_fields; $i++) 
    {
      while($row = mysqli_fetch_row($result))
      {
        $return.= 'INSERT INTO '.$table.' VALUES(';
        for($j=0; $j<$num_fields; $j++) 
        {
          $row[$j] = addslashes($row[$j]);
          //$row[$j] = preg_match("/\n/","/\\n/",$row[$j]);
          if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
          if ($j<($num_fields-1)) { $return.= ','; }
        }
        $return.= ");\n";
      }
    }
    $return.="\n\n\n";
	
  }
  
  $tid=time();
  
  //save file
  $path="../view/store/";
  $handle = fopen($path.$tid.'.sql','w+');
  fwrite($handle,$return);
  fclose($handle);
  $p=$_SESSION['path']=$path.$tid.'.sql';
  $_SESSION['path1']=$tid;
 
  
  
}
    
    
}
?>
