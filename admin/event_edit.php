<?php include("../script/_db.php"); include("_head.php");?>
<?php
// including the database connection file
 
if(isset($_POST['update']))
{    
    $eid = $_POST['eid'];
	$ename = $_POST['ename'];
    $edesc=$_POST['edesc'];
    $ecoor=$_POST['ecoor'];
    $elocation=$_POST['elocation'];
    $eunits=$_POST['eunits'];
    $eaudience=$_POST['eaudience'];
    $edatestart=$_POST['edatestart']; 
    $edateend=$_POST['edateend'];
    $etimestart=$_POST['etimestart'];
    $etimeend=$_POST['etimeend'];
    
    // checking empty fields
    if(empty($eid) || empty($ename) || empty($edesc)) {            
        if(empty($eid)) {echo "<font color='red'>First Name field is empty.</font><br/>";}
		if(empty($ename)) {echo "<font color='red'>Model field is empty.</font><br/>";}
		if(empty($edesc)) {echo "<font color='red'>Specs field is empty.</font><br/>";}        
    } else {    
        //updating the table
        $result = mysqli_query($connect, "UPDATE events SET 
			ename='$ename',
			edesc='$edesc',
			ecoor='$ecoor',
            elocation='$elocation',
            eunits='$eunits',
            eaudience='$eaudience',
			edatestart='$edatestart',
			edateend='$edateend',
			etimestart='$etimestart',
            etimeend='$etimeend'
            
            
            WHERE eid=$eid
		");
		echo "<script>alert('Database successfully updated');</script>";
		echo "<script>window.location.href='event_view.php?eid=$eid';</script>";
    exit;
    }
}
?>
<?php
//getting id from url
$eid = $_GET['eid'];
 
//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM events WHERE eid=$eid");
 
while($res = mysqli_fetch_array($result))
{
    $eid = $res['eid'];
    $ename = $res['ename']; 
    $edesc = $res['edesc'];
    $ecoor = $res['ecoor'];
    $elocation = $res['elocation'];
    $eunits = $res['eunits'];
    $eaudience = $res['eaudience'];
    $edatestart = $res['edatestart'];
    $edateend = $res['edateend'];
    $etimestart = $res['etimestart'];
    $etimeend = $res['etimeend'];
}
?>
    <form name="form1" method="post" action="">
        <table border="0" class="table table-sm">
            <tr> 
                <td>Event Name</td>
                <td><input type="text" name="ename" value="<?php echo $ename;?>"></td>
            </tr>
            <tr> 
                <td>Event Description</td>
                <td><input type="text" name="edesc" value="<?php echo $edesc;?>"></td>
            </tr>
            <tr>
            <td>Event Location</td>
            <td><select name="elocation" id="">
                <option><?php echo $elocation;?></option>
                <option value="RSU - Odiongan Campus Main">RSU - Odiongan Campus Main</option>
                <option value="RSU - Romblon Campus Sawang">RSU - Romblon Campus Sawang</option>
                <option value="RSU - Tablas Campus San Andres">RSU - Tablas Campus San Andres</option>
                <option value="RSU - Tablas Campus San Agustin">RSU - Tablas Campus San Agustin</option>
                <option value="RSU - Tablas Campus Sta. Maria">RSU - Tablas Campus Sta. Maria</option>
                <option value="RSU - Tablas Campus Sta. Fe">RSU - Tablas Campus Sta. Fe</option>
                <option value="RSU - Sibuyan Campus Cajidiocan">RSU - Sibuyan Campus Cajidiocan</option>
                <option value="RSU - Sibuyan Campus San Fernando">RSU - Sibuyan Campus San Fernando</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Event Unit</td>
            <td>
            <?php 
                global $mysqli;
                $resultUnit = $mysqli->query("SELECT unname FROM units");
                    
                    ?>
                    <select name="eunits">
                    <option><?php echo $eunits; ?></option>
					<?php
                        while($rows = $resultUnit->fetch_assoc()){
                            $unname = $rows['unname'];
                            echo "<option value='$unname'> $unname </option>";
                        }
                    ?>
            </td>
        </tr>
        <tr>
            <td>Audience</td>
            <td><select name="eaudience" id="">
                <option><?php echo $eaudience;?></option>
                <option value="Global">Global</option>
                <option value="Local">Local</option>
            </select>
            </td>
        </tr>
            <tr>
            <td>Event Coordinator</td>
            <td>
            <?php 
                $mysqli = NEW MySQLi('localhost','root','','events');

                $resultCat = $mysqli->query("SELECT sfname FROM students WHERE sutype = 'Coordinator'");
                    
                    ?>
                    <select name="ecoor">
                    <option><?php echo $ecoor; ?></option>
					<?php
                        while($rows = $resultCat->fetch_assoc()){
                            $sfname = $rows['sfname'];
                            echo "<option value='$sfname'> $sfname </option>";
                        }
                    ?>
            </td>
        </tr>
            <tr> 
                <td>Date Start</td>
                <td><input type="date" name="edatestart" value="<?php echo $edatestart;?>"></td>
            </tr>
            <tr> 
                <td>Date Start</td>
                <td><input type="date" name="edateend" value="<?php echo $edateend;?>"></td>
            </tr>
            <tr> 
                <td>Time Start</td>
                <td><input type="time" name="etimestart" value="<?php echo $etimestart;?>"></td>
            </tr>
            <tr> 
                <td>Time End</td>
                <td><input type="time" name="etimeend" value="<?php echo $etimeend;?>"></td>
            </tr>
       
        <tr>
            <td>
            <input type="hidden" name="eid" value="<?php echo $eid;?>">    
            <input type="submit" name="update" value="Update"></td>
        </tr>
        </table>
    </form>

    </div>
</div><?php include("_footer.php");?>