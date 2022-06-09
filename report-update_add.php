<?php session_start(); ?>
<?php include("script/_db.php");
include("_head.php");
include("_nav.php");


if (isset($_POST['add_action'])) {

	//getting the text data from the fields

	$rid = $_POST['rid'];
	$sid = $_POST['sid'];
	$rudate = $_POST['rudate'];
	$ruupdate = $_POST['ruupdate'];

	$add = "INSERT into 
	report_update(rid, sid, rudate, ruupdate)
    values('$rid','$sid','$rudate','$ruupdate')";

	$insert_pro = mysqli_query($connect, $add);

	if ($insert_pro) {
		echo "<script>alert('New Record has been added to Database')</script>";
		echo "<script>window.open('report_index.php', '_SELF')</script>";
	} else {
		echo "<script>alert('Record Not Been Inserted')</script>";
	}
}

/*
if(isset($_POST['add_data'])){
	
	//getting the text data from the fields
	$sid = $_POST['sid'];
    $rid = $_POST['rid'];
    $ruupdate = $_POST['ruupdate'];
	
	$add = "INSERT into 
	reports(rdate, rtime, rcampus, runit, rdesc, rstatus, rpic, sid)
    values('$rdate','$rtime','$rcampus','$runit','$rdesc','$rstatus','$rpic','$sid')";
	
	$insert_pro = mysqli_query($connect, $add);
	
	if($insert_pro){
		echo "<script>alert('New Record has been added to Database')</script>";
		echo "<script>window.open('dpo_index.php', '_SELF')</script>";
	}else{
		echo "<script>alert('Record Not Been Inserted')</script>";
	}
	}*/
?>