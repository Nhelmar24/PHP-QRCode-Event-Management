<?php include("../script/_db.php");include("_head.php");
session_start();
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
    $eaudience  = $res['eaudience'];
    $edatestart = $res['edatestart'];
    $edateend = $res['edateend'];
    $etimestart = $res['etimestart'];
    $etimeend = $res['etimeend'];
};
?>
<div class="student_header">
    <h3>Event Information</h3>
</div>
    <table border="0" class="table table-sm">
            <tr> 
                <td>Event Name</td>
                <td><?php echo $ename;?></td>
            </tr>
            <tr> 
                <td>Event Description</td>
                <td><?php echo $edesc;?></td>
            </tr>
            <tr> 
                <td>Event Coordinator</td>
                <td><?php echo $ecoor;?></td>
            </tr>
            <tr> 
                <td>Event Location</td>
                <td><?php echo $elocation;?></td>
            </tr>
            <tr> 
                <td>Event Audience</td>
                <td><?php echo $eaudience;?></td>
            </tr>
            <tr> 
                <td>Date Start</td>
                <td><?php echo $edatestart;?></td>
            </tr>
            <tr> 
                <td>Date End</td>
                <td><?php echo $edateend;?></td>
            </tr>
            <tr> 
                <td>Time Start</td>
                <td><?php echo $etimestart;?></td>
            </tr>
            <tr> 
                <td>Time End</td>
                <td><?php echo $etimeend;?></td>
            </tr>
            
            
        </table>
    </form><?php include("_footer.php");?>