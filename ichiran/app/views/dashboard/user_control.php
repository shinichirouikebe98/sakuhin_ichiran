<div class="container mt-5">
	<!--notifikasi--->
	<div class="row">
		<div class="col-lg-6">
			<?php Notification::notif(); ?>
		</div>
	</div>

	
	<h1>ユーザデータコントロール</h1>
	<br>
	<hr>
	<!---buton-->
	<div class="row">
		<div class="col-lg-6">
			<button type="button" class="btn btn-primary" data-toggle="modal" id="_addDataUser" data-target="#formModal">
  			ユーザ追加
			</button>
			<a href="<?=BASEURL?>/dashboard/"><button type="button" class="btn badge-danger">ホームに戻る</button></a>
		</div>
	</div>
	<hr>
	
    <!---search-->
			<form action="<?=BASEURL?>/dashboard/searchUserDashboard" method="post">
				<input type="text" class="form-control" name="search" id="search" value="" required placeholder="キーワード 例：ユーザ名、メール、レベル等で検索してみてください。">
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
				      <th scope="col">ユーザネーム</th>
				      <th scope="col">パスワード</th>
				      <th scope="col">E-mail</th>
				      <th scope="col">Level</th>
				      <th scope="col">登録日</th>
				      <th scope="col">アクション</th>
				    </tr>
				  </thead>
			<?php foreach($data['user_data'] as $user):?>
				<!-- PARAMETER DI DALAM HARUS DI SAMAKAN DENGAN DATABASE--->
				
				  <tbody>
				    <tr>
				      <th scope="row"><?= $user['username'];?></th>
				      <td><?= md5($user['password']);?></td>
				      <td><?= $user['email'];?></td>
				      <td><?= $user['level'];?></td>
				      <td><?= $user['dates'];?></td>
				      <td>
				      	
				      	<!----detail button--->
				      	<a href="<?= BASEURL;?>/dashboard/userDetailDashboard/<?= $user['username']?>" class="badge badge-primary">詳細情報</a>|

				      	<!----delete button--->
						<a href="<?= BASEURL;?>/dashboard/deleteUserDashboard/<?= $user['username']?>" class="badge badge-danger" onclick="return confirm('データを削除しますか？');">削除</a>|

						<!----edit button--->

						<a href="" data-code="<?= $user['username'];?>" data-id="$user['username'];?>" class="_showUpdateModalUser badge badge-success" data-toggle="modal" data-target="#formModal">編集</a>

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
	       <form action="<?= BASEURL; ?>/dashboard/addDataUsersDashboard" method="post" enctype="multipart/form-data">
	       		<div class="form-group">
					<label>ユーザーネーム</label>
					<input type="text" name="username" id="username"  required="" maxlength="15" required="" class="form-control">
					<label>パスワード</label>
					<input type="password" name="password"　pattern="[A-Z][a-z]{0,9}" maxlength="15" id="password" required="" class="form-control">
					<label>E-mail</label>
					<input type="email" name="email" id="email" required="" class="form-control">
					<label>Level</label>
					<select name="level" id="level" required="" class="form-control">
						<option selected="" disabled="">一つ選んでください</option>
						<option value="super_user">管理者</option>
						<option value="normal_user">一般ユーザ</option>
					</select>
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