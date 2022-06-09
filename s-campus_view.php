<?php session_start(); ?>
<link rel="stylesheet" href="css/style.css">
<?php include("script/_db.php"); include("_head.php"); include("_nav.php");?>
<?php
// including the database connection file
 

//getting id from url
$cid = $_GET['cid'];
 
//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM campus WHERE cid=$cid");
 
while($res = mysqli_fetch_array($result))
{
    $cid = $res['cid'];
    $cname = $res['cname'];
}
?>
<div style="padding:20px">
<h1>CAMPUS EDIT PAGE</h1>
    <hr style="margin:5px 0px 10px 0px;">
    <a class="tb-cancel" href="settings_index.php?cid=<?php echo $cid;?>">Cancel</a><br /><br />
    <form name="form1" method="post" action="">
        <table border="0" width="100%">
            <tr> 
                <td width="10%">Campus Name</td>
                <td width="90%"><?php echo $cname;?></td>
            </tr>
        </table>
    </form>

</div>

<?php include("_footer.php"); ?>