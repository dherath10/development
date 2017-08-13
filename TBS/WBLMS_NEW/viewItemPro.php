<?php
session_start();
	$_SESSION['stype']=$stype=$_POST['search_type'];
	if($stype=="books" || $stype=="cd" || $stype=="serial"){ 
		if($s=($_POST['search'])==""){
			$_SESSION['search']=$s="";
		}else{
			$_SESSION['search']=$s=trim($_POST['search']);
		}
	}else{
		if($s=($_POST['search'])==""){
			header("Location:viewItem.php");
		}else{
			$_SESSION['search']=$s=trim($_POST['search']);
		}
	}
echo $_SESSION['search'];
header("Location:viewItemProcess.php");