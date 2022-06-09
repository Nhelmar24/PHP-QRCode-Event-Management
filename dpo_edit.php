<?php session_start(); ?>
<link rel="stylesheet" href="css/style.css">
<?php include("script/_db.php"); include("_head.php"); include("_nav.php");?>
<?php
// including the database connection file
 
if(isset($_POST['update']))
{    
    $rid = $_POST['rid'];
	$rdate = $_POST['rdate'];
    $rtime = $_POST['rtime'];
    $rcampus = $_POST['rcampus'];
    $runit = $_POST['runit'];
    $rdesc = $_POST['rdesc'];
    

    //getting the image from the fields
	$rpic = $_FILES['rpic']['name'];
	$rpic_tmp = $_FILES['rpic']['tmp_name'];
	
	move_uploaded_file($rpic_tmp,"report_pictures/$rpic");

    // checking empty fields
    if(empty($rid)) {            
        if(empty($rid)) {echo "<font color='red'>Campus Name field is empty.</font><br/>";}      
    } else {    
        //updating the table
        $result = mysqli_query($connect, "UPDATE reports SET 
			rdate='$rdate',
            rtime='$rtime',
            rcampus='$rcampus',
            runit='$runit',
            rdesc='$rdesc',
            rpic='$rpic'
            
            
            WHERE rid=$rid
		");
		echo "<script>alert('Database successfully updated');</script>";
		echo "<script>window.location.href='dpo_index.php?rid=$rid';</script>";
    exit;
    }
}
?>
<?php
//getting id from url
$rid = $_GET['rid'];
 
//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM reports WHERE rid=$rid");
 
while($res = mysqli_fetch_array($result))
{
    $rid = $res['rid'];
    $rdate = $res['rdate'];
    $rtime = $res['rtime'];
    $rcampus = $res['rcampus'];
    $runit = $res['runit'];
    $rdesc = $res['rdesc'];
    $rpic = $res['rpic'];
    $rstatus = $res['rstatus'];
}
?>
<div style="padding:20px">
<h1>REPORT EDIT PAGE</h1>
    <hr style="margin:5px 0px 10px 0px;">
    <form name="form1" method="post" action="">
        <table border="0" width="100%">
            <tr> 
                <td width="10%">Date Reported</td>
                <td width="90%"><input type="date" name="rdate" value="<?php echo $rdate;?>"></td>
            </tr>
            <tr> 
                <td>Time Reported</td>
                <td><input type="time" name="rtime" value="<?php echo $rtime;?>"></td>
            </tr>
            <tr> 
                <td>RSU Campus</td>
                <td><select name="rcampus" id="">
                <option><?php echo $rcampus; ?></option>
                <?php 
                global $mysqli;
                $resultCat = $mysqli->query("SELECT cname FROM campus");
                    ?>
					<?php
                        while($rows = $resultCat->fetch_assoc()){
                            $cname = $rows['cname'];
                            echo "<option value='$cname'> $cname </option>";
                        }
                    ?>
            </td>
            </tr>
            <tr>
            <td>RSU Unit</td>
            <td><select name="runit" id="">
                <option><?php echo $runit?></option>
                <?php 
                global $mysqli;
                $resultCat = $mysqli->query("SELECT unname FROM units");
                    ?>
					<?php
                        while($rows = $resultCat->fetch_assoc()){
                            $unname = $rows['unname'];
                            echo "<option value='$unname'> $unname </option>";
                        }
                    ?>
            </td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name="rdesc" rows="10" cols="80%" style="padding:10px;" ><?php echo $rdesc; ?></textarea></td>
        </tr>
        <tr>
            <td>Change Image</td>
            <td><input type="file" name="rpic" autocomplete="off" required/>
                <img src="report_pictures/<?php echo $rdesc; ?>">
        </td>
        </tr>
        <tr>
            <td>
            <input type="hidden" name="rid" value="<?php echo $rid;?>">
            <input class="tb-update" type="submit" name="update" value="Update"></td>
        </tr>
        </table>
    </form>

</div>

<?php include("_footer.php"); ?>