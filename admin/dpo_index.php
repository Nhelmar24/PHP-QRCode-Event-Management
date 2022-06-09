<?php include("../script/_db.php"); include("_head.php");?>
<div style="padding:20px">
<div class="titleofpage">
		<div class="titlename">
			<h1>MY DPO MESSAGES</h1>
		</div>
		<div class="searchbox" align="right">
			
		</div>
	</div>
	<hr style="margin:5px 0px">

	<div style="width:100%;">
		<a href='dpo_add.php'><button type='button' class='add'>Create Report</button></a>
	</div>
						
<div class="eventdata">
		<table width="100%">
			<tr style="background:gray;color:#fff;">
				<td width="10%">Date</td>
				<td width="10%">Time</td>
				<td width="50%">Description</td>
				<td width="10%">Status</td>
				<td width="20%">Action</td>
			</tr>
		<?php
			global $connect;
			
			$get_pro = "SELECT * FROM reports WHERE sid=0 && rrecord='0'";
			$run_pro = mysqli_query($connect, $get_pro);
			while($row_pro=@mysqli_fetch_array($run_pro)){

				$rid = $row_pro['rid'];

				echo "<tr>";
				
                    echo "<td>" .$row_pro['rdate']. "</td>";
                    echo "<td>" .$row_pro['rtime']. "</td>";
                    echo "<td>" .$row_pro['rdesc']. "</td>";
					echo "<td>" .$row_pro['rstatus']. "</td>";
					echo "<td>
						<a href='dpo_view.php?rid=$rid' class='view'>View</a>
						<a href='dpo_message.php?rid=$rid' class='edit'>Message DPO</a>
						<a href='dpo_delete.php?rid=$rid' class='delete'>Delete</a>
						</td>";
                    
					
				echo "</tr>";}
				
				
				
			
		?>
		</table>
	</div>
	<style>
		a{color:#fff;}
		.eventdata table tr td{font-size:12px;}
		.eventdata tr:nth-child(even) {background-color: #f2f2f2;}
		.eview, .eedit, .edel{font-size:10px;color:#fff;border:none;padding:3px;border-radius:3px;}
		.eview{background:green;}
		.eedit{background:yellow;color:#000;}
		.edel{background:red;}

		@media screen and (max-width: 720px){
			.event_box{width:100%;float:left;overflow:hidden;color:#fff;}
			.eventdata{width:100%;overflow:scroll;}
		}
	</style>
	<?php include("_footer.php"); ?>