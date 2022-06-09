<link rel="stylesheet" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class="wrapper-color">
	<form action="_login.php" method="post">
		<div class="login-form">
			<div class="login-img">
				<div class="login_img">
					<img src="img/rsu.png" width="20%">
				</div>
			</div>
			<div class="login-table">
				<table width="100%">
					<tr>
						<td colspan="2">
							<h2 align="center" style="color:#fff;">USER LOGIN</h2>
						</td>
					</tr>
					<tr>
						<td width="40%" align="right" style="color:#fff;">Email:</td>
						<td width="60%"><input type="text" name="uname" placeholder="User Name" autocomplete="off" required></td>
					</tr>
					<tr>
						<td align="right" style="color:#fff;">Password:</td>
						<td><input type="password" name="password" placeholder="Password" autocomplete="off" required><br></td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit">Login</button><a href="reset-password.php" style="color:#fff;">
								Forgot Password ?
							</a><br /><br />
							<a href="register.php" style="font-size:12px;color:yellow;">No Account? Register Here</a>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>

						</td>
					</tr>
				</table>
			</div>
		</div>
	</form>
</div>
</body>

</html>
<style>
	td button {
		padding: 8px 35px;
		background: rgba(0, 255, 0, 0.4);
		border: none;
		color: #fff;
		border-radius: 3px;
	}
</style>