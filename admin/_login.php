<?php 
include "../script/_db.php";


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
		$sql = "SELECT * FROM users WHERE uname='$uname' AND upass='$pass'";

		$result = mysqli_query($connect, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['uname'] === $uname && $row['upass'] === $pass){
            	$_SESSION['id'] = $row['id'];
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