<?php
$date_today = date("Y-m-d");
$time_today = date("h:i a");
?>
<div class="student-info">
    <div class="student_info">
        <div class="student-pic">
            <img src="img/user_pic/default.jpg" width="30px">
        </div>
        <div class="student-det">
            <b>Name: </b>
            <?php echo $_SESSION['sfname']; ?>&nbsp
            <?php echo $_SESSION['slname']; ?>&nbsp&nbsp&nbsp
            <b>Campus: </b>
            <?php echo $_SESSION['scampus']; ?>&nbsp&nbsp&nbsp
            <b>Unit: </b>
            <?php echo $_SESSION['sunit']; ?>&nbsp&nbsp&nbsp
            <b>Position: </b>
            <?php echo $_SESSION['sutype']; ?>&nbsp&nbsp&nbsp
            <b>Student ID: </b>
            <?php echo $_SESSION['sid']; ?>&nbsp&nbsp&nbsp
        </div>
        <div class="student-time">
            <b>Date: </b><?php echo $date_today; ?>
            <b>Time: </b><?php date_default_timezone_set('Asia/Manila');
                            echo date("h:i a"); ?>
        </div>
    </div>
    <!--student_info-->
</div>

<div class="student_content">
    <?php
    if ($_SESSION['sstatus'] == 1) {
        echo '<br /><br /><br /><h1 align="center">Your Account is still on review</h1><br />
            <br />
            <div align="center">
                <a href="_logout.php">
                    <button align="center" style="background:red;color:#fff;border:1px solid #fff;border-radius:10px;padding:10px;">
                        Logout
                    </button>
                </a>
            </div>
        ';
    } else if($_SESSION['sstatus'] == 2) {
        echo '<br /><br /><br /><h1 align="center">Your Application Has been Disapproved</h1><br />
            <br />
            <div align="center">
                <a href="_logout.php">
                    <button align="center" style="background:red;color:#fff;border:1px solid #fff;border-radius:10px;padding:10px;">
                        Logout
                    </button>
                </a>
            </div>
        ';
    }
    else {
        echo '
            <div class="student_nav">
                <div class="student-nav">
        ';
        echo '<ul>';

        echo '<a href="home.php"><li>Home</li></a>';
        if ($_SESSION['sutype'] === 'Coordinator') {
            echo '<a href="student_index.php"><li>Users</li></a>';
        }


        echo '<a href="event_index.php"><li>Events</li></a>';



        if ($_SESSION['sutype'] === 'Participant') {
            echo '<a href="dpo_index.php"><li>DPO</li></a>';
        }


        // echo '<a href="settings_index.php"><li>Settings</li></a>';


        if ($_SESSION['sutype'] === 'D.P.O.' || $_SESSION['sutype'] === 'C.O.P.') {
            echo '<a href="report_index.php"><li>Reports</li></a>';
        }

        echo '<a href="about_index.php"><li>About</li></a>
            </ul>
                </div>

        
        ';
        echo '
            <div class="student-nav">
                <ul>
                    <a href="_logout.php"><li>Logout</li></a>
                </ul>
            </div>
        </div>
        ';
    }
    ?>
</div>

<style>
    .student-info {
        background: rgba(25, 25, 25, 0.2);
        padding: 0px 10px;
    }

    .student_info {
        display: flex;
        justify-content: space-between;
        padding: 0px 10px;
        align-items: center;
    }

    .student_info :first-child {
        width: 30px;
    }

    .student_info>* {
        flex: 0 0 auto;
    }

    .student-pic img {
        border-radius: 100%;
        padding: 5px 0px;
    }

    .student-det {
        justify-content: left;
    }

    .student_nav {
        display: flex;
        justify-content: space-between;
        background: black;
    }

    @media screen and (max-width: 600px) {
        .student_info {
            display: flex;
            flex-direction: column;
            padding: 0px 10px;
            align-items: center;
            background: rgba(25, 25, 25, 0.2);
        }
    }
</style>