<?php include("../script/_db.php"); include("_head.php");?>
<?php
// including the database connection file
 
if(isset($_POST['update']))
{    
    $rid = $_POST['rid'];
	$rrecord = $_POST['rrecord'];
    
    // checking empty fields
    if(empty($rrecord)) {            
        if(empty($rrecord)) {echo "<font color='red'>First Name field is empty.</font><br/>";}       
    } else {    
        //updating the table
        $result = mysqli_query($connect, "UPDATE reports SET 
            rrecord='$rrecord'
            
            
            WHERE rid=$rid
		");
		echo "<script>alert('Record Has Been Deleted!!!');</script>";
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
    $rrecord = $res['rrecord'];
}
?>
<div style="padding:20px">
<h1 style="color:red;">DELETE RECORD???</h1>
    <hr style="margin:5px 0px">
    <form name="form1" method="post" action="">
        <table border="0" class="table table-sm">
            <tr> 
                <td>Date & Time</td>
                <td><?php echo $rdate;?><?php echo $rtime;?></td>
            </tr>
            <tr> 
                <td>Campus</td>
                <td><?php echo $rcampus;?></td>
            </tr>
            <tr> 
                <td>Unit</td>
                <td><?php echo $runit;?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><?php echo $rdesc;?></td>
            </tr>
            <tr>
            <td>Event Picture</td>
            <td><img src="../report_pictures/<?php echo $rpic;?>"></td>
        </tr>
        <tr>
            <td>
            <input type="hidden" name="rrecord" value="1"> 
            <input type="hidden" name="rid" value="<?php echo $rid;?>">    
            <input class="delete" type="submit" name="update" value="Proceed"></td>
        </tr>
        </table>
    </form>

    </div>
    <?php include("_footer.php"); ?>