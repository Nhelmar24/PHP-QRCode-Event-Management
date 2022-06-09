<?php 
include "script/_db.php";
session_start();

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=email_empty");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=email_pass");
	    exit();
	}else{
		$sql = "SELECT * FROM students WHERE semail='$uname' AND spass='$pass'";

		$result = mysqli_query($connect, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['semail'] === $uname && $row['spass'] === $pass){
            	$_SESSION['sid'] = $row['sid'];
				$_SESSION['sfname'] = $row['sfname'];
				$_SESSION['slname'] = $row['slname'];
				$_SESSION['sutype'] = $row['sutype'];
				$_SESSION['sstatus'] = $row['sstatus'];
				$_SESSION['scampus'] = $row['scampus'];
				$_SESSION['sunit'] = $row['sunit'];
            	header("Location: home.php");
				exit();
            }else{
				header("Location: index.php?error=both_wrong");
		        exit();
			}
		}else{
			header("Location: index.php?error=both_wrong");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit(); 
}