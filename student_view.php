<?php
session_start();
include("script/_db.php");
include("_head.php");
include("_nav.php");

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
    $sunit = $res['sunit'];
    $surole = $res['surole'];
    $semail = $res['semail'];
    $spass = $res['spass'];
    $svac = $res['svac'];
    $sbooster = $res['sbooster'];
}
?>

<!--Script Start Here-->
<div style="padding:20px">
    <h1>USER DETAILS PAGE</h1>
    <hr style="margin:5px 0px">
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
            <td>Unit</td>
            <td><?php echo $sunit; ?></td>
        </tr>
        <tr>
            <td>User Type</td>
            <td><?php echo $sutype; ?></td>
        </tr>
        <tr>
            <td>User Role</td>
            <td><?php echo $surole; ?></td>
        </tr>

        <tr>
            <td>Vaccinated?</td>
            <td><?php echo $svac; ?></td>
        </tr>
        <tr>
            <td>Booster Status</td>
            <td><?php echo $sbooster; ?></td>
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
    </table>
    </form>
</div>
<?php include("_footer.php"); ?>