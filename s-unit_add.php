<?php session_start(); ?>
<?php include("script/_db.php"); include("_head.php"); include("_nav.php");


if(isset($_POST['add_data'])){
	
	//getting the text data from the fields
	$unname = $_POST['unname'];
	
	$add = "INSERT into 
	units(unname)
    values('$unname')";
	
	$insert_pro = mysqli_query($connect, $add);
	
	if($insert_pro){
		echo "<script>alert('New Record has been added to Database')</script>";
		echo "<script>window.open('settings_index.php', '_SELF')</script>";
	}else{
		echo "<script>alert('Record Not Been Inserted')</script>";
	}
	}
?>
<div style="padding:20px">
<h1>ADD UNIT PAGE</h1>
    <hr style="margin:5px 0px">
<form action="" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td width="15%">Unit Name</td>
            <td width="85%">
            	<input type="text" name="unname" autocomplete="off" required/>
            </td>
        </tr>
    </table><br />
	<input class="add" type="submit" name="add_data" value="Add Record"/>
</form>
</div>
<?php include("_footer.php"); ?>