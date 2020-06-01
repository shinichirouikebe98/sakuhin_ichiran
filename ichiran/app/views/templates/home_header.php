<!DOCTYPE html>
<html>

<head>
	<title><?= $data['title'] ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="<?= BASEURL;?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?= BASEURL;?>/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Language" content="ja" />
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  	<div class="container-fluid">
      <a class="navbar-brand" href="<?=BASEURL?>"><img src="<?= BASEURL;?>/img/logos.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav"font-family: 'IBM Plex Sans', sans-serif;>
                    <li class="nav-item active">
                      <a class="nav-link" href="<?php echo BASEURL;?>/home/signin"><font color="lightblue" size="+1">ログイン</font></a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="<?= BASEURL;?>/home/register"><font color="green" size="+1">メンバー登録</font></a>
                    </li>

            </ul>

        </div>
    </div>
</nav>


