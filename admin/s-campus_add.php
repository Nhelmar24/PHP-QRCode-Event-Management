<?php session_start(); ?>
<?php include("../script/_db.php"); include("_head.php");


if(isset($_POST['add_data'])){
	
	//getting the text data from the fields
	$cname = $_POST['cname'];
	
	$add = "INSERT into 
	campus(cname)
    values('$cname')";
	
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
<h1>ADD CAMPUS PAGE</h1>
    <hr style="margin:5px 0px">
<form action="" method="post" enctype="multipart/form-data">
    <table width="50%">
        <tr>
            <td width="20%">Campus Name</td>
            <td width="80%">
            	<input type="text" name="cname" autocomplete="off" required/>
            </td>
        </tr>
		<tr>
			<td><input class="add" type="submit" name="add_data" value="Add Record"/></td>
		</tr>
    </table><br />
	
</form>
</div>
<?php include("_footer.php");?>