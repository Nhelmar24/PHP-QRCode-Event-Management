<?php session_start(); ?>
<?php include("script/_db.php");
include("_head.php");
include("_nav.php"); ?>
<br>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <?php
            //getting id from url
            $eid = $_GET['eid'];

            $result = mysqli_query($connect, "SELECT * FROM events WHERE eid=$eid");

            while ($res = mysqli_fetch_array($result)) {

                $ename = $res['ename'];
                $edate = $res['edatestart'];

                echo "<h4>" . $ename . " Attendance : " . $edate . "</h4>";
            } ?>
        </div>
        <div class="col-md-6">
            <h4 class="float-end">
                Total Number of Attendee:
                <?php
                //getting id from url
                $eid = $_GET['eid'];
                global $connect;
                $sql =
                    "SELECT *
            FROM attend 
            LEFT JOIN students
            ON attend.sid = students.sid WHERE eid='$eid'
            ";
                if ($result = mysqli_query($connect, $sql)) {
                    $rowcount = mysqli_num_rows($result);
                    echo  $rowcount;
                }
                ?>
            </h4>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Participant Female <h6 class="float-end">
                        <?php
                        //getting id from url
                        $eid = $_GET['eid'];
                        global $connect;
                        $sql =
                            "SELECT *
            FROM attend 
            LEFT JOIN students
            ON attend.sid = students.sid WHERE eid='$eid' && sgender='Female' && surole='Student'
            ";
                        if ($result = mysqli_query($connect, $sql)) {
                            $rowcount = mysqli_num_rows($result);
                            echo $rowcount;
                        }
                        ?>
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <td>Last Name</td>
                            <td>First Name</td>
                            <td>Time In</td>
                            <td>Campus</td>
                            <td>Vaccine</td>
                            <td>Booster</td>
                            <td>Unit</td>
                        </tr>
                        <?php
                        //                                ecting data associated with this particular id
                        global $connect;
                        $get_pro = "SELECT *
                                FROM attend
                                LEFT JOIN students
                                ON attend.sid = students.sid WHERE eid='$eid' && sgender='Female' && surole='Student'ORDER BY `students`.`slname` ASC
                                ";
                        $run_pro = mysqli_query($connect, $get_pro);
                        while ($row_pro = @mysqli_fetch_array($run_pro)) {

                            echo "<tr>";
                            echo "<td>" . $row_pro['slname'] . "</td>";
                            echo "<td>" . $row_pro['sfname'] . "</td>";
                            echo "<td>" . $row_pro['timein'] . "</td>";
                            echo "<td>" . $row_pro['scampus'] . "</td>";
                            echo "<td>" . $row_pro['svac'] . "</td>";
                            echo "<td>" . $row_pro['sbooster'] . "</td>";
                            echo "<td>" . $row_pro['sunit'] . "</td>";




                            echo "</tr>";
                        }


                        ?>
                    </table>
                </div>
            </div>
        </div><br><br>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Participant Male <h6 class="float-end"><?php
                                                            //getting id from url
                                                            $eid = $_GET['eid'];
                                                            global $connect;
                                                            $sql =
                                                                "SELECT *
            FROM attend 
            LEFT JOIN students
            ON attend.sid = students.sid WHERE eid='$eid' && sgender='Male' && surole='Student'
            ";
                                                            if ($result = mysqli_query($connect, $sql)) {
                                                                $rowcount = mysqli_num_rows($result);
                                                                echo $rowcount;
                                                            }
                                                            ?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <td>Last Name</td>
                            <td>First Name</td>
                            <td>Time In</td>
                            <td>Campus</td>
                            <td>Vaccine</td>
                            <td>Booster</td>
                            <td>Unit</td>
                        </tr>
                        <?php
                        //                                ecting data associated with this particular id
                        global $connect;
                        $get_pro = "SELECT *
                                FROM attend
                                LEFT JOIN students
                                ON attend.sid = students.sid WHERE eid='$eid' && sgender='Male' && surole='Student' ORDER BY `students`.`slname` ASC
                                ";
                        $run_pro = mysqli_query($connect, $get_pro);
                        while ($row_pro = @mysqli_fetch_array($run_pro)) {

                            echo "<tr>";
                            echo "<td>" . $row_pro['slname'] . "</td>";
                            echo "<td>" . $row_pro['sfname'] . "</td>";
                            echo "<td>" . $row_pro['timein'] . "</td>";
                            echo "<td>" . $row_pro['scampus'] . "</td>";
                            echo "<td>" . $row_pro['svac'] . "</td>";
                            echo "<td>" . $row_pro['sbooster'] . "</td>";
                            echo "<td>" . $row_pro['sunit'] . "</td>";




                            echo "</tr>";
                        }


                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><br><br>
