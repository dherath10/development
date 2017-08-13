<?php
session_start();
	$_SESSION['stype']=$stype=$_POST['search_type'];
	if($stype=="books" || $stype=="cd" || $stype=="serial"){ 
		if($_POST['search']==""){
			$_SESSION['search']=$s="";
			header("Location:editItemProcess.php");
		}else{
			$_SESSION['search']=$s=trim($_POST['search']);
			header("Location:editItemProcess.php");
		}
	}else{
		if($_POST['search']==""){
			header("Location:editItemSearch.php");
		}else{
			$_SESSION['search']=$s=trim($_POST['search']);
			header("Location:editItemProcess.php");
		}
	}


?>