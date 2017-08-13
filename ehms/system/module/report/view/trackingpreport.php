<?php
if(!isset($_SESSION)){
    session_start();    
}
// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);
//session handling - to check whether login or not
include '../../../common/session_handling.php';

$userinfo=$_SESSION['userinfo']; //To get from session
$username=$userinfo['username'];
$user_id=$userinfo['user_id'];
$role_id=$userinfo['role_id'];
$role_name=$userinfo['role_name'];
$user_image=$userinfo['user_image'];

include '../../../common/query.php'; //To call common queries
$obj=new query();
$result=$obj->viewActiveUser();

if(isset($_POST['gen'])){
$uid=$_POST['user_id'];

$resultuser=$obj->viewUser($uid);
$rowuser=$resultuser->fetch_assoc();
$user=$rowuser['username'];
    
$cdate=date("Y-m-d");
$ctid=  strtotime($cdate);
$arr=array();
for($i=0;$i<=6;$i++){
    $tid=$ctid-$i*60*60*24;
   $date=date("Y-m-d",$tid); 
   array_push($arr, $date);
}

$nor0=$obj->getLogCount($uid, $arr[0]);
$nor1=$obj->getLogCount($uid, $arr[1]);
$nor2=$obj->getLogCount($uid, $arr[2]);
$nor3=$obj->getLogCount($uid, $arr[3]);
$nor4=$obj->getLogCount($uid, $arr[4]);
$nor5=$obj->getLogCount($uid, $arr[5]);
$nor6=$obj->getLogCount($uid, $arr[6]);

}

?>
<html>
    <head>
        <title>Elder's Home Management System</title>
        <link rel="icon" href="../../../images/favicon.png" />
  <link rel="stylesheet" type="text/css" 
        href="../../../bootstrap/css/bootstrap.min.css" />
  
  <link rel="stylesheet" type="text/css" href="../../../css/newlayout.css" />
  <link rel="stylesheet" type="text/css" href="../../../css/calender.css" />
  <link href="../../../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
    
  <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">  </script>

      <script type="text/javascript" src="../../../js/jquery.autocomplete.pack.js"></script>
<script type="text/javascript" src="../../../js/script.js"></script>
<script>
  function getFromDate(from){
      document.getElementById('too').innerHTML='<input type="date" min='+from+' name="to" />';
      
  }
  
</script>
  <script>
  
function getUserId(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getUserId.php?q="+str,true);
xmlhttp.send();
}
  
  </script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', '<?php echo $user; ?>');
     

      data.addRows([
        [1,  <?php echo $nor0; ?>],
        [2,  <?php echo $nor1; ?>],
        [3,  <?php echo $nor2; ?>],
        [4,  <?php echo $nor3; ?>],
        [5,  <?php echo $nor4; ?>],
        [6,   <?php echo $nor5; ?>],
        [7,   <?php echo $nor6; ?>]
       
      ]);

      var options = {
        chart: {
          title: 'Last 7 days No of Logged By User',
          subtitle: 'Day vs No of logged'
        },
        width: 700,
        height: 500,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, options);
    }
  </script>
    </head>
    <body>
        <div id="newmain">
            <div id="newheader">
                <?php  
                //To get header part
                include '../../../common/newheader.php'; ?>
            </div>
            <div id="newcontent">
                <div id="newsidebar">
                    <?php include '../../../common/sidebar.php'; ?>
                </div>
                
                <div id="subcontent">
         <!-- To show the path -->
         <ol class="breadcrumb">
            
            <li>
                <a  class="a1" href='../../login/view/dashboard.php'>Dashboard</a></li>
            
            <li><a href="../../report/view/report.php" class="a1">Report </a></li>
            
            <li class="active">Tracking Report </li>
</ol>
         
          <!-- To End the path -->          
                    <!-- Header -->

                    <h3 class="pa">Tracking
                        <small>Report</small></h3>
                    
                     <h4 class="pa">Last 7 days No of Logging By User </h4>

                    <div class="container-fluid">
                        <hr/>
                        <form action="trackingpreport.php" method="post">
              <div class="col-md-8">          
              <h4><b>SELECT User Full Name :</b> 
        <select name="user_id" id="user_id"
                class="form-control"  required=""
                                                              >
          <option value="">Please Select a User</option>
       <?php 
       //To fetch(retrieve) data from $result varibale per each record and 
       //display all records using while loop
       while($row=$result->fetch_assoc()) { ?>
        <option value="<?php echo $row['user_id']; ?>">
        <?php echo $row['fname']." ".$row['lname']; ?>
        </option> 
                                    
       <?php } ?>
                                </select>               
   
                        </h4>
              </div>
              <div class="col-md-4">
                  <button type="submit" name="gen" class="btn btn-primary">
                      Generate a Report
                  </button></div>
                    </form>
                        <hr />
                    <?php if(isset($_POST['gen'])) { ?> 
                       
                        <div id="line_top_x" class="col-md-12"></div>     
                       
                    <?php } ?>
                    </div>
                
                    
                    
                   </div>
       
            </div>
            
            
        </div>
        
        
    </body>
</html>