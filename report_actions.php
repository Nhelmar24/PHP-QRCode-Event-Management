<?php session_start();
$sid = $_SESSION['sid'];
$sfname = $_SESSION['sfname'];
?>
<link rel="stylesheet" href="css/style.css">
<?php include("script/_db.php");
include("_head.php");
include("_nav.php"); ?>
<?php

//getting id from url
$rid = $_GET['rid'];

//selecting data associated with this particular id
//$result = mysqli_query($connect, "SELECT * FROM reports WHERE rid=$rid");

$result = mysqli_query($connect, "SELECT * FROM reports INNER JOIN students ON reports.sid = students.sid WHERE rid=$rid");

while ($res = mysqli_fetch_array($result)) {
    $rid = $res['rid'];
    $rdate = $res['rdate'];
    $rtime = $res['rtime'];
    $rcampus = $res['rcampus'];
    $runit = $res['runit'];
    $rdesc = $res['rdesc'];
    $rpic = $res['rpic'];
    $rstatus = $res['rstatus'];
}
?>
<div style="padding:20px">

    <h1>ACTION TAKEN REPORTS FOR -> <b> <?php echo $rdesc ?></b></h1>
    <hr style="margin:5px 0px 10px 0px;">
    <a class="view" href="report_index.php">RETURN</a><br /><br />
    <div class="report_message">
        <table>
            <?php
            // including the database connection file

            $result = mysqli_query($connect, "SELECT * FROM report_update WHERE rid=$rid");

            while ($res = mysqli_fetch_array($result)) {
                $ruupdate = $res['ruupdate'];
                $rudate = $res['rudate'];


                echo "
                        <tr><td>$rudate</td><td>$ruupdate</td></tr>
                ";
            }
            ?>
        </table>
    </div>
</div>
<style>
    .report_left {
        width: 50%;
        float: left;
        overflow: hidden;
    }

    .report_right {
        width: 50%;
        float: right;
        overflow: hidden;
    }

    .report_message {
        overflow: scroll;
        height: 400px;
        width: 85%;
        border: 1px solid rgba(25, 25, 25, 0.2);
        margin-bottom: 5px;
    }

    .report_create input {
        width: 50%;
    }

    @media screen and (max-width: 600px) {
        .report_left {
            width: 100%;
            float: left;
            overflow: hidden;
        }

        .report_right {
            width: 100%;
            float: right;
            overflow: hidden;
        }

        .report_message {
            overflow: scroll;
            height: 400px;
            width: 85%;
            border: 1px solid rgba(25, 25, 25, 0.2);
            margin-bottom: 5px;
        }

        .report_create input {
            width: 50%;
        }
    }
</style>

<?php include("_footer.php"); ?>