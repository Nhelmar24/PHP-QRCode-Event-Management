<?php include("script/_db.php");
global $mysqli;

if (isset($_POST['add_data'])) {

    $sfname = $_POST['sfname'];
    $slname = $_POST['slname'];
    $sgender = $_POST['sgender'];
    $sbirthday = $_POST['sbirthday'];
    $scampus = $_POST['scampus'];
    $sunit = $_POST['sunit'];
    $sutype = $_POST['sutype'];
    $surole = $_POST['surole'];
    $sstatus = $_POST['sstatus'];
    $semail = $_POST['semail'];
    $spass = $_POST['spass'];
    $svpass = $_POST['svpass'];
    $svac = $_POST['svac'];
    $sbooster = $_POST['sbooster'];

    $sql = "SELECT * FROM students WHERE semail='$semail'";
    $res = mysqli_query($connect, $sql);

    if ($spass != $svpass) {
        echo "<script> alert('Password Not Match')</script>";
    } else {
        if (mysqli_num_rows($res) > 0) {
            echo "<script> alert('Sorry... Email Already Taken')</script>";
        } else {

            $add = "INSERT into 
            students(sfname,slname,sgender, sbirthday,scampus,sunit,sutype,surole,sstatus,semail,spass,svac,sbooster)
            values('$sfname','$slname','$sgender','$sbirthday','$scampus','$sunit','$sutype','$surole','$sstatus','$semail','$spass','$svac','$sbooster')";

            $insert_pro = mysqli_query($connect, $add);

            if ($insert_pro) {
                echo "<script>alert('Your Application has been sent!!!')</script>";
                echo "<script>window.open('index.php', '_SELF')</script>";
            } else {
                echo "<script>alert('Something wrong please contact administrator')</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<div class="login-body">
    <div class="login_body">
        <br><br>
        <form action="" method="post" autofill="off" autocomplete="off" enctype="multipart/form-data">
            <div class="container">
                <div class="row ">
                    <div class="col-md-2"></div>
                    <div class="col-md-8" style="background:rgba(0,255,0,0.2);padding:20px;border:1px solid rgba(255,255,255,0.5);border-radius:5px;">
                        <h3 style="color:#fff;">SEAMS REGISTRATION FORM

                        </h3>
                        <hr style="color:#fff;">
                        <div class="row">
                            <h4 style="color:#fff;">Personal Information</h4>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="First Name" class="form-label">First Name</label>
                                    <input type="text" class="form-control form-control-sm" id="fname" name="sfname" placeholder="">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Last Name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control form-control-sm" id="fname" name="slname" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="First Name" class="form-label" style="color:#fff;">Gender</label>
                                    <select class="form-control form-control-sm  text-dark" name="sgender" aria-label="Default select example">
                                        <option value="Are you Male or Female?">Are you Male or Female?</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Last Name" class="form-label">Birthday</label>
                                    <input type="date" class="form-control form-control-sm" id="fname" name="sbirthday" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Last Name" class="form-label text-white">Vaccination Status</label>
                                    <select class="form-control form-control-sm  text-dark" name="svac" aria-label="Default select example">
                                        <option value="Are you Vaccinated?">Are you Vaccinated?</option>
                                        <option value="Vaccinated">Full</option>
                                        <option value="Unvaccinated">Partial</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Last Name" class="form-label text-white">With Booster?</label>
                                    <select class="form-control form-control-sm  text-dark" name="sbooster" aria-label="Default select example">
                                        <option value="Choose Yes or No">Choose Yes or No</option>
                                        <option value="Yes">Yes</option>
                                        <option value="NO">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Last Name" class="form-label text-white">User Type</label>
                                    <select class="form-control form-control-sm  text-dark" name="sutype" aria-label="Default select example">
                                        <option value="Please Select Your Position">Please Select Your Position</option>
                                        <option value="Participant">Participant</option>
                                        <option value="Coordinator">Coordinator</option>
                                        <option value="D.P.O.">D.P.O.</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Last Name" class="form-label text-white">User Role</label>
                                    <select class="form-control form-control-sm  text-dark" name="surole" aria-label="Default select example">
                                        <option value="Please Select Your Role">Please Select Your Role</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="Student">Student</option>
                                        <option value="Non-Teaching">Non-Teaching</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="Last Name" class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-sm" id="fname" name="semail" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="Last Name" class="form-label">Password</label>
                                    <input type="password" class="form-control form-control-sm" id="fname" name="spass" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="Last Name" class="form-label">Verify Password</label>
                                    <input type="password" class="form-control form-control-sm" id="fname" name="svpass" placeholder="">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <h4 style="color:#fff;">Campus Information</h4>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="Last Name" class="form-label">Campus Name</label>
                                    <select name="scampus" class="form-control form-control-sm text-dark">
                                        <option class="text-white">Please Select Campus Name</option>
                                        <?php

                                        $resultCat = $mysqli->query("SELECT cname FROM campus");
                                        while ($rows = $resultCat->fetch_assoc()) {
                                            $cname = $rows['cname'];
                                            echo "<option value='$cname'> $cname </option>";
                                        }

                                        ?>
                                    </select>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="First Name" class="form-label">Unit Name</label>
                                <select name="sunit" class="form-control form-control-sm text-dark">
                                    <option class="text-white">Please Select Unit Name</option>
                                    <?php
                                    $resultUnit = $mysqli->query("SELECT unname FROM units");
                                    while ($rows = $resultUnit->fetch_assoc()) {
                                        $unname = $rows['unname'];
                                        echo "<option value='$unname'> $unname </option>";
                                    }
                                    ?>
                                </select>

                            </div>



                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="sstatus" value="1" />
                                <input class="btn btn-sm btn-primary" type="submit" name="add_data" value="Send Application" />
                                <button class="btn btn-warning btn-sm float-end"><a href="index.php">Cancel</a></button>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>


        </form>



    </div>
</div>
<style>
    * {
        font-family: 'PT Sans', sans-serif;
    }

    label {
        font-size: 12px;
    }

    .login-body {
        background: url(img/back2.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        width: 100%;
    }

    .login_body {
        background: rgba(0, 0, 0, 0.8);

        width: 100%;
    }

    .login_body .nav-link {
        color: #fff;
    }

    .login_body .form-label {
        color: #fff;
    }

    .login_body .form-control {
        background: #fff;
        color: #000;
    }

    .login_body .form-text {
        color: black;
    }

    .form-text a {
        color: #fff;
    }

    .form-text a:hover {
        color: yellow;
    }
</style>
<script src="js/jquery-3.6.0.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>