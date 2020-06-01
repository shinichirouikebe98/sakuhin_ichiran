<!-- JUMBOTRON-->
<div class="jumbotron jumbotron-fluid" style="background-image: url(<?=BASEURL?>/img/header.png);
background-size: cover;"> 
    <div class="container" style="font-family: 'IBM Plex Sans', sans-serif; color: #000000; text-shadow: 1px 1px 1px #000000;">
      <h1 class="display-4">イマジネーションを共有する楽園</h1>
      <p class="lead">イマジネーションは裏切らない</p>
    </div>
</div>

  <form action="<?=BASEURL;?>/home/search" method="POST">
      <div class="search container">
        <div class="items">
          <input class="form-control" type="text" placeholder="製作者や作品名などで検索してみてください！"
                aria-label="Search" name="search">
        </div>
        <div class="items">
              <select class="form-control" name="genre" style="padding-right: 5px;" required>
                <option value="" selected="" disabled="">ジャンル選択</option>
                <option value="全部">全部</option>
                <option value="CG">CG</option>
                <option value="写真">写真</option>
                <option value="アニメーション">アニメーション</option>
                <option value="2D">2D</option>
                <option value="3D">3D</option>
              </select>
             
        </div>
        <div class="items"> <input type="submit" name="" class="btn btn-primary form-control" value="作品検索"></div>

      </div>
  </form>
     


  <div class="container">
    <hr>
    <section id="photos">
        <?php foreach($data['sakuhin_data'] as $sakuhin): ?>
          <div class="column" style="padding-top: 5px;">
               <a href="<?=BASEURL;?>/Home/details/<?=$sakuhin['code'];?>" id="shadow"> <img src="<?=BASEURL;?>/img/<?=$sakuhin['file_name'];?>" class="img-fluid img-thumbnail shadow" style='padding-top: 5px;'  alt="詳細を見る！"></a>
          </div>
          
          
        <?php endforeach; ?> 
      
    </section>
 
  </div> 

  <div class="footers container-fluid" style="margin-top: 20px;">


          






	