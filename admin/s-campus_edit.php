<?php session_start(); ?>
<link rel="stylesheet" href="../css/style.css">
<?php include("../script/_db.php");
include("_head.php"); ?>
<?php
// including the database connection file

if (isset($_POST['update'])) {
    $cid = $_POST['cid'];
    $cname = $_POST['cname'];

    // checking empty fields
    if (empty($cid)) {
        if (empty($cid)) {
            echo "<font color='red'>Campus Name field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($connect, "UPDATE campus SET 
			cname='$cname'
            
            
            WHERE cid=$cid
		");
        echo "<script>alert('Database successfully updated');</script>";
        echo "<script>window.location.href='settings_index.php?cid=$cid';</script>";
        exit;
    }
}
?>
<?php
//getting id from url
$cid = $_GET['cid'];

//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM campus WHERE cid=$cid");

while ($res = mysqli_fetch_array($result)) {
    $cid = $res['cid'];
    $cname = $res['cname'];
}
?>
<div style="padding:20px">
    <h1>CAMPUS EDIT PAGE</h1>
    <hr style="margin:5px 0px 10px 0px;">
    <a class="tb-cancel" href="settings_index.php?cid=<?php echo $cid; ?>">Cancel</a><br /><br />
    <form name="form1" method="post" action="">
        <table border="0" width="100%">
            <tr>
                <td width="10%">Campus Name</td>
                <td width="90%"><input type="text" name="cname" value="<?php echo $cname; ?>"></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="cid" value="<?php echo $cid; ?>">
                    <input class="tb-update" type="submit" name="update" value="Update">
                </td>
            </tr>
        </table>
    </form>

</div>

<?php include("_footer.php"); ?>