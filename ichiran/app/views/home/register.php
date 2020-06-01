<div class="col-lg-6">
<?php Notification::notif(); ?>
</div>

<div class="container mt-5">
	<h1 align="center">メンバー登録</h1>
	<form method="POST" action="<?=BASEURL?>/home/addData">
		<table align="center" border="0">
			<tr>
				<td>ユーザネーム:</td>
			</tr>
			<tr>
				<td><input type="text" name="username" id="username" placeholder="Username" pattern="[a-z]{0,9}" required="" maxlength="15" class="form-control" size="40"></td>
			</tr>
			<tr>
				<td>パスワード：</td>
			</tr>
			<tr colspan="2">
				<td><input type="password" name="password" id="password" placeholder="Password" pattern="[A-Za-z]{0,9}" required="" maxlength="15" class="form-control"　size="40"></td>
			</tr>
			<tr>
				<td>E-Mail:</td>
			</tr>
			<tr colspan="2">
				<td><input type="email" name="email" id="email" placeholder="email" class="form-control" maxlength="40" required　size="40"></td>
			</tr>
			<tr>
				<td><hr></td>
			</tr>
			<tr>
				<td><input type="submit" value="登録" class="btn btn-info submit" style="">&nbsp;<input type="reset" name="" value="リセット" class="btn btn-info" ></td>
				
			</tr>

		</table>

	</form>
</div>

<footer>
	<div class="footers container-fluid" style="position: absolute;">