<div class="container-fluid">
    <div class="row">



        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Participant Teacher <h6 class="float-end"><?php
                                                                //getting id from url
                                                                $eid = $_GET['eid'];
                                                                global $connect;
                                                                $sql =
                                                                    "SELECT *
            FROM attend 
            LEFT JOIN students
            ON attend.sid = students.sid WHERE eid='$eid' && surole='Teacher'
            ";
                                                                if ($result = mysqli_query($connect, $sql)) {
                                                                    $rowcount = mysqli_num_rows($result);
                                                                    echo $rowcount;
                                                                }
                                                                ?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <td>Last Name</td>
                            <td>First Name</td>
                            <td>Time In</td>
                            <td>Campus</td>
                            <td>Vaccine</td>
                            <td>Booster</td>
                            <td>Unit</td>
                        </tr>
                        <?php
                        //                                ecting data associated with this particular id
                        global $connect;
                        $get_pro = "SELECT *
                                FROM attend
                                LEFT JOIN students
                                ON attend.sid = students.sid WHERE eid='$eid' && surole='Teacher' ORDER BY `students`.`slname` ASC
                                ";
                        $run_pro = mysqli_query($connect, $get_pro);
                        while ($row_pro = @mysqli_fetch_array($run_pro)) {

                            echo "<tr>";
                            echo "<td>" . $row_pro['slname'] . "</td>";
                            echo "<td>" . $row_pro['sfname'] . "</td>";
                            echo "<td>" . $row_pro['timein'] . "</td>";
                            echo "<td>" . $row_pro['scampus'] . "</td>";
                            echo "<td>" . $row_pro['svac'] . "</td>";
                            echo "<td>" . $row_pro['sbooster'] . "</td>";
                            echo "<td>" . $row_pro['sunit'] . "</td>";




                            echo "</tr>";
                        }


                        ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Non-Teaching <h6 class="float-end"><?php
                                                        //getting id from url
                                                        $eid = $_GET['eid'];
                                                        global $connect;
                                                        $sql =
                                                            "SELECT *
            FROM attend 
            LEFT JOIN students
            ON attend.sid = students.sid WHERE eid='$eid' && surole='Teacher'
            ";
                                                        if ($result = mysqli_query($connect, $sql)) {
                                                            $rowcount = mysqli_num_rows($result);
                                                            echo $rowcount;
                                                        }
                                                        ?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <td>Last Name</td>
                            <td>First Name</td>
                            <td>Time In</td>
                            <td>Campus</td>
                            <td>Vaccine</td>
                            <td>Booster</td>
                            <td>Unit</td>
                        </tr>
                        <?php
                        //                                ecting data associated with this particular id
                        global $connect;
                        $get_pro = "SELECT *
                                FROM attend
                                LEFT JOIN students
                                ON attend.sid = students.sid WHERE eid='$eid' && surole='Teacher' ORDER BY `students`.`slname` ASC
                                ";
                        $run_pro = mysqli_query($connect, $get_pro);
                        while ($row_pro = @mysqli_fetch_array($run_pro)) {

                            echo "<tr>";
                            echo "<td>" . $row_pro['slname'] . "</td>";
                            echo "<td>" . $row_pro['sfname'] . "</td>";
                            echo "<td>" . $row_pro['timein'] . "</td>";
                            echo "<td>" . $row_pro['scampus'] . "</td>";
                            echo "<td>" . $row_pro['svac'] . "</td>";
                            echo "<td>" . $row_pro['sbooster'] . "</td>";
                            echo "<td>" . $row_pro['sunit'] . "</td>";




                            echo "</tr>";
                        }


                        ?>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<style>
    td {
        font-size: 10px;
    }
</style>


<?php include("_footer.php"); ?>