
<link rel="stylesheet" href="../css/style.css">
<?php include("../script/_db.php"); include("_head.php");?>
<?php
// including the database connection file
 

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
<h1>DPO VIEW PAGE</h1>
    <hr style="margin:5px 0px 10px 0px;">
    <form name="form1" method="post" action="">
        <table border="0" width="100%">
            <tr> 
                <td width="10%">Date Reported</td>
                <td width="90%"><?php echo $rdate;?></td>
            </tr>
            <tr> 
                <td width="10%">Time Reported</td>
                <td width="90%"><?php echo $rtime;?></td>
            </tr>
            <tr> 
                <td width="10%">Campus</td>
                <td width="90%"><?php echo $rcampus;?></td>
            </tr>
            <tr> 
                <td width="10%">Unit</td>
                <td width="90%"><?php echo $runit;?></td>
            </tr>
            <tr> 
                <td width="10%">Description</td>
                <td width="90%"><?php echo $rdesc;?></td>
            </tr>
            <tr> 
                <td width="10%">Attachment</td>
                <td width="90%"><img src="../report_pictures/<?php echo $rpic;?>"/></td>
            </tr>
        </table>
    </form>

</div>

<?php include("_footer.php"); ?>