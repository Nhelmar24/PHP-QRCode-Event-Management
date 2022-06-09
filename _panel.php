<div class="dash-body">
    <h1>DASHBOARD</h1>
    <hr style="margin:5px 0px">
    <div class="dash-main">
        <div class="dash_main">
            <div class="bg-green">
                <?php
                global $connect;
                $sql = "SELECT * FROM students WHERE srecord=0";
                if ($result = mysqli_query($connect, $sql)) {
                    $rowcount = mysqli_num_rows($result);
                    echo "<h3> Student Count: " . $rowcount . "</h3>";
                }
                ?>
            </div>
        </div>
    </div>
    <div class="dash-main">
        <div class="dash_main">
            <div class="bg-red">
                <?php
                global $connect;
                $sql = "SELECT * FROM events";
                if ($result = mysqli_query($connect, $sql)) {
                    $rowcount = mysqli_num_rows($result);
                    echo "<h3> Events Count: " . $rowcount . "</h3>";
                }
                ?>
            </div>
        </div>
    </div>
</div>