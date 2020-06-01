<div class="container mt-5">
	
	<h1 align="center">[<?=$data['user']['username'];?>]の詳細情報や説明</h1>
	<br>
		<br>
		<hr>
		<table class="table table-bordered">
			<tr bgcolor="#fcba03">
				<font color="#ffffff">
			       <th>項目</th>
			       <th>内容</th>
			    </font>
		    </tr>
		    <tr>
		       <td>ユーザネーム</td>
		       <td><?=$data['user']['username'];?></td>
		    </tr>
		    <tr>
		      <td>パスワード</td>
		      <td><?=md5($data['user']['password']);?></td>
		    </tr>
		    <tr>
		      <td>level</td>
		      <td><?=$data['user']['level'];?></td>
		    </tr>
		    <tr>
		      <td>E-mail</td>
		      <td><?=$data['user']['email'];?></td>
		    </tr>
		    <tr>
		      <td>登録日</td>
		      <td><?=$data['user']['dates'];?></td>
		    </tr>
		</table>
		<hr>
		<div align="center">
			<a href="<?=BASEURL?>/dashboard"><button type="button" class="btn badge-primary">ホームに戻る</button></a>
			<a href="<?=BASEURL?>/dashboard/user_control"><button type="button" class="btn badge-primary">作品アップロードに戻る</button></a>
		</div>
		<hr>
		<br>
		


</div>