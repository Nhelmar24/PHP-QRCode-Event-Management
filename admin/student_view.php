<?php include("../script/_db.php");
include("_head.php");
session_start();
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
<div class="dash-body">
    <div class="student_header">
        <h3>Student Information</h3>
    </div>
    <table border="0" class="table table-sm">
        <tr>
            <td>Last Name</td>
            <td><?php echo $slname; ?></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><?php echo $sfname; ?></td>
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
            <td>Campus</td>
            <td><?php echo $scampus; ?></td>
        </tr>
        <tr>
            <td>User Type</td>
            <td><?php echo $sutype; ?></td>
        </tr>
        <tr>
            <td>User Role</td>
            <td><?php echo $surole; ?></td>
        </tr>

        <!--tr> 
                <td>Email Address</td>
                <td><?php echo $semail; ?></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><?php echo $spass; ?></td>
            </tr-->
        <tr>
            <td>Status</td>
            <td><?php echo $sstatus; ?></td>
        </tr>
    </table>
    </form>


</div><?php include("_footer.php"); ?>