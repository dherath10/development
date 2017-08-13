<?php
session_start();
	$_SESSION['stype']=$stype=$_POST['search_type'];
	if($stype=="books" || $stype=="cd" || $stype=="serial"){ 
		if($_POST['search']==""){
			$_SESSION['search']=$s="";
			header("Location:delItemProcess.php");
		}else{
			$_SESSION['search']=$s=trim($_POST['search']);
			header("Location:delItemProcess.php");
		}
	}else{
		if($_POST['search']==""){
			header("Location:delItemSearch.php");
		}else{
			$_SESSION['search']=$s=trim($_POST['search']);
			header("Location:delItemProcess.php");
		}
	}


?>