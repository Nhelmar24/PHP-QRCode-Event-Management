<?php session_start(); ?>
<link rel="stylesheet" href="css/style.css">
<?php include("script/_db.php");
include("_head.php");
include("_nav.php"); ?>
<?php
// including the database connection file

if (isset($_POST['update'])) {
    $eid = $_POST['eid'];
    $estatus = $_POST['estatus'];

    // checking empty fields
    if (empty($eid)) {
        if (empty($eid)) {
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($connect, "UPDATE events SET 
			estatus='$estatus'
            
            
            WHERE eid=$eid
		");
        echo "<script>alert('Event Status Updated');</script>";
        echo "<script>window.location.href='event_index.php?eid=$eid';</script>";
        exit;
    }
}
?>
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
    $eunits = $res['eunits'];
    $eaudience = $res['eaudience'];
    $edatestart = $res['edatestart'];
    $edateend = $res['edateend'];
    $etimestart = $res['etimestart'];
    $etimeend = $res['etimeend'];
    $estatus = $res['estatus'];
}
?>
<div style="padding:20px">
    <h1>DELETE THIS EVENT? </h1>
    <hr style="margin:5px 0px 10px 0px;">
    <form name="form1" method="post" action="">
        <table border="0" width="100%">
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
                <td><?php echo $elocation; ?></td>
            </tr>
            <tr>
                <td>Event Unit</td>
                <td><?php echo $eunits; ?></td>
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
                <td>Date End</td>
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
                <td>
                    <input type="hidden" name="estatus" value=2>
                    <input type="hidden" name="eid" value="<?php echo $eid; ?>">
                    <input class="delete" type="submit" name="update" value="Delete">
                </td>
            </tr>
        </table>
    </form>

</div>

<?php include("_footer.php"); ?>