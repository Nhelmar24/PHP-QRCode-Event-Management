<?php session_start(); ?>
<?php include("script/_db.php");
include("_head.php");
include("_nav.php"); ?>
<?php
//getting id from url
$eid = $_GET['eid'];

//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM events WHERE eid=$eid");

while ($res = mysqli_fetch_array($result)) {
    $eid = $res['eid'];
    $ename = $res['ename'];
    $edesc = $res['edesc'];
    $ecoor = $res['ecoor'];
    $elocation = $res['elocation'];
    $evenue = $res['evenue'];
    $eaudience = $res['eaudience'];
    $edatestart = $res['edatestart'];
    $edateend = $res['edateend'];
    $etimestart = $res['etimestart'];
    $etimeend = $res['etimeend'];
}
?>
<div style="padding:20px">
    <h1>EVENT PAGE</h1>
    <hr style="margin:5px 0px">
    <form name="form1" method="post" action="">
        <table border="0" class="table table-sm" width="100%">
            <tr>
                <td width="15%">Event Name</td>
                <td width="85%"><?php echo $ename; ?></td>
            </tr>
            <tr>
                <td>Event Description</td>
                <td><?php echo $edesc; ?></td>
            </tr>
            <tr>
                <td>Event Location</td>
                <td><?php echo $elocation; ?>
                </td>
            </tr>
            <tr>
                <td>Event Venue</td>
                <td><?php echo $evenue; ?>
                </td>
            </tr>
            <tr>
                <td>Audience</td>
                <td><?php echo $eaudience; ?></td>
            </tr>
            <tr>
                <td>Event Coordinator</td>
                <td><?php echo $ecoor; ?></td>
            </tr>
            <tr>
                <td>Date Start</td>
                <td><?php echo $edatestart; ?></td>
            </tr>
            <tr>
                <td>Date Start</td>
                <td><?php echo $edateend; ?></td>
            </tr>
            <tr>
                <td>Time Start</td>
                <td><?php echo $etimestart; ?></td>
            </tr>
            <tr>
                <td>Time End</td>
                <td><?php echo $etimeend; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php


                    ?>
                </td>
            </tr>
        </table>
        <div class="row">
            <div class="col">
                <button class="btn btn-warning btn-sm float-end"><a href="event_index.php">Cancel</a></button>
            </div>
    </form>
</div>



<?php include("_footer.php"); ?>