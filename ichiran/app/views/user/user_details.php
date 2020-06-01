
<div class="container">
  <h1 align="center">アカウント情報</h1>
  <table class="table table-bordered">

    <tr>
      <td>ユーザ</td>
      <td><?= $data['user']['username'];?></td>
    </tr>
    <tr>
      <td>パスワード</td>
      <td><?= $data['user']['password'];?></td>
    </tr>

    <tr>
      <td>E-Mail</td>
      <td><?= $data['user']['email'];?></td>
    </tr>

    <tr>
      <td>登録日</td>
      <td><?= $data['user']['dates'];?></td>
    </tr>

  </table>

  <?php Notification::notif(); ?>
  <hr>
  <div class="container buttonPosition">
    <div class="items">
      <input type="button" class="editData btn btn-primary form-control" name="" value="ユーザ情報編集" data-toggle="modal" id="editData" data-target="#formModal" data-code="<?=$_SESSION['username'];?>" data-email="<?= $data['user']['email'];?>" class="">
    </div>
    <div class="items">
      <input type="button" name="" value="パスワード変更" data-toggle="modal" id="editPwd" data-target="#formModal" data-code="<?=$_SESSION['username'];?>"  class="showEditPwd btn btn-primary form-control">
    </div>
    <div class="items">
      <a href="<?=BASEURL;?>/user/deleteAccount/<?=$_SESSION['username'];?>"><input type="button" name="" class="form-control btn btn-danger" value="アカウント削除"></a>
    </div>
  </div>
  
</div>

<!-----modal 1----->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">データ編集</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
       <form action="<?= BASEURL; ?>/user/editData/<?= $data['user']['username']?>" method="post">
       		<div class="form-group">
       			<input type="hidden" class="form-control" id="username" name="username" value="<?= $data['user']['username']?>" required>
       			<label for="email">email :</label>
       			<input type="email" class="form-control" id="email" name="email" value="<?= $data['user']['email']?>" placeholder="email" required>

       			
       		</div>
       
      </div>

      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary" >編集</button>
       </form>

      </div>

    </div>
  </div>
</div>
<hr>
<footer>
  <div class="footers container-fluid" style="position: sticky;">

