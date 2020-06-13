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
				<td><input type="text" name="username" id="username" placeholder="Username" pattern="[A-Za-z0-9]{6,15}" required="" maxlength="15" class="form-control" size="40">
                <font color="red">※6文字以上英文字</font></td>
				

			</tr>
			<tr>
				<td>パスワード：</td>
			</tr>
			<tr colspan="2">
				<td><input type="password" name="password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required="" maxlength="15" class="form-control"　size="40">
                <font color="red">※8文字以上英数字、大文字+数字を含む</font></td>
                </td>
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

