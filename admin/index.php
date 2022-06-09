<link rel="stylesheet" href="../css/style.css">
	<div class="wrapper-color">
     <form action="_login.php" method="post">
		<div class="login-form">
			<div class="login-table">
				<table width="100%">
					<tr>
						<td colspan="2"><h2 align="center" style="color:#fff;">ADMIN LOGIN</h2></td>
					</tr>
					<tr>
						<td width="40%" align="right" style="color:#fff;">Email:</td>
						<td width="60%"><input type="text" name="uname" placeholder="User Name" autocomplete="off" required></td>
					</tr>
					<tr>
						<td align="right" style="color:#fff;">Password:</td>
						<td><input type="password" name="password" placeholder="Password" autocomplete="off" required><br></td>
					</tr>
				</table>
                
				<div class="form-button">
					<button type="submit">Login</button></div>
			</div>
		</div>
     </form>
	</div>
<?php include("_footer.php"); ?>