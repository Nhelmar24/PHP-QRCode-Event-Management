<?php include("../script/_db.php");
include("_head.php"); ?>
<div class="admin_profile">
	<div class="admin_picture">
		<img src="" alt="">
	</div>
	<div class="admin_details">

	</div>
</div>
<div class="admin_content">
	<div class="admin-content">
		<table width="100%">
			<tr>
				<td width="50%">
					<a href="event_add.php" class="view">Add Event</a>
				</td>
				<td width="50%">

				</td>
			</tr>
		</table>
	</div>
	<!--admin-content-->
</div>
<!--admin_content-->
<div class="title-content">
	<div class="title_content">
		<table width="100%" border="1">
			<tr>
				<td width="5%">EVENT ID</td>
				<td width="10%">EVENT NAME</td>
				<td width="20%">EVENT LOCATION</td>
				<td width="10%">EVENT COORDINATOR</td>
				<td width="10%">START DATE</td>
				<td width="10%">END DATE</td>
				<td width="5%">TIME START</td>
				<td width="5%">TIME END</td>
				<td width="5%">ATTD</td>
				<td width="5%">CODE</td>
				<td width="10%">ACTION</td>
			</tr>
		</table>
	</div>
</div>
<!--task_content-box-->
</div>
<!--fixed_content-->


<div class="student_content">
	<div class="student-content">
		<table width="100%" border="1">
			<?php
			global $connect;
			$get_pro = "SELECT * from events";
			$run_pro = mysqli_query($connect, $get_pro);
			while ($row_pro = @mysqli_fetch_array($run_pro)) {

				echo "<tr>";

				echo "<td width='5%'>" . $row_pro['eid'] . "</td>";
				echo "<td width='10%'>" . $row_pro['ename'] . "</td>";
				echo "<td width='20%'>" . $row_pro['elocation'] . "</td>";
				echo "<td width='10%'>" . $row_pro['ecoor'] . "</td>";
				echo "<td width='10%'>" . $row_pro['edatestart'] . "</td>";
				echo "<td width='10%'>" . $row_pro['edateend'] . "</td>";
				echo "<td width='5%'>" . $row_pro['etimestart'] . "</td>";
				echo "<td width='5%'>" . $row_pro['etimeend'] . "</td>";
				echo "<td width='5%'>
						<a align='center' href='attend_view.php?eid=" . $row_pro['eid'] . "'><button class='view'>VIEW</button></a>
						</td>";
				echo "<td width='5%'>
						<a align='center' href='qr_code.php?eid=" . $row_pro['eid'] . "'><button class='view'>VIEW</button></a>
						</td>";
				echo "<td width='10%'>
                            <a align='center' href='event_view.php?eid=" . $row_pro['eid'] . "'><button class='view'>VIEW</button></a>
                            <a align='center' href='event_edit.php?eid=" . $row_pro['eid'] . "'><button class='edit'>EDIT</button></a>
                        </td>";

				echo "</tr>";
			}


			?>
		</table>
	</div>
	<!--scroll-content-->
</div>
<!--scroll_content-->

<?php include("_footer.php"); ?>