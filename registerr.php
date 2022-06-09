<?php include("script/_db.php");
global $mysqli;

if (isset($_POST['add_data'])) {

    $sfname = $_POST['sfname'];
    $slname = $_POST['slname'];
    $sgender = $_POST['sgender'];
    $sbirthday = $_POST['sbirthday'];
    $scampus = $_POST['scampus'];
    $sunit = $_POST['sunit'];
    $sstatus = $_POST['sstatus'];
    $semail = $_POST['semail'];
    $spass = $_POST['spass'];

    $sql = "SELECT * FROM students WHERE semail='$semail'";
    $res = mysqli_query($connect, $sql);

    if (mysqli_num_rows($res) > 0) {
        echo "<script> alert('Sorry... Email Already Taken')</script>";
    } else {

        $add = "INSERT into 
        students(sfname,slname,sgender, sbirthday,scampus,sunit,sstatus,semail,spass)
        values('$sfname','$slname','$sgender','$sbirthday','$scampus','$sunit','$sstatus','$semail','$spass')";

        $insert_pro = mysqli_query($connect, $add);

        if ($insert_pro) {
            echo "<script>alert('Your Application has been sent!!!')</script>";
            echo "<script>window.open('index.php', '_SELF')</script>";
        } else {
            echo "<script>alert('Something wrong please contact administrator')</script>";
        }
    }
}
?>
<div class="wrapper">
    <div class="reg_form">
        <div class="reg-form">
            <h3>Users Registration Form</h3>
            <form action="" method="post" autofill="off" autocomplete="off" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td width="25%" align="right">First Name</td>
                        <td width="75%">
                            <input type="text" name="sfname" autocomplete="off" required />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Last Name</td>
                        <td>
                            <input type="text" name="slname" autocomplete="off" required />
                        </td>
                    </tr>

                    <tr>
                        <td align="right">Gender</td>
                        <td><select name="sgender" id="">
                                <option>Please Select Your Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Birthday</td>
                        <td><input type="date" name="sbirthday" autocomplete="off" required />
                        </td>
                    </tr>

                    <tr>
                        <td align="right">Campus Name</td>
                        <td>
                            <select name="scampus">
                                <option>Please Select Campus Name</option>
                                <?php

                                $resultCat = $mysqli->query("SELECT cname FROM campus");
                                while ($rows = $resultCat->fetch_assoc()) {
                                    $cname = $rows['cname'];
                                    echo "<option value='$cname'> $cname </option>";
                                }

                                ?>
                        </td>
                    </tr>

                    <tr>
                        <td align="right">Unit Name</td>
                        <td>
                            <select name="sunit">
                                <option>Please Select Unit Name</option>
                                <?php
                                $resultUnit = $mysqli->query("SELECT unname FROM units");
                                while ($rows = $resultUnit->fetch_assoc()) {
                                    $unname = $rows['unname'];
                                    echo "<option value='$unname'> $unname </option>";
                                }
                                ?>
                        </td>
                    </tr>

                    <tr>
                        <td align="right">Email</td>
                        <td><input type="email" name="semail" autocomplete="off" required />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Password</td>
                        <td><input type="password" name="spass" autocomplete="off" required />
                        </td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="sstatus" value="1" /></td>
                        <td><input align="center" class="btn-request" type="submit" name="add_data" value="Request" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="index.php">
                                <h5>Login as Users</h5>
                            </a></td>
                    </tr>

                </table>
                <br />
            </form>
        </div>
    </div>
</div>

<style>
    * {
        font-family: 'Raleway', sans-serif;
        margin: 0;
        padding: 0;
    }

    .wrapper {
        overflow: hidden;
        background: url(img/back2.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        width: 100%;
        height: 100vh;
    }

    .reg_form {
        padding: 50px 20px;
    }

    .reg-form {
        width: 40%;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 5px;
    }

    .reg-form h3 {
        font-size: 24px;
        text-align: center;
        padding: 10px;
    }

    .reg-form table {
        width: 100%;
        background: none;
    }

    .reg-form table tr td {
        padding: 5px;
    }

    .reg-form table tr td input {
        padding: 5px;
        width: 100%;
    }

    .reg-form table tr td select {
        width: 100%;
        padding: 5px;
    }

    .reg-form table tr td option {
        width: 100%;
        padding: 5px;
    }

    .reg-form .btn-request {
        border: none;
        width: 30%;
        border-radius: 5px;
        color: #fff;
        text-align: center;
        margin: 0 auto;
        background: green;
    }
</style>