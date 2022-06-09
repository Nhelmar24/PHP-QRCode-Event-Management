<?php session_start(); ?>
<link rel="stylesheet" href="../css/style.css">
<?php include("../script/_db.php");
include("_head.php"); ?>
<?php
// including the database connection file


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
                <td width="90%"><?php echo $unname; ?></td>
            </tr>
        </table>
    </form>

</div>

<?php include("_footer.php"); ?>