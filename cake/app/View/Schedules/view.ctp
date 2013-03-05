
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-responsive.css">
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

        <h2><?php echo $group['Group']['title'];?></h2>
        <blockquote>
            <?php echo nl2br($group['Group']['text']);?>
        </blockquote>

    </div>
    <div class="row-fluid">
        <!--/span-->
        <div class="span12">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th></th>
<?php
/*
$dayCount = array();
foreach ($days as $key => $value) {
    echo '<th>'.$key.'</th>';
    $dayCount[]=$key;
}
*/
foreach ($group['JobSeeker'] as $key => $value) {
    echo '<th>'.$value['username'].'</th>';
}
 ?>
                </tr>
                </thead>
                <tbody>
<?php
foreach ($group['Schedule'] as $key => $schedule) {
    echo '<tr>';
    $startSplit = split(' ', $schedule['start_datetime']);
    $endSplit = split(' ', $schedule['end_datetime']);
    echo '<td>'.$startSplit[0].'<br />'.$startSplit[1].'〜'.$endSplit[1].'</td>';
    foreach ($group['JobSeeker'] as $key => $jobSeeker) {
        foreach ($jobSeeker['Lock'] as $key => $lock) {
            if($lock['schedule_id'] == $schedule['id']) {
                $type = '☓';
                if($lock['lock_type'] == 0) {
                    $type = '◯';
                } else if ($lock['lock_type'] == 1) {
                    $type = '△';
                }
?>
                    <td>
                        <?php if($type=='☓' || $schedule['complete'] || $jobSeeker['complete']) {?>
                        <div class="btn disabled">
                        <?php }else {?>
                        <div class="btn">
                        <?php } ?>
                            <div>[ <?php echo $type;?> ]</div>
                            <?php if($type=='☓' ||($jobSeeker['complete']&& !$lock['approval'] ) || ($schedule['complete'] && !$lock['approval'])) {?>
                            <div class="btn-group">
                                <button class="btn btn btn-danger btn-small" >
                                    不可 <span
                                        class="caret"></span></button>
                            </div>
                            <?php }else if($lock['approval']){?>
                            <div class="btn-group">
                                <button class="btn btn-success btn-small">
                                    承認済み <span
                                        class="caret"></span></button>
                            </div>
                            <?php } else if($type=='△'){ ?>
                            <div class="btn-group">
                                <a class="btn btn-small btn-warning submit-btn" href="/locks/approval/<?php echo $lock['id']?>">
                                    承認する <span
                                        class="caret"></span></a>
                            </div>
                            <?php } else { ?>

                            <div class="btn-group">
                                <a class="btn btn-small btn-primary submit-btn" href="/locks/approval/<?php echo $lock['id']?>">
                                    承認する <span
                                        class="caret"></span></a>
                            </div>
                            <?php }?>
                        </div>
                    </td>
<?php
            }
        }
    }

    echo '</tr>';
}
 ?>
                </tbody>
            </table>

        </div>
        <!--/span-->
    </div>
   <div class="row-fluid">

        <a class="btn btn-danger submit-btn" href="/schedules/">
            元の画面に戻る
        </a>

    </div>
</div>


</body>
</html>
