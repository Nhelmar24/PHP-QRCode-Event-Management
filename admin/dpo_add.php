<?php include("../script/_db.php"); include("_head.php");


if(isset($_POST['add_data'])){
	
	//getting the text data from the fields
	$rdate = $_POST['rdate'];
    $rtime = $_POST['rtime'];
    $rcampus = $_POST['rcampus'];
    $runit = $_POST['runit']; 
    $rdesc = $_POST['rdesc'];
    $rstatus = $_POST['rstatus'];
    $sid = $_POST['sid'];

    //getting the image from the fields
	$rpic = $_FILES['rpic']['name'];
	$rpic_tmp = $_FILES['rpic']['tmp_name'];
	
	move_uploaded_file($rpic_tmp,"../report_pictures/$rpic");
	
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
	}
?>
<div style="padding:20px">
<h1>DATA BREACH INFORMATION</h1>
    <hr style="margin:5px 0px">
<form action="" method="post" enctype="multipart/form-data">
    <table width="50%">
        <tr>
            <td width="20%">Date</td>
            <td width="80%"><input type="date" name="rdate" value="<?php echo $date_today; ?>" readonly></td>
        </tr>
		<tr>
            <td>Time</td>
            <td><input type="time" name="rtime" value="<?php echo $time_today; ?>" readonly></td>
        </tr>
		<tr>
            <td>RSU Campus</td>
            <td>
            <?php 
                global $mysqli;
                $resultCampus = $mysqli->query("SELECT cname FROM campus");
                    
                    ?>
                    <select name="rcampus">
                    <option>Please Select Campus Name</option>
					<?php
                        while($rows = $resultCampus->fetch_assoc()){
                            $cname = $rows['cname'];
                            echo "<option value='$cname'> $cname </option>";
                        }
                    ?>
            </td>
        </tr>
		<tr>
            <td>RSU Unit</td>
            <td>
            <?php 
                global $mysqli;
                $resultUnits = $mysqli->query("SELECT unname FROM units");
                    
                    ?>
                    <select name="runit">
                    <option>Please Select Unit Name</option>
					<?php
                        while($rows = $resultUnits->fetch_assoc()){
                            $unname = $rows['unname'];
                            echo "<option value='$unname'> $unname </option>";
                        }
                    ?>
            </td>
        </tr>
		<tr>
            <td>Description</td>
            <td><textarea name="rdesc" rows="10" cols="80%" style="padding:10px;"></textarea></td>
        </tr>
		<tr>
            <td>Upload Image</td>
            <td><input type="file" name="rpic" autocomplete="off" ></td>
        </tr>
		<tr>
			<td>
                <input type="hidden" name="rstatus" value="Waiting" required/>
                <input type="hidden" name="sid" value=0 required/>
                <input class="add" type="submit" name="add_data" value="Submit Data"/>
            </td>
		</tr>
    </table><br />
	
</form>
</div>
<?php include("_footer.php"); ?>