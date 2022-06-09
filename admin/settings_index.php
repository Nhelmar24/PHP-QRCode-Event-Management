<?php session_start(); ?>
<?php include("../script/_db.php");
include("_head.php"); ?>

<div class="setting_view">
	<h1>SETTINGS PAGE</h1>
	<hr />
	<div class="setting-view">
		<div class="setting_left">
			<div class="setting-left">
				<a href="s-campus_add.php" style="background:green;color:#fff;padding:5px 10px">ADD CAMPUS</a>
				<h3 class="cv-h3">Campus List</h3>
				<div class="campus_view">
					<table width="100%">
						<?php
						global $connect;
						$get_pro = "SELECT * FROM campus";
						$run_pro = mysqli_query($connect, $get_pro);
						while ($row_pro = @mysqli_fetch_array($run_pro)) {


							echo "<tr>";

							echo "<td width='80%'>" . $row_pro['cname'] . "</td>";

							echo "<td width='20%' align='center'>";
							echo "<!--a align='center' href='s-campus_view.php?cid=" . $row_pro['cid'] . "'><button class='view'>VIEW</button></a-->
									<a align='center' href='s-campus_edit.php?cid=" . $row_pro['cid'] . "'><button class='edit'>EDIT</button></a>";



							echo "</td>";

							echo "</tr>";
						}

						?>
					</table>
				</div>
			</div>
			<!--setting-left-->
		</div>
		<!--setting_left-->
		<div class="setting_right">
			<div class="setting-right">
				<a href="s-unit_add.php" style="background:green;color:#fff;padding:5px 10px">ADD UNITS</a>
				<h3 class="cv-h3">Unit List</h3>

				<table width="100%">
					<?php
					global $connect;
					$get_pro = "SELECT * FROM units";
					$run_pro = mysqli_query($connect, $get_pro);
					while ($row_pro = @mysqli_fetch_array($run_pro)) {
						echo "<tr>";

						echo "<td width='80%'>" . $row_pro['unname'] . "</td>";

						echo "<td width='20%' align='center'>";

						echo "<!--a align='center' href='s-unit_view.php?unid=" . $row_pro['unid'] . "'><button class='view'>VIEW</button></a-->
									<a align='center' href='s-unit_edit.php?unid=" . $row_pro['unid'] . "'><button class='edit'>EDIT</button></a>";



						echo "</td>";

						echo "</tr>";
					}

					?>
				</table>
			</div>
		</div>
	</div>
	<style>
		.setting_view {
			padding: 20px;
		}

		.setting-view {}

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