	<style type="text/css">
		.submit:hover{
			background-color: #00c5ff;
			border-color: #67E6DC;
		}
	</style>
<div class="container mt-5">
	<h1 align="center">ログイン</h1>
	<form method="POST" action="<?=BASEURL?>/Home/login">
		<table align="center" border="0">
			<tr>
				<td>ユーザネーム:</td>
			</tr>
			<tr>
				<td><input type="text" name="username" id="username" placeholder="Username" maxlength="15" class="form-control" size="40"></td>
			</tr>
			<tr>
				<td>パスワード：</td>
			</tr>
			<tr colspan="2">
				<td><input type="password" name="password" id="password" placeholder="Password" maxlength="15" class="form-control"　size="40"></td>
			</tr>
			<tr>
				<td><hr></td>
			</tr>
			<tr>
				<td><input type="submit" value="ログイン" class="btn btn-info submit" style="">&nbsp;<input type="reset" name="" value="リセット" class="btn btn-info" ></td>
				
			</tr>

		</table>

	</form>
</div>



	