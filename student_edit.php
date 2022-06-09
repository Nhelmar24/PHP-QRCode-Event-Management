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
        echo "<script>alert('Database successfully updated');</script>";
        echo "<script>window.location.href='student_edit.php?sid=$sid';</script>";
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
    $sunit = $res['sunit'];
    $surole = $res['surole'];
    $sstatus = $res['sstatus'];
    $svac = $res['svac'];
    $sbooster = $res['sbooster'];
}
?>
<div style="padding:20px">
    <h1>USER EDIT PAGE</h1>
    <hr style="margin:5px 0px">
    <form name="form1" method="post" action="">
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
                <td>User Type</td>
                <td><?php echo $sutype; ?></td>
            </tr>
            <tr>
                <td>User Role</td>
                <td><?php echo $sutype; ?>></td>
            </tr>
            <tr>
                <td>Vaccinated?</td>
                <td><?php echo $svac; ?></td>
            </tr>
            <tr>
                <td>Booster?</td>
                <td><?php echo $sbooster; ?></td>
            </tr>

            <tr>
                <td>Campus Name</td>
                <td>
                    <?php
                    global $mysqli;
                    $resultCname = $mysqli->query("SELECT cname FROM campus");
                    echo $scampus; ?>
                </td>
            </tr>

            <tr>
                <td>Unit Name</td>
                <td>
                    <?php
                    global $mysqli;
                    $resultUnit = $mysqli->query("SELECT unname FROM units");
                     echo $sunit; ?>
                </td>
            </tr>


            <td>Status</td>
            <td><select name="sstatus">
                    <option>
                        <?php
                        if ($sstatus == 1) {
                            echo 'Deactivated';
                        } else {
                            echo 'Activated';
                        }
                        ?>
                    </option>
                    <option value=0>Activate</option>
                    <option value=1>Deactivate</option>
                </select>
            </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                    <input class="tb-update" type="submit" name="update" value="Activate">
                </td>
            </tr>
        </table>
    </form>

</div>
<?php include("_footer.php"); ?>