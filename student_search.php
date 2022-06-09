<?php session_start(); ?>
<?php include("script/_db.php");
include("_head.php");
include("_nav.php"); ?>

<div style="padding:20px;">
	<div class="titleofpage">
		<div class="titlename">
			<h1>USER PAGE</h1>
		</div>
		<form action="student_search.php">
			<input class="search" type="text" placeholder="Search.." name="user_query">
			<button type="search" name="search" class="btn-search">SEARCH</button>
		</form>
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
			<td width="10%">LAST NAME</td>
			<td width="10%">FIRST NAME</td>
			<td width="7%">GENDER</td>
			<td width="10%">DATE OF BIRTH</td>
			<td width="10%">USER TYPE</td>
			<td width="20%">CAMPUS NAME</td>
			<td width="10%">USER ROLE</td>
			<td width="13%">ACTION</td>
		</tr>
	</table>
	<hr />
	<table width="100%" class="student-list">
		<?php
		global $connect;
		$search = $_GET['user_query'];
		$slocation = $_SESSION['scampus'];
		$usertype = $_SESSION['sutype'];
		$sunit = $_SESSION['sunit'];

		if ($usertype === 'Coordinator') {
			//$get_pro = "SELECT * FROM students WHERE sutype!='Coordinator' && sunit='$sunit' && scampus='$slocation'";
			$get_pro = "SELECT * FROM students WHERE slname='$search' || sfname='$search' && sutype!='Coordinator' && sunit='$sunit' && scampus='$slocation' ";
			$run_pro = mysqli_query($connect, $get_pro);
			while ($row_pro = @mysqli_fetch_array($run_pro)) {

				echo "<tr>";

				echo "<td width='10%'>" . $row_pro['slname'] . "</td>";
				echo "<td width='10%'>" . $row_pro['sfname'] . "</td>";
				echo "<td width='7%'>" . $row_pro['sgender'] . "</td>";
				echo "<td width='10%'>" . $row_pro['sbirthday'] . "</td>";
				echo "<td width='10%'>" . $row_pro['sutype'] . "</td>";
				echo "<td width='20%'>" . $row_pro['scampus'] . "</td>";
				echo "<td width='10%'>" . $row_pro['surole'] . "</td>";
				if ($row_pro['sstatus'] == 1) {
					echo "<td width='10%' style='background:red;color:#fff;'>Unverified</td>";
				} else {
					echo "<td width='10%' style='background:green;color:#fff;'>Activated</td>";
				}
				echo "<td width='13%' align='center'>";
				if ($_SESSION['sutype'] == 'Coordinator') {
					echo "<a align='center' href='student_view.php?sid=" . $row_pro['sid'] . "'><button class='view'>VIEW</button></a>
						<a align='center' href='student_edit.php?sid=" . $row_pro['sid'] . "'><button class='edit'>EDIT</button></a>
						<a align='center' href='student_delete.php?sid=" . $row_pro['sid'] . "'><button class='delete'>DELETE</button></a>
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