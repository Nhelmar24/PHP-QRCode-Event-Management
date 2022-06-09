<?php session_start(); ?>
<?php include("script/_db.php");
include("_head.php");
include("_nav.php"); ?>
<div style="padding:20px">
	<div class="titleofpage">
		<div class="titlename">
			<h1>SEAMS EVENT MANAGEMENT</h1>
		</div>
		<div class="searchbox" align="right">

		</div>
	</div>
	<hr style="margin:5px 0px">

	<div style="width:100%;">
		<?php
		if ($_SESSION['sutype'] == 'Coordinator') {
			echo "<a href='event_add.php'><button type='button' class='add'>Add Events</button></a>";
		}
		?>
	</div>

	<div class="eventdata">
		<table>
			<tr style="background:gray;color:#fff;">
				<td>Event ID</td>
				<td>Event Name</td>
				<td>Event Location</td>
				<td>Event Venue</td>
				<td>Event Unit</td>
				<td>Event Coordinator Name</td>
				<td>Start Date</td>
				<td>End Date</td>
				<td>Time Start</td>
				<td>Time End</td>
				<td>Data Privacy Policy</td>
				<td>Attendance</td>
				<td>Event QR Code</td>

				<?php
				if ($_SESSION['sutype'] == 'Participant') {
					echo "";
				} else {
					echo "<td>Action</td>";
				}
				?>

			</tr>
			<?php
			global $connect;

			$usertype = $_SESSION['sutype'];
			$scampus = $_SESSION['scampus'];
			$sunit = $_SESSION['sunit'];

			// This script is for dpo only
			if ($usertype == 'D.P.O.') {
				$get_pro = "SELECT * FROM events";
				$run_pro = mysqli_query($connect, $get_pro);
				while ($row_pro = @mysqli_fetch_array($run_pro)) {

					$event_start = $row_pro['edatestart'];
					$event_end = $row_pro['edateend'];
					$eid = $row_pro['eid'];

					echo "<tr>";

					echo "<td>" . $row_pro['eid'] . "</td>";
					echo "<td>" . $row_pro['ename'] . "</td>";
					echo "<td>" . $row_pro['elocation'] . "</td>";
					echo "<td>" . $row_pro['evenue'] . "</td>";
					echo "<td>" . $row_pro['eunits'] . "</td>";
					echo "<td>" . $row_pro['ecoor'] . "</td>";
					echo "<td>" . $row_pro['edatestart'] . "</td>";
					echo "<td>" . $row_pro['edateend'] . "</td>";
					echo "<td>" . $row_pro['etimestart'] . "</td>";
					echo "<td>" . $row_pro['etimeend'] . "</td>";

					echo "<td></td>";
					if (($_SESSION['sutype'] == 'Coordinator') || ($_SESSION['sutype'] == 'Participant')) {
						echo "<td width='5%'>
						<a align='center' href='attend_view.php?eid=" . $row_pro['eid'] . "'><button class='eview'>VIEW</button></a>
						</td>";
					} else {
						echo "<td width='5%' align='center'></td>";
					}

					if ($date_today === $event_start) {
						if ($_SESSION['sutype'] == 'Coordinator') {

							echo "<td>
								<a align='center' href='qr_code.php?eid=" . $row_pro['eid'] . "'><button class='eview'>SHOW QR</button></a>
								</td>";
						} elseif ($_SESSION['sutype'] == 'Participant') {
							echo "<td>
								<a align='center' href='event_privacy.php?eid=" . $row_pro['eid'] . "'><button class='eview'>SCAN QR</button></a>
			
								</td>";
						} else {
							echo "<td></td>";
						}
					} else {
						echo "<td> &nbsp </td>";
					}


					if ($_SESSION['sutype'] == 'Coordinator') {
						echo "<td width='10%' align='center'>
                            <a align='center' href='event_details.php?eid=" . $row_pro['eid'] . "'><button class='eview'>VIEW</button></a></td>";
					} else {
						echo "<td width='10%' align='center'>
                            <a align='center' href='event_details.php?eid=" . $row_pro['eid'] . "'><button class='eview'>VIEW</button></a>";
						echo "</td>";
					}

					echo "</tr>";
				}
			} else {


				// This script is for Coordinator and Participant only
				$get_pro = "SELECT * FROM events WHERE eunits='All Units' OR elocation='$scampus' && eunits='$sunit' && ( estatus='0' || estatus='1' )";
				$run_pro = mysqli_query($connect, $get_pro);
				while ($row_pro = @mysqli_fetch_array($run_pro)) {

					$event_start = $row_pro['edatestart'];
					$event_end = $row_pro['edateend'];
					$eid = $row_pro['eid'];

					echo "<tr>";

					echo "<td>" . $row_pro['eid'] . "</td>";
					echo "<td>" . $row_pro['ename'] . "</td>";
					echo "<td>" . $row_pro['elocation'] . "</td>";
					echo "<td>" . $row_pro['evenue'] . "</td>";
					echo "<td>" . $row_pro['eunits'] . "</td>";
					echo "<td>" . $row_pro['ecoor'] . "</td>";
					echo "<td>" . $row_pro['edatestart'] . "</td>";
					echo "<td>" . $row_pro['edateend'] . "</td>";
					echo "<td>" . $row_pro['etimestart'] . "</td>";
					echo "<td>" . $row_pro['etimeend'] . "</td>";
					echo "<td></td>";
					if (($_SESSION['sutype'] == 'Coordinator') || ($_SESSION['sutype'] == 'Participant')) {
						echo "<td width='5%'>
						<a align='center' href='attend_view.php?eid=" . $row_pro['eid'] . "'><button class='eview'>VIEW</button></a>
						</td>";
					} else {
						echo "<td width='5%' align='center'></td>";
					}

					if ($date_today === $event_start) {
						if ($_SESSION['sutype'] == 'Coordinator') {

							echo "<td>
								<a align='center' href='qr_code.php?eid=" . $row_pro['eid'] . "'><button class='eview'>SHOW QR</button></a>
								</td>";
						} elseif ($_SESSION['sutype'] == 'Participant') {
							echo "<td>
								<a align='center' href='event_privacy.php?eid=" . $row_pro['eid'] . "'><button class='eview'>SCAN QR</button></a>
			
								</td>";
						} else {
							echo "<td></td>";
						}
					} else {
						echo "<td> &nbsp </td>";
					}
					/*
					if ($row_pro['estatus'] == 0) {
						echo "<td align='center'style='color:black;background:yellow;'>Reviewing</td>";
					} elseif ($row_pro['estatus'] == 1) {
						echo "<td align='center'style='color:white;background:green;'>Activated</td>";
					} else {
						echo "<td align='center'style='color:white;background:red;'>Disapproved</td>";
					}
*/
					if ($_SESSION['sutype'] == 'Coordinator') {
						echo "<td width='10%' align='center'>
						<a align='center' href='event_details.php?eid=" . $row_pro['eid'] . "'><button class='eview'>VIEW</button></a>
						<a align='center' href='event_delete.php?eid=" . $row_pro['eid'] . "'><button class='delete'>DELETE</button></a>
							
                        </td>";
					}

					echo "</tr>";
				}
			}


			?>

		</table>

	</div>
	<style>
		a {
			color: #fff;
		}

		.eventdata table tr td {
			font-size: 12px;
		}

		.eventdata tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		.eview,
		.eedit,
		.edel {
			font-size: 10px;
			color: #fff;
			border: none;
			padding: 3px;
			border-radius: 3px;
		}

		.eview {
			background: green;
		}

		.eedit {
			background: yellow;
			color: #000;
		}

		.edel {
			background: red;
		}

		@media screen and (max-width: 720px) {
			.event_box {
				width: 100%;
				float: left;
				overflow: hidden;
				color: #fff;
			}

			.eventdata {
				width: 100%;
				overflow: scroll;
			}
		}
	</style>
	<?php include("_footer.php"); ?>