<?php session_start(); ?>
<link rel="stylesheet" href="../css/style.css">
<?php include("../script/_db.php");
include("_head.php"); ?>
<?php
// including the database connection file

if (isset($_POST['update'])) {
    $unid = $_POST['unid'];
    $unname = $_POST['unname'];

    // checking empty fields
    if (empty($unid)) {
        if (empty($unid)) {
            echo "<font color='red'>Unit Name field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($connect, "UPDATE units SET 
			unname='$unname'
            
            
            WHERE unid=$unid
		");
        echo "<script>alert('Database successfully updated');</script>";
        echo "<script>window.location.href='settings_index.php?cid=$cid';</script>";
        exit;
    }
}
?>
<?php
//getting id from url
$unid = $_GET['unid'];

//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM units WHERE unid=$unid");

while ($res = mysqli_fetch_array($result)) {
    $unid = $res['unid'];
    $unname = $res['unname'];
}
?>
<div style="padding:20px">
    <h1>UNIT EDIT PAGE</h1>
    <hr style="margin:5px 0px 10px 0px;">
    <a class="tb-cancel" href="settings_index.php?unid=<?php echo $unid; ?>">Cancel</a><br /><br />
    <form name="form1" method="post" action="">
        <table border="0" width="100%">
            <tr>
                <td width="10%">Unit Name</td>
                <td width="90%"><input type="text" name="unname" value="<?php echo $unname; ?>"></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="unid" value="<?php echo $unid; ?>">
                    <input class="tb-update" type="submit" name="update" value="Update">
                </td>
            </tr>
        </table>
    </form>

</div>

<?php include("_footer.php"); ?>