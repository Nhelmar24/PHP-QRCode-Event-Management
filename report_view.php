<?php session_start();
$sid = $_SESSION['sid'];
$sfname = $_SESSION['sfname'];
?>
<link rel="stylesheet" href="css/style.css">
<?php include("script/_db.php");
include("_head.php");
include("_nav.php"); ?>
<?php
// including the database connection file

if (isset($_POST['add_message'])) {
    //getting the text data from the fields

    $rid = $_POST['rid'];
    $sid = $_POST['sid'];
    $mdetails = $_POST['mdetails'];
    $tag = $_POST['tag'];

    $add = "INSERT into 
	messages(rid, sid, mdetails, tag)
    values('$rid','$sid','$mdetails','$tag')";

    $insert_pro = mysqli_query($connect, $add);

    if ($insert_pro) {
        echo "<script>alert('New Record has been added to Database')</script>";
        echo "<script>window.open('report_view.php?rid=$rid', '_SELF')</script>";
    } else {
        echo "<script>alert('Record Not Been Inserted')</script>";
    }
}


//getting id from url
$rid = $_GET['rid'];

//selecting data associated with this particular id
//$result = mysqli_query($connect, "SELECT * FROM reports WHERE rid=$rid");

$result = mysqli_query($connect, "SELECT * FROM reports INNER JOIN students ON reports.sid = students.sid WHERE rid=$rid");

while ($res = mysqli_fetch_array($result)) {
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
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    DATA BREACH REPORT VIEW For<?php echo $sid ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Data Breach Information
                                </div>
                                <div class="card-body">
                                    <table width="100%">
                                        <tr>
                                            <td colspan="2">Location</td>
                                        </tr>
                                        <tr>
                                            <td align="right" width="20%">RSU Campus: </td>
                                            <td width="80%"><?php echo $rcampus; ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right">RSU Unit: </td>
                                            <td><?php echo $runit; ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right">Date: </td>
                                            <td><?php echo $rdate; ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right">Time: </td>
                                            <td><?php echo $rtime; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Data Breach Description</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><textarea style="padding:10px;" name="" id="" cols="40%" rows="10" readonly><?php echo $rdesc; ?></textarea>
                                            <td>
                                        </tr>
                                        <tr>
                                            <td>Evidence Photo</td>
                                        </tr>
                                        <td>
                                        <td><a href="report_pictures/<?php echo $rpic; ?>"><img width="200px" src="report_pictures/<?php echo $rpic; ?>"></a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-header">
                                    DPO Action Taken
                                </div>
                                <div class="card-body">
                                    <!--Ito yung magsend ng action taken sa database-->
                                    <form action="report-update_add.php" method="post" enctype="multipart/form-data">
                                        <table>
                                            <tr>

                                                <td colspan="2"><textarea style="padding:10px;" name="ruupdate" id="" cols="40%" rows="10" placeholder="Write your action here..." required /></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="rudate" value="<?php echo $date_today; ?>" />
                                                    <input type="hidden" name="rid" value="<?php echo $rid; ?>" />
                                                    <input type="hidden" name="sid" value="<?php echo $sid; ?>" />
                                                    <input class="view" type="submit" name="add_action" value="OK" />

                                                </td>
                                                </td>
                                                <td>
                                                    <a href="report_index.php" class="view">RETURN</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>


                                    <form action="report_edit.php" method="post" enctype="multipart/form-data">

                                        <table>
                                            <tr>
                                                <td>
                                                    <select name="rstatus" id="">
                                                        <option value="Waiting">Waiting</option>
                                                        <option value="Ongoing">Ongoing</option>
                                                        <option value="Done">Done</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="rid" value="<?php echo $rid; ?>">
                                                    <input class="tb-update" type="submit" name="update" value="Update">
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!--md6-->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Data Breach Messaging
                                </div>
                                 <div class="card-body">
                                    <table>
                                        <?php
                                        // including the database connection file

                                        $result = mysqli_query($connect, "SELECT * FROM messages WHERE rid=$rid");

                                        while ($res = mysqli_fetch_array($result)) {
                                            $rid = $res['rid'];
                                            $tag = $res['tag'];
                                            $mdetails = $res['mdetails'];

                                            echo "
    <tr><td>$tag</td><td>$mdetails</td></tr>
    ";
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                            <div class="card mt-5">
                                <div class="card-header">
                                    Create a message
                                </div>
                                <div class="">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <table width="100%">
                                        <tr>
                                            <input type="hidden" name="rid" value="<?php echo $rid; ?>" />
                                            <input type="hidden" name="sid" value="<?php echo $sid; ?>" />
                                            <input type="hidden" name="tag" value="<?php echo $sfname; ?> " />

                                            <td width="80%"><input style="padding:10px;" type="text" name="mdetails"></td>
                                            <td align="left"><input align="left" class="view" type="submit" name="add_message" value="Send" /></td>
                                        </tr>
                                    </table>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php include("_footer.php"); ?>