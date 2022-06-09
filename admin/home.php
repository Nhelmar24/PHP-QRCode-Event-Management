<?php include("../script/_db.php");
session_start(); ?>
<?php include("_head.php"); ?>
<div class="dash-body">


    <h1 align="center">DASHBOARD</h1>
    <hr />
    <h3 style="background:darkgreen;color:#fff;padding:4px 8px;">USERS TABLE</h3>
    <table width="100%">
        <tr>
            <td>No.</td>
            <td>Unit Name</td>
            <td>No. of Users</td>
            <td>Total Active User</td>
        </tr>
        <div class="dash-admin">
            <div class="dash_admin">
                <?php
                global $connect;
                $get_pro = "SELECT * from units";

                $run_pro = mysqli_query($connect, $get_pro);
                while ($row_pro = @mysqli_fetch_array($run_pro)) {

                    echo "<tr>";
                    echo "<td>" . $row_pro['unid'] . "</td>";
                    echo "<td>" . $row_pro['unname'] . "</td>";

                    $unname = $row_pro['unname'];
                    $sql = "SELECT COUNT(*) FROM students where sunit='$unname'";

                    $result = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_array($result);
                    echo "<td>$row[0]</td>";

                    echo "</tr>";
                }
                ?>
    </table>
    <br /><br />


    <h3 style="background:darkgreen;color:#fff;padding:4px 8px;">UNIVERSITY EVENTS</h3>
    <table width="100%">
        <tr>
            <td>No.</td>
            <td>Unit Name</td>
            <td>Event Name</td>
            <td>No. of Participants</td>
            <td>Start Date</td>
            <td>End Date</td>
            <td>Start Time</td>
            <td>End Time</td>
            <td>Status</td>
        </tr>
        <?php
        global $connect;
        $a = 0;
        $get_pro = "SELECT * from events";
        $run_pro = mysqli_query($connect, $get_pro);
        while ($row_pro = @mysqli_fetch_array($run_pro)) {


            $a++;

            echo "<tr>";
            echo "<td>" . $row_pro['eid'] . "</a>";
            echo "<td>" . $row_pro['eunits'] . "</td>";
            echo "<td>" . $row_pro['ename'] . "</td>";


            // Dito lalabas ung bilang ng umattend sa event...
            $eid = $row_pro['eid'];
            $sql = "SELECT COUNT(*) FROM attend where eid='$eid'";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_array($result);
            echo "<td>$row[0]</td>";

            echo "<td>" . $row_pro['edatestart'] . "</td>";
            $event_start = $row_pro['edatestart'];

            echo "<td>" . $row_pro['edateend'] . "</td>";
            $event_end = $row_pro['edateend'];

            echo "<td>" . $row_pro['etimestart'] . "</td>";
            echo "<td>" . $row_pro['etimeend'] . "</td>";
            if ($date_today == $event_end) {
                echo "<td>Ongoing</td>";
            } elseif ($date_today <= $event_start) {
                echo "<td>Upcoming</td>";
            } elseif ($date_today >= $event_end) {
                echo "<td>Done</td>";
            }

            echo "</tr>";
        }
        ?>
    </table>

</div>
</div>



</div>

<?php include("_footer.php"); ?>