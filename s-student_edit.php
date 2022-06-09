<?php session_start(); ?>
<?php include("script/_db.php");
include("_head.php");
include("_nav.php"); ?>
<?php
// including the database connection file

if (isset($_POST['update'])) {
    $sid = $_POST['sid'];
    $sfname = $_POST['sfname'];
    $slname = $_POST['slname'];
    $sgender = $_POST['sgender'];
    $sbirthday = $_POST['sbirthday'];
    $scampus = $_POST['scampus'];
    $semail = $_POST['semail'];
    $spass = $_POST['spass'];

    // checking empty fields
    if (empty($sfname) || empty($slname) || empty($sgender)) {
        if (empty($sfname)) {
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }
        if (empty($slname)) {
            echo "<font color='red'>Model field is empty.</font><br/>";
        }
        if (empty($sgender)) {
            echo "<font color='red'>Specs field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($connect, "UPDATE students SET 
			sfname='$sfname',
			slname='$slname',
			sgender='$sgender',
			sbirthday='$sbirthday',
			scampus='$scampus',
            semail='$semail',
            spass='$spass'
            
            
            WHERE sid=$sid
		");
        echo "<script>alert('Database successfully updated');</script>";
        echo "<script>window.location.href='settings_index.php?sid=$sid';</script>";
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
    <h1>Coordinator EDIT PAGE</h1>
    <hr style="margin:5px 0px">
    <form name="form1" method="post" action="">
        <table border="0" class="table table-sm">
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="slname" value="<?php echo $slname; ?>"></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="sfname" value="<?php echo $sfname; ?>"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><select name="sgender" id="">
                        <option><?php echo $sgender; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </td>
            </tr>
            </tr>
            <tr>
                <td>Birthday</td>
                <td><input type="date" name="sbirthday" value="<?php echo $sbirthday; ?>"></td>
            </tr>

            <tr>
                <td>Campus Name</td>
                <td>
                    <select name="cname">
                        <?php

                        global $mysqli;
                        $resultCat = $mysqli->query("SELECT cname FROM campus");

                        while ($rows = $resultCat->fetch_assoc()) {
                            $cname = $rows['cname'];
                            echo "<option value='$cname'> $cname </option>";
                        }
                        ?>
                </td>
            </tr>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="text" name="semail" value="<?php echo $semail; ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="spass" value="<?php echo $spass; ?>"></td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                    <input class="tb-update" type="submit" name="update" value="Update">
                </td>
            </tr>
        </table>
    </form>

</div>
<?php include("_footer.php"); ?>