<?php include("../script/_db.php");
include("_head.php"); ?>
<div style="padding:15px;">
    <table>
        <?php
        session_start();
        //getting id from url
        $eid = $_GET['eid'];

        $result = mysqli_query($connect, "SELECT * FROM events WHERE eid=$eid");

        while ($res = mysqli_fetch_array($result)) {

            $ename = $res['ename'];

            echo "<h2> Student Attendance for " . $ename . "</h2>";
            echo "<tr bgcolor='gray'><td>Student Last Name</td>
            <td>Student First Name</td>
            <td>Date</td>
            <td>Time In</td>
            
            <td>Campus Name</td>
            <td>Unit Name</td>
            
            ";
        }
        //selecting data associated with this particular id
        global $connect;
        $get_pro = "SELECT *
            FROM attend 
            LEFT JOIN students
            ON attend.sid = students.sid WHERE eid='$eid'
            ";
        $run_pro = mysqli_query($connect, $get_pro);
        while ($row_pro = @mysqli_fetch_array($run_pro)) {

            echo "<tr>";

            echo "<td>" . $row_pro['slname'] . "</td>";
            echo "<td>" . $row_pro['sfname'] . "</td>";
            echo "<td>" . $row_pro['date'] . "</td>";
            echo "<td>" . $row_pro['timein'] . "</td>";
            echo "<td>" . $row_pro['scampus'] . "</td>";
            echo "<td>" . $row_pro['sunit'] . "</td>";


            echo "</tr>";
        }


        ?>
    </table>


</div>
<?php include("_footer.php"); ?>