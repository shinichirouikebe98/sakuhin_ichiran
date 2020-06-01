
<!------------CONTENT---------->
<div class="container mt-5">
	<!--notifikasi--->
	<div class="row">
		<div class="col-lg-6">
			<?php Notification::notif(); ?>
		</div>
	</div>

	
	<h1>作品アップロード</h1>
	<hr>
	<!---buton-->
	<div class="row">
		<div class="col-lg-6">
			<button type="button" class="btn btn-primary" data-toggle="modal" id="addDataSakuhin" data-target="#formModal" data-id="<?=$_SESSION['username']?>">
  			作品追加
			</button>
			<a href="<?=BASEURL?>/user"><button type="button" class="btn badge-danger">ホームに戻る</button></a>
		</div>
	</div>
	<hr>
	
    <!---search-->
			<form action="<?=BASEURL?>/sakuhin/search" method="post">
				<input type="text" class="form-control" name="search" id="search" value="" required placeholder="キーワード 例：作品名、ジャンル等で検索してみてください。">
				<hr>
				<button type="submit" class="btn btn-primary form-control" id="searchData">
					検索
				</button>
			</form>

	<br>
	    <!---data-->
	    <h3>作品一覧</h3>
	    <table class="table table-striped">
				  <thead>
				    <tr>
				      <th scope="col">コード</th>
				      <th scope="col">作品名</th>
				      <th scope="col">製作者</th>
				      <th scope="col">ジャンル</th>
				      <th scope="col">アクション</th>
				    </tr>
				  </thead>
			<?php foreach($data['sakuhin_data'] as $sakuhin):?>
				<!-- PARAMETER DI DALAM HARUS DI SAMAKAN DENGAN DATABASE--->
				
				  <tbody>
				    <tr>
				      <th scope="row"><?= $sakuhin['code'];?></th>
				      <td><?= $sakuhin['sakuhinmei'];?></td>
				      <td><?= $sakuhin['seishakusha'];?></td>
				      <td><?= $sakuhin['genre'];?></td>
				      <td>
				      	
				      	<!----detail button--->
				      	<a href="<?= BASEURL;?>/sakuhin/details/<?= $sakuhin['code']?>" class="badge badge-primary">詳細情報</a>|

				      	<!----delete button--->
						<a href="<?= BASEURL;?>/sakuhin/deleteData/<?= $sakuhin['code']?>/<?= $sakuhin['file_name'];?>/<?=$_SESSION['username'];?>/" class="badge badge-danger" onclick="return confirm('データを削除しますか？');">削除</a>|

						<!----edit button--->

						<a href="" data-code="<?= $sakuhin['code'];?>" data-id="$sakuhin['seishakusha'];?>" class="showUpdateModalSakuhin badge badge-success" data-toggle="modal" data-target="#formModal">編集</a>

				      </td>

				    </tr>
				  </tbody>
				

			<?php endforeach;?>	
		</table>
	<hr>

</div>
<!-- Modal -->
			<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">

			    <!-- Modal header-->	
			      <div class="modal-header">
			        <h5 class="modal-title" id="formModalLabel">データ追加</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>

				<!-- Modal BODY-->
				      <div class="modal-body">
				       <form action="<?= BASEURL; ?>/sakuhin/addData/<?=$_SESSION['username'];?>" method="post" enctype="multipart/form-data">
				       		<div class="form-group">
				       			<input type="hidden" class="form-control" id="code" name="code" value=""  required>
				       			<input type="hidden" class="form-control" id="old_name" name="old_name" value="" required>
				       			<label for="sakusha">作者名 :</label>
				       			<input type="text" class="form-control" id="seishakushaText" maxlength="15" name="seishakushaText" value="<?=$_SESSION['username']?>" placeholder="作者名" required>
				       			<label for="sakuhinmei">作品名 :</label>
				       			<input type="text" class="form-control" id="sakuhinmei" name="sakuhinmei" value="" placeholder="作品名" required>

				       			<label for="concept">コンセプト :</label>
				       			<textarea name="conceptText" id="conceptText" value="" placeholder="コンセプト" class="form-control"></textarea>

				       			<label for="genre">ジャンル :</label>
				       			<select name="genre" id="genre" required class="form-control">
				       				<option selected disabled>一つ選んでください！</option>
				       				<option value="CG">CG</option>
				       				<option value="写真">写真</option>
				       				<option value="アニメーション">アニメーション</option>
				       				<option value="2D">2D</option>
				       				<option value="3D">3D</option>
				       			</select>
				       			<label for="file_name">ファイル :</label>
				       			<input type="file" name="files" id="files" class="form-control">
				       		</div>    
				      </div>

			<!-- Modal footer-->
				       <div class="modal-footer">
				        <button type="submit" class="btn btn-primary" >追加</button>
				       </form>
				   		</div>

			    </div>
			  </div>
			</div>


<footer>
  <div class="footers container-fluid" style="position: sticky;">


			



