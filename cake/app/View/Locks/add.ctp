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
textarea{
width:100%;
height:30%;
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

        <h2><?php echo $group['Event']['title'];?></h2>
        <blockquote>
            <?php echo nl2br($group['Event']['text']);?>
        </blockquote>

        <blockquote>
            希望する面接日程を選んで、決定ボタンを押してください。
        </blockquote>

    </div>

<form action="/api/locks/add.json" id="LockAddForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>     <div class="row-fluid">
        <div>
       	<?php
			echo $this->Form->input('JobSeeker.username',array('label' => '名前'));
			echo $this->Form->input('JobSeeker.mail',array('label' => 'メールアドレス'));
		?>
        </div>
    </div>

    <div class="row-fluid">

        <table class="table table-bordered">
            <tr>
               <th>
                    日時
                </th>
                <th>
                    希望
                </th>
            </tr>
            <?php
            $i = 0;
	foreach ($group['Schedule'] as $key => $value) {
            $startSplit = split(' ', $value['start_datetime']);
            $endSplit = split(' ', $value['end_datetime']);
			echo $this->Form->hidden('Lock.'.$i.'.schedule_id',array('value' => $value['id']));
            ?>
            <tr>
            	<td><?php echo $startSplit[0].'<br />'.$startSplit[1].'〜'.$endSplit[1];?></td>
                <td>
                    <?php echo $this->Form->input('Lock.'.$i.'.type',array('label' => false,'options' => array(1 => '◯',0 => '☓')));?>
                </td>
            </tr>
            <?php
            $i++;
	}
	?>
        </table>
        <?php echo $this->Form->input('JobSeeker.comment',array('label' => 'メッセージ')); ?>
        <?php echo $this->Form->hidden('JobSeeker.event_id',array('value' => $group['Event']['id'])); ?>

    </div>

    <div class="row-fluid">
    	<button class="btn btn-large btn-primary" type="submit">決定</button>
    </div>
    <br /><br />
        <div class="row-fluid">
            <img src="/img/pasona.jpg" alt="">
        </div>
    </div>


</div>
</body>
</html>
