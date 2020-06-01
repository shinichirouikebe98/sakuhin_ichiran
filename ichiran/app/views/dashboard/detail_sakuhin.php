<div class="container mt-5">
	
	<h1 align="center">[<?=$data['detail_sakuhin']['sakuhinmei'];?>]の詳細情報や説明</h1>
	<br>
		<div align="center"><img src="<?=BASEURL?>/img/<?=$data['detail_sakuhin']['file_name'];?>" class="img-fluid img-thumbnail" width="400" height="400">
		</div>
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
		       <td>コード</td>
		       <td><?=$data['detail_sakuhin']['code'];?></td>
		    </tr>
		    <tr>
		      <td>製作者</td>
		      <td><?=$data['detail_sakuhin']['seishakusha'];?></td>
		    </tr>
		    <tr>
		      <td>作品名</td>
		      <td><?=$data['detail_sakuhin']['sakuhinmei'];?></td>
		    </tr>
		    <tr>
		      <td>ジャンル</td>
		      <td><?=$data['detail_sakuhin']['genre'];?></td>
		    </tr>
		    <tr>
		      <td>コンセプト</td>
		      <td><?=$data['detail_sakuhin']['concept'];?></td>
		    </tr>
		    <tr>
		      <td>アップロード日</td>
		      <td><?=$data['detail_sakuhin']['hiduke'];?></td>
		    </tr>
		</table>
		<hr>
		<div align="center">
			<a href="<?=BASEURL?>/dashboard"><button type="button" class="btn badge-primary">ホームに戻る</button></a>
			<a href="<?=BASEURL?>/dashboard/sakuhin_control"><button type="button" class="btn badge-primary">作品アップロードに戻る</button></a>
		</div>
		<hr>
		<br>
		


</div>