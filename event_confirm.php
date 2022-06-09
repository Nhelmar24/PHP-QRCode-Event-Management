<?php session_start();
$sid = $_SESSION['sid'];
?>
<?php include("script/_db.php");
include("_head.php");

if (isset($_POST['confirm'])) {

    //getting the text data from the fields
    $eid = $_POST['eid'];
    $sid = $_POST['sid'];
    $astat = $_POST['astat'];

    $add = "INSERT into 
	attend(eid,sid,astat)
    values('$eid','$sid','$astat')";

    $insert_pro = mysqli_query($connect, $add);

    if ($insert_pro) {
        echo "<script>alert('Thank You For Joining The Event!!!')</script>";
        echo "<script>window.open('event_index.php', '_SELF')</script>";
    } else {
        echo "<script>alert('Ooop!!! There somethere')</script>";
    }
}
?>
<div class="event-phone">
    <?php

    //getting id from url
    $eid = $_GET['eid'];

    //selecting data associated with this particular id
    $result = mysqli_query($connect, "SELECT * FROM events WHERE eid=$eid");

    while ($res = mysqli_fetch_array($result)) {

        $eid = $res['eid'];
        $ename = $res['ename'];
        $edesc = $res['edesc'];
        $ecoor = $res['ecoor'];
        $edatestart = $res['edatestart'];
        $edateend = $res['edateend'];
        $etimestart = $res['etimestart'];
        $etimeend = $res['etimeend'];
    }
    ?>
    <?php

    echo "Event ID:" . $eid . "<br />";
    echo "Student ID:" . $sid . "<br />";

    ?>


    <form name="form1" method="post" action="">
        <table border="0" class="table table-sm">
            <tr>
                <td>Event Name</td>
                <td><?php echo $ename; ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><?php echo $edesc; ?></td>
            </tr>
            <tr>
                <td>Coordinator</td>
                <td><?php echo $ecoor; ?></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="astat" value="Confirmed">
                    <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                    <input type="hidden" name="eid" value="<?php echo $eid; ?>">
                    <input type="submit" name="confirm" value="Confirm">
                </td>
            </tr>
</div>
<style>
    .event-phone {
        background: gray;
        width: 100%;
        overflow: hidden;
    }

    .event-phone h1 {
        text-align: center;
    }

    .button-confirm {
        padding: 10px;
        background: green;
        color: #fff;
    }
</style>
<?php include("_footer.php"); ?>