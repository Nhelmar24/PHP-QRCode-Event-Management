<?php
$date_today = date("Y-m-d");
$time_today = date("H:i:s");
?>

<!DOCTYPE html>
<html>

<head>
	<title>ADMIN | RSU - Campus Events</title>
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<div class="admin_header">
			<h3>Admin Panel</h3>
		</div>
		<div class="admin_nav">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="student_index.php">User</a></li>
				<li><a href="event_index.php">Events</a></li>
				<!--li><a href="dpo_index.php">Reports</a></li-->
				<li><a href="settings_index.php">Settings</a></li>
				<li><a href="about_index.php">About</a></li>
				<li><a href="../_logout.php">Logout</a></li>
			</ul>
		</div>

		<div class="mframe">

			<style>
				.mframe {
					padding: 20px;
				}

				.dash-body {
					padding: 15px;
				}

				.dash-main {
					width: 20%;
					float: left
				}

				.dash_main {
					margin: 5px;
				}

				.bg-green {
					background: rgba(0, 255, 0, 0.4);
					border: 1px solid rgba(0, 255, 0, 0.8);
					padding: 20px 10px;
				}

				.bg-red {
					background: rgba(255, 0, 0, 0.4);
					border: 1px solid rgba(255, 0, 0, 0.8);
					padding: 20px 10px;
				}

				.btn-add {
					background: green;
					padding: 5px;
					border: none;
					color: #fff;
					border-radius: 5px;
				}

				.btn-add:hover {
					background: rgba(0, 255, 0, 0.9);
					border: 1px solid green;
					color: green;
				}
			</style>