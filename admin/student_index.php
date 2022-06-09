<?php include("../script/_db.php");
include("_head.php"); ?>
<div class="admin_content">
	<div class="admin-content">
		<table width="100%">
			<tr>
				<td width="50%">
				</td>
				<td width="50%">
					<!--form action="inventory_result.php">
							<input class="search" type="text" placeholder="Search.." name="user_query">
							<button type="search" name="search" class="btn btn-default"><img src="images/icon_search.PNG" width="25px"></button>
						</form-->
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
				<td width="10%">LAST NAME</td>
				<td width="10%">FIRST NAME</td>
				<td width="10%">GENDER</td>
				<td width="10%">DATE OF BIRTH</td>
				<td width="10%">USER TYPE</td>
				<td width="20%">CAMPUS NAME</td>
				<td width="10%">USER ROLE</td>
				<td width="10%">STATUS</td>
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
			$get_pro = "SELECT * from students";
			$run_pro = mysqli_query($connect, $get_pro);
			while ($row_pro = @mysqli_fetch_array($run_pro)) {

				echo "<tr>";

				echo "<td width='10%'>" . $row_pro['slname'] . "</td>";
				echo "<td width='10%'>" . $row_pro['sfname'] . "</td>";
				echo "<td width='10%'>" . $row_pro['sgender'] . "</td>";
				echo "<td width='10%'>" . $row_pro['sbirthday'] . "</td>";
				echo "<td width='10%'>" . $row_pro['sutype'] . "</td>";
				echo "<td width='20%'>" . $row_pro['scampus'] . "</td>";
				echo "<td width='10%'>" . $row_pro['surole'] . "</td>";
				if ($row_pro['sstatus'] == 1) {
					echo "<td width='10%' style='background:red;color:#fff;'>Unverified</td>";
				} else {
					echo "<td width='10%' style='background:green;color:#fff;'>Activated</td>";
				}

				echo "<td width='10%'>
                            <a align='center' href='student_view.php?sid=" . $row_pro['sid'] . "'><button class='view'>VIEW</button></a>
                            <a align='center' href='student_edit.php?sid=" . $row_pro['sid'] . "'><button class='edit'>EDIT</button></a>
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