<?php session_start(); $sid = $_SESSION['sid'];?>
<?php include("script/_db.php"); include("_head.php"); include("_nav.php");?>

<div class="setting_view">
	<h1>SETTINGS PAGE</h1><hr />
	<div class="setting-view">
		<div class="setting_left">
			<div class="setting-left">
			<?php
					if($_SESSION['sutype'] === 'Coordinator'){
						echo '
						<br />
						<a href="s-campus_add.php" style="background:green;color:#fff;padding:5px 10px">ADD CAMPUS</a>
			<h3 class="cv-h3">Campus List</h3>
						';
					}
				?>
			<div class="campus_view">
				<table width="100%">
					<?php
						global $connect;
						$get_pro = "SELECT * FROM campus";
						$run_pro = mysqli_query($connect, $get_pro);
						while($row_pro=@mysqli_fetch_array($run_pro)){
								
							if($_SESSION['sutype'] == 'Coordinator'){
								echo "<tr>";
							
								echo "<td width='80%'>" .$row_pro['cname']. "</td>";
								
								echo "<td width='20%' align='center'>";
								if ($_SESSION['sutype'] == 'Coordinator'){
									echo "<a align='center' href='s-campus_view.php?cid=" .$row_pro['cid']. "'><button class='view'>VIEW</button></a>
									<a align='center' href='s-campus_edit.php?cid=" .$row_pro['cid']. "'><button class='edit'>EDIT</button></a>";
								}else{
									echo "<a align='center' href='s-campus_view.php?cid=" .$row_pro['cid']. "'><button class='view'>VIEW</button></a>";
								}
								
										
								echo "</td>";
							
							echo "</tr>";
							}
						}
					?>
				</table>
			</div>
			</div><!--setting-left-->
		</div><!--setting_left-->
		<div class="setting_right"> 
			<div class="setting-right">
				<?php
					if($_SESSION['sutype'] == 'Coordinator'){
						echo '
						<br />
						<a href="s-unit_add.php" style="background:green;color:#fff;padding:5px 10px">ADD UNITS</a>
						<h3 class="cv-h3">Unit List</h3>
						';
					}
				?>
				
				<table width="100%">
					<?php
						global $connect;
						$get_pro = "SELECT * FROM units";
						$run_pro = mysqli_query($connect, $get_pro);
						while($row_pro=@mysqli_fetch_array($run_pro)){
								
							if($_SESSION['sutype'] == 'Coordinator'){
								echo "<tr>";
							
								echo "<td width='80%'>" .$row_pro['unname']. "</td>";
								
								echo "<td width='20%' align='center'>";
								if ($_SESSION['sutype'] == 'Coordinator'){
									echo "<a align='center' href='s-unit_view.php?unid=" .$row_pro['unid']. "'><button class='view'>VIEW</button></a>
									<a align='center' href='s-unit_edit.php?unid=" .$row_pro['unid']. "'><button class='edit'>EDIT</button></a>";
								}else{
									echo "<a align='center' href='s-unit_view.php?unid=" .$row_pro['unid']. "'><button class='view'>VIEW</button></a>";
								}
								
										
								echo "</td>";
							
							echo "</tr>";
							}
						}
					?>
				</table>
			</div>
		</div>


	<div class="campus_view">
		<h3 class="cv-h3">My Information</h3>
		<a href='s-student_edit.php?sid=<?php echo $sid;?>'><button class="cbutton" type='button'>Edit Information</button></a>
		<?php
			global $connect;
			$get_pro = "SELECT * FROM students WHERE sid=$sid";
			$run_pro = mysqli_query($connect, $get_pro);
			while($res = mysqli_fetch_array($run_pro))
				{
					$sid = $res['sid'];
					$sfname = $res['sfname'];
					$slname = $res['slname'];
					$sgender = $res['sgender'];
					$sbirthday = $res['sbirthday'];
					$sutype = $res['sutype'];
					$scampus = $res['scampus'];
					$surole = $res['surole'];
					$semail = $res['semail'];
					$spass = $res['spass'];
					$sstatus = $res['sstatus'];
				}
		?>
		<table width="50%">
			<tr>
				<td width="20%" align="right">First Name :</td>
				<td width="30%"><?php echo $sfname; ?></td>
				<td width="20%" align="right">Last Name :</td>
				<td width="30%"><?php echo $slname; ?></td>
			</tr>
			<tr>
				<td align="right">Gender :</td>
				<td><?php echo $sgender; ?></td>
				<td align="right">Birthday :</td>
				<td><?php echo $sbirthday; ?></td>
			</tr>
			<tr>
				<td align="right">Campus :</td>
				<td colspan="3"><?php echo $scampus; ?></td>
			</tr>
			<tr>
				<td align="right">Email :</td>
				<td><?php echo $semail; ?></td>
				<td align="right">Password :</td>
				<td><?php echo $spass; ?></td>
			</tr>
		</table>

		<br /><br /><br /><br /><br /><br />
	</div>
</div>
<style>
	.setting_view{padding:20px;}
	.setting-view{}
	.setting_left{width:50%;float:left}
	.setting-left{margin: 5px 2.5px 5px 0px;}
	.setting_right{width:50%;float:right}
	.setting-right{margin: 5px 0px 5px 2.5px;}
	
	.campus_view{width:100%;float:left;margin-bottom:20px;}
	.cv-h3{background:gray;padding:5px;margin:12px 0px;color:#fff;}
	.campus_view table tr td{font-size:14px;}
	tr:nth-child(even) {background-color: #f2f2f2;}
	.cbutton{margin-bottom:5px;padding:5px;}

	.credential_view{width:40%;float:right}
</style>
<?php include("_footer.php"); ?>