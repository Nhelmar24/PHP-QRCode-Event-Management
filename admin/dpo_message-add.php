<?php session_start(); ?>
<?php include("script/_db.php"); include("_head.php"); include("_nav.php");


if(isset($_POST['add_message'])){
	
	//getting the text data from the fields
	
    $rid = $_POST['rid'];
    $sid = $_POST['sid'];
    $mdetails = $_POST['mdetails'];
	
	$add = "INSERT into 
	messages(rid, sid, mdetails)
    values('$rid','$sid','$mdetails')";
	
	$insert_pro = mysqli_query($connect, $add);
	
	if($insert_pro){
		echo "<script>alert('New Record has been added to Database')</script>";
		echo "<script>window.open('report_index.php', '_SELF')</script>";
	}else{
		echo "<script>alert('Record Not Been Inserted')</script>";
	}
	}
?>