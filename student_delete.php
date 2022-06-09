<?php session_start(); ?>
<?php include("script/_db.php");
include("_head.php");
include("_nav.php"); ?>
<?php
// including the database connection file

if (isset($_POST['update'])) {
    $sid = $_POST['sid'];
    $sstatus = $_POST['sstatus'];

    // checking empty fields
    if (empty($sstatus)) {
        if (empty($sstatus)) {
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($connect, "UPDATE students SET 
            sstatus='$sstatus'
            
            
            WHERE sid=$sid
		");
        echo "<script>alert('Record Has Been Deleted!!!');</script>";
        echo "<script>window.location.href='student_index.php?sid=$sid';</script>";
        exit;
    }
}
?>
<?php
//getting id from url
$sid = $_GET['sid'];

//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM students WHERE sid=$sid");

while ($res = mysqli_fetch_array($result)) {
    $sid = $res['sid'];
    $sfname = $res['sfname'];
    $slname = $res['slname'];
    $sgender = $res['sgender'];
    $sbirthday = $res['sbirthday'];
    $sutype = $res['sutype'];
    $scampus = $res['scampus'];
    $surole = $res['surole'];
    $semail = $res['semail'];
    $spass = $res['spass'];
    $sstatus = $res['sstatus'];
}
?>
<div style="padding:20px">
    <h1 style="color:red;">DISAPPROVE RECORD???</h1>
    <hr style="margin:5px 0px">
    <form name="form1" method="post" action="">
        <table border="0" class="table table-sm">
            <tr>
                <td>Full Name</td>
                <td><?php echo $sfname; ?><?php echo $slname; ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php echo $sgender; ?></td>
            </tr>
            <tr>
                <td>Birthday</td>
                <td><?php echo $sbirthday; ?></td>
            </tr>
            <tr>
                <td>User Type</td>
                <td><?php echo $sutype; ?></td>
            </tr>
            <tr>
                <td>Campus Name</td>
                <td><?php echo $scampus; ?></td>
            </tr>
            <tr>
                <td>User Role</td>
                <td><?php echo $surole; ?></td>
            </tr>

            <tr>
                <td>Status</td>
                <td><?php
                    if ($sstatus = '0') {
                        echo "Activated";
                    } else {
                        echo "Unverified";
                    }

                    ?></td>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="sstatus" value="2">
                    <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                    <input class="delete" type="submit" name="update" value="Proceed">
                </td>
            </tr>
        </table>
    </form>

</div>
<?php include("_footer.php"); ?>