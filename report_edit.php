<?php session_start(); ?>
<link rel="stylesheet" href="css/style.css">
<?php include("script/_db.php");
include("_head.php");
include("_nav.php"); ?>
<?php
// including the database connection file

if (isset($_POST['update'])) {
    $rstatus = $_POST['rstatus'];
    $rid = $_POST['rid'];

    // checking empty fields
    if (empty($rstatus)) {
        if (empty($rstatus)) {
            echo "<font color='red'>Something happened</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($connect, "UPDATE reports SET 
			rstatus='$rstatus'
            
            
            WHERE rid=$rid
		");
        echo "<script>alert('Database successfully updated');</script>";
        echo "<script>window.location.href='report_index.php</script>";
        exit;
    }
}
?>