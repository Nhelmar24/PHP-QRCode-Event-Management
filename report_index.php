<?php session_start();
$sid = $_SESSION['sid']; ?>
<?php include("script/_db.php");
include("_head.php");
include("_nav.php"); ?>

<div class="setting_view">
	<h1>DATA BREACH REPORT</h1>
	<hr />
	<div class="campus_view">
		<table width="100%">
			<tr>
				<td>Name</td>
				<td>Campus</td>
				<td>Unit</td>
				<td>Description</td>
				<td>Status</td>
				<td>Action</td>
			</tr>
			<?php
			global $connect;

			$campusname = $_SESSION['scampus'];
			$get_pro = "SELECT *
			FROM reports
			INNER JOIN students
			ON reports.sid = students.sid";

			$run_pro = mysqli_query($connect, $get_pro);
			while ($res = mysqli_fetch_array($run_pro)) {
				$sid = $res['sid'];
				$sfname = $res['sfname'];
				$slname = $res['slname'];
				$scampus = $res['scampus'];
				$sunit = $res['sunit'];

				$rid = $res['rid'];
				$rdesc = $res['rdesc'];
				$rstatus = $res['rstatus'];




				echo "
						<tr>
							<td>$sfname $slname </td>
							<td>$scampus</td>
							<td>$sunit</td>
							<td>$rdesc</td>
							<td>$rstatus</td>
							<td>
								<a class='view' href='report_view.php?rid=$rid'>View</a>
								<a class='edit' href='report_actions.php?rid=$rid'>Actions</a><!--Dward palit mo nalang to-->
							</td>
						</tr>
					";
			}
			?>


		</table>
		<br /><br /><br /><br /><br /><br />
	</div>
</div>
<style>
	.setting_view {
		padding: 20px;
	}


	.setting_left {
		width: 50%;
		float: left
	}

	.setting-left {
		margin: 5px 2.5px 5px 0px;
	}

	.setting_right {
		width: 50%;
		float: right
	}

	.setting-right {
		margin: 5px 0px 5px 2.5px;
	}

	.campus_view {
		width: 100%;
		float: left;
		margin-bottom: 20px;
	}

	.cv-h3 {
		background: gray;
		padding: 5px;
		margin: 12px 0px;
		color: #fff;
	}

	.campus_view table tr td {
		font-size: 14px;
	}

	tr:nth-child(even) {
		background-color: #f2f2f2;
	}

	.cbutton {
		margin-bottom: 5px;
		padding: 5px;
	}

	.credential_view {
		width: 40%;
		float: right
	}
</style>
<?php include("_footer.php"); ?>