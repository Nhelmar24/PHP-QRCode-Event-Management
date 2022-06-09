<?php session_start(); ?>
<?php include("script/_db.php");
include("_head.php");
include("_nav.php"); ?>

<div style="padding:20px;">
	<div class="titleofpage">
		<div class="titlename">
			<h1>PARTICIPANT LISTS</h1>
		</div>
		<div class="searchbox" align="right">
			<form action="student_search.php">
				<input class="search" type="text" placeholder="Search.." name="user_query">
				<button type="search" name="search" class="btn-search">SEARCH</button>
			</form>
		</div>
	</div>
	<hr style="margin:5px 0px">
	<style>
		.titleofpage {
			width: 100%;
			margin: 0 auto;
			overflow: hidden;
		}

		.titlename {
			width: 50%;
			float: left;
		}

		.searchbox {
			width: 50%;
			float: right;
		}

		.student-list * {
			font-size: 12px;
		}

		.student-list tr:nth-child(even) {
			background-color: #f2f2f2;
		}
	</style>
	<table width="100%">

		<tr style="background:gray;color:#fff;">
			<td>LAST NAME</td>
			<td>FIRST NAME</td>
			<td>GENDER</td>
			<td>DATE OF BIRTH</td>
			<td>USER TYPE</td>
			<td>CAMPUS NAME</td>
			<td>USER ROLE</td>
			<td>STATUS</td>
			<td align="center">ACTION</td>
		</tr>
		<?php
		global $connect;
		$slocation = $_SESSION['scampus'];
		$usertype = $_SESSION['sutype'];
		$sunit = $_SESSION['sunit'];

		//echo $slocation;
		//echo $sunit;

		if ($usertype === 'Coordinator') {
			$get_pro = "SELECT * FROM students WHERE sutype!='Coordinator' && sunit='$sunit' && scampus='$slocation' && srecord='0' && ( sstatus='0' || sstatus='1')";
			//$get_pro = "SELECT * FROM students";
			$run_pro = mysqli_query($connect, $get_pro);
			while ($row_pro = @mysqli_fetch_array($run_pro)) {

				echo "<tr>";

				echo "<td>" . $row_pro['slname'] . "</td>";
				echo "<td>" . $row_pro['sfname'] . "</td>";
				echo "<td>" . $row_pro['sgender'] . "</td>";
				echo "<td>" . $row_pro['sbirthday'] . "</td>";
				echo "<td>" . $row_pro['sutype'] . "</td>";
				echo "<td>" . $row_pro['scampus'] . "</td>";
				echo "<td>" . $row_pro['surole'] . "</td>";
				if ($row_pro['sstatus'] == 1) {
					echo "<td style='background:red;color:#fff;'>Unverified</td>";
				} else {
					echo "<td style='background:green;color:#fff;'>Activated</td>";
				}
				echo "<td align='center'>";
				if ($_SESSION['sutype'] == 'Coordinator') {
					echo "<a align='center' href='student_view.php?sid=" . $row_pro['sid'] . "'><button class='view'>VIEW</button></a>
						<a align='center' href='student_edit.php?sid=" . $row_pro['sid'] . "'><button class='edit'>ACTIVATE</button></a>
						<a align='center' href='student_delete.php?sid=" . $row_pro['sid'] . "'><button class='delete'>DISAPPROVED</button></a>
						";
				} else {
					echo "<a align='center' href='student_view.php?sid=" . $row_pro['sid'] . "'><button class='view'>VIEW</button></a>";
				}


				echo "</td>";

				echo "</tr>";
			}
		}

		?>
	</table>
</div>
<!--scroll_content-->
<?php include("_footer.php"); ?>