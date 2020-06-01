<div class="container">
	<h1 align="center">ようこそ！<font color="orange"><?=$_SESSION['username']?></font>さん！</h1>
	<div class="container dashboardMenu" align="center" style="padding: 30px;">

	  <div class="items">
        <a href="<?=BASEURL?>/user/userDetail/<?=$_SESSION['username']?>"><img src="<?=BASEURL?>/img/user.png" class="img-fluid"></a>
        <h2>ユーザ情報</h2>
      </div>
      <div class="items">
        <a href="<?=BASEURL?>/sakuhin/index/<?=$_SESSION['username']?>"><img src="<?=BASEURL?>/img/upload.png" class="img-fluid"></a>
        <h2>アップロード</h2>
      </div>
      <div class="items">
        <a href="<?=BASEURL?>/logout/signout"><img src="<?=BASEURL?>/img/logout.png" class="img-fluid"></a>
        <h2>ログアウト</h2>
      </div>
    </div>

</div>

<footer>
  <div class="footers container-fluid" style="position: fixed;">

