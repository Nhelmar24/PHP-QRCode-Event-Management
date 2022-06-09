<?php include("../script/_db.php");
include("_head.php");
session_start();
if (isset($_POST['add_data'])) {

    //getting the text data from the fields
    $ename = $_POST['ename'];
    $edesc = $_POST['edesc'];
    $elocation = $_POST['elocation'];
    $eunits = $_POST['eunits'];
    $eaudience = $_POST['eaudience'];
    $ecoor = $_POST['ecoor'];
    $edatestart = $_POST['edatestart'];
    $edateend = $_POST['edateend'];
    $etimestart = $_POST['etimestart'];
    $etimeend = $_POST['etimeend'];

    $add = "INSERT into 
	events(ename,edesc,ecoor,elocation,eunits,eaudience, edatestart,edateend,etimestart,etimeend)
    values('$ename','$edesc','$ecoor','$elocation','$eunits','$eaudience','$edatestart','$edateend','$etimestart','$etimeend')";

    $insert_pro = mysqli_query($connect, $add);

    if ($insert_pro) {
        echo "<script>alert('New Record has been added to Database')</script>";
        echo "<script>window.open('event_index.php', '_SELF')</script>";
    } else {
        echo "<script>alert('Record Not Been Inserted')</script>";
    }
}
?>
<style>
    .admin_student {
        padding: 20px;
    }

    .admin_student h3 {
        background: rgba(25, 25, 25, 0.3);
        padding: 5px;
        margin-bottom: 5px;
        border-radius: 5px;
        border: 1px solid rgba(25, 25, 25, 0.5);
    }

    .admin_student table tr td {
        padding: 5px;
    }

    .admin_student table tr td input {
        padding: 5px;
    }

    .admin_student table tr td select option {
        padding: 5px;
    }
</style>
<div class="admin_student">
    <h3>Add Event Information</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Event Name</td>
                <td>
                    <input type="text" name="ename" autocomplete="off" required />
                </td>
            </tr>
            <tr>
                <td>Event Description</td>
                <td>
                    <input type="text" name="edesc" autocomplete="off" required />
                </td>
            </tr>
            <tr>
                <td>Event Location</td>
                <td><select name="elocation" id="">
                        <option>Please Select Campus</option>
                        <?php
                        global $mysqli;
                        $resultCat = $mysqli->query("SELECT cname FROM campus");

                        ?>
                        <?php
                        while ($rows = $resultCat->fetch_assoc()) {
                            $cname = $rows['cname'];
                            echo "<option value='$cname'> $cname </option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Event Unit</td>
                <td><select name="eunits" id="">
                        <option>Please Select Unit</option>
                        <option value="All Units">All Units</option>
                        <?php
                        global $mysqli;
                        $resultUnits = $mysqli->query("SELECT unname FROM units");

                        ?>
                        <?php
                        while ($rows = $resultUnits->fetch_assoc()) {
                            $unname = $rows['unname'];
                            echo "<option value='$unname'> $unname </option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Audience</td>
                <td><select name="eaudience" id="">
                        <option>Please Select Audience</option>
                        <option value="Global">Global</option>
                        <option value="Local">Local</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Event Coordinator</td>
                <td>
                    <?php
                    $mysqli = new MySQLi('localhost', 'root', '', 'events');

                    $resultCat = $mysqli->query("SELECT sfname FROM students WHERE sutype = 'Coordinator'");
                    ?>
                    <select name="ecoor">
                        <option>Please Select A Coordinator</option>
                        <?php
                        while ($rows = $resultCat->fetch_assoc()) {
                            $sfname = $rows['sfname'];
                            echo "<option value='$sfname'> $sfname </option>";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td>Date Start</td>
                <td>
                    <input type="date" name="edatestart" autocomplete="off" required />
                </td>
            </tr>
            <tr>
                <td>Date End</td>
                <td>
                    <input type="date" name="edateend" autocomplete="off" required />
                </td>
            </tr>
            <tr>
                <td>Time Start</td>
                <td>
                    <input type="time" name="etimestart" autocomplete="off" required />
                </td>
            </tr>
            <tr>
                <td>Time End</td>
                <td>
                    <input type="time" name="etimeend" autocomplete="off" required />
                </td>
            </tr>
        </table>
        <input class="btn btn-success" type="submit" name="add_data" value="Save Event" />
    </form>
</div>
<?php include("_footer.php"); ?>