<?php session_start();
include "script/_db.php";
include "_head.php";
include('_nav.php'); 

$datenow = date('Y-m-d');?>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>DASHBOARD</h3>
                </div>
                <div class="card-body">
                    <div class="row">

                    
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                User Count
                            </div>
                            <div class="card-body">
                                <div class="row">

                                
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">
                                            Total Users
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            global $connect;
                                            $usersql = "SELECT * FROM students WHERE srecord='0'";
                                            if ($userresult = mysqli_query($connect, $usersql)) {
                                                $usercount = mysqli_num_rows($userresult);
                                                echo "<h2>" . $usercount . "</h2>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">
                                            Coordinator
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            global $connect;
                                            $sql = "SELECT * FROM students WHERE sutype='Coordinator'";
                                            if ($result = mysqli_query($connect, $sql)) {
                                                $rowcount = mysqli_num_rows($result);
                                                echo "<h2>" . $rowcount . "</h2>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">
                                            Student
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            global $connect;
                                            $sql = "SELECT * FROM students WHERE sutype='Student'";
                                            if ($result = mysqli_query($connect, $sql)) {
                                                $rowcount = mysqli_num_rows($result);
                                                echo "<h2>" . $rowcount . "</h2>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">
                                            Guest
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            global $connect;
                                            $sql = "SELECT * FROM students WHERE sutype='Guest'";
                                            if ($result = mysqli_query($connect, $sql)) {
                                                $rowcount = mysqli_num_rows($result);
                                                echo "<h2>" . $rowcount . "</h2>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Events Count
                            </div>
                            <div class="card-body">
                                <div class="row">

                                
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">
                                            Total Events
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            global $connect;
                                            $sql = "SELECT * FROM events";
                                            if ($result = mysqli_query($connect, $sql)) {
                                                $countall = mysqli_num_rows($result);
                                                echo "<h2>" . $countall . "</h2>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">
                                            Finished
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            global $connect;
                                            $sql = "SELECT * FROM events WHERE edateend < '$datenow'";
                                            if ($result = mysqli_query($connect, $sql)) {
                                                $countfin = mysqli_num_rows($result);
                                                echo "<h2>" . $countfin . "</h2>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">
                                            Ongoing
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            global $connect;
                                            $sql = "SELECT * FROM events WHERE edatestart = '$datenow'";
                                            if ($result = mysqli_query($connect, $sql)) {
                                                $countnow = mysqli_num_rows($result);
                                                echo "<h2>" . $countnow . "</h2>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card green">
                                        <div class="card-header greeen">
                                            Upcoming
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            global $connect;
                                            $sql = "SELECT * FROM events WHERE edatestart > '$datenow'";
                                            if ($result = mysqli_query($connect, $sql)) {
                                                $countup = mysqli_num_rows($result);
                                                echo "<h2>" . $countup . "</h2>";
                                            }
                                            ?>
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
        </div>
    </div>
</div>
    
<?php include("_footer.php"); ?>
<style>
    .green{background:rgba(0,255,0,0.2);border:1px solid rgba(0,255,0,0.7);}
    .greeen{background:green;color:#fff;}

    .red{background:rgba(0,255,0,0.2);border:1px solid rgba(0,255,0,0.7);}
    .reed{background:green;color:#fff;}

    .blue{background:rgba(0,255,0,0.2);border:1px solid rgba(0,255,0,0.7);}
    .bluue{background:green;color:#fff;}
</style>