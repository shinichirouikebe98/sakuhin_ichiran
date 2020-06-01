<div class="container">
  <h1 align="center">ようこそ！<font color="orange"><?=$_SESSION['super']?></font>管理人さん！</h1>
  <div class="container dashboardMenu" align="center" style="padding: 30px;">
    
  <!---真ん中--->
    
      <div class="items">
        <a href="<?=BASEURL?>/dashboard/user_control"><img src="<?=BASEURL?>/img/user.png" class="img-fluid"></a>
        <h2>ユーザ情報</h2>
      </div>
      <div class="items">
        <a href="<?=BASEURL?>/dashboard/sakuhin_control"><img src="<?=BASEURL?>/img/upload.png" class="img-fluid"></a>
        <h2 style="text-align: center;">アップロード</h2>
      </div>
      <div class="items">
        <a href="<?=BASEURL?>/logout/signout"><img src="<?=BASEURL?>/img/logout.png" class="img-fluid"></a>
        <h2 style="text-align: center;">ログアウト</h2>
      </div>

  </div>
</div>

<footer>
  <div class="footers container-fluid" style="position: fixed;">
