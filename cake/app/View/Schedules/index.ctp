<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Padule ー日程調整をパズル感覚で</title>

    <style>
.navbar-inverse .navbar-inner {
background-color: #1b1b1b;
background-image: -moz-linear-gradient(top,#ffffff,#f8f8ff);
background-image: -webkit-gradient(linear,0 0,0 100%,from(#ffffff),to(#f8f8ff));
background-image: -webkit-linear-gradient(top,#ffffff,#f8f8ff);
background-image: -o-linear-gradient(top,#ffffff,#f8f8ff);
background-image: linear-gradient(to bottom,#ffffff,#f8f8ff);
background-repeat: repeat-x;
border-color: #f8f8ff;

filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff222222',endColorstr='#ff111111',GradientType=0);
}
</style>
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="/"><img src="/img/header_logo.png" alt=""></a>

            <!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">

    <div class="row-fluid">
        <a href="/schedules/newpadule">新しい日程を作成する。</a><br /><br />

        <div>
            過去の日程<br /><br />
        <?php
            foreach ($group as $key => $value) {
                echo'<a href="/schedules/view/'.$value['Group']['id'].'">'.$value['Group']['title'].'</a> 申請URL： <a href="/locks/add/'.$value['Group']['id'].'">'.'http://padule.me/locks/add/'.$value['Group']['id'].'</a><br />';
            }
         ?>
        </div>

    </div>
    <br />
    <div class="row-fluid">
    新規に面接調整する時は新規ボックスをクリックしてください。<br />
既に作成した面接ボックスを編集をしたい方は対象のボックスをクリックしてください。
	</div>
</div>
</body>
</html>
