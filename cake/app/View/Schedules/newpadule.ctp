
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <script type="text/javascript" src="/js/fullcalendar.js"></script>
    <script type="text/javascript" src="/js/gcal.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="/css/fullcalendar.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Padule ー日程調整をパズル感覚で</title>
    </script>
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

<script type='text/javascript'>

var dates =　new Object();
var count = 1;
    $(function () {

        // ダミーのイベントを入れるための変数たち
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var calendar = $('#calendar-area').fullCalendar({
            dayNames:['日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日'],
            dayNamesShort:['日', '月', '火', '水', '木', '金', '土'],
            titleFormat:{
                month:'yyyy年 M月',
                week:'[yyyy年 ]M月 d日{ —[yyyy年 ][ M月] d日}',
                day:'yyyy年 M月 d日 dddd'
            },
            buttonText:{
                today:'今日'
            },
            editable:true,
            disableDragging:true, // evetnClickプロパティを有効にするために必要
            eventClick:function (calEvent, jsEvent, view) {
                var title = calEvent.title;
                var start_time = title.split("〜")[0];
                var end_time = title.split("〜")[1];

                var target_date = __date2string(calEvent.start);
                // モーダルの準備
                $("#modal-Label").html(target_date + "の候補日程を変更");
                $("#start_time").val(start_time);
                $("#end_time").val(end_time);
                $("#delete-modal-btn").attr("style", "");
                $('#edit-modal').modal();

                // 確定ボタンクリック
                $("#confirm-modal-btn").die().live("click", function () {

                    var start_time = $("#start_time").val();
                    var end_time = $("#end_time").val();
                    if (start_time != "" && end_time != "") {
                        // エラーを消す
                        $("#modal-alart-area").removeClass("alert alert-error").html("");
                        title = start_time + "〜" + end_time;
                        $("#edit-modal").modal("hide");

                        dates[calEvent.id] = target_date+start_time+"&"+target_date+end_time;
                        for (var keyString in dates) {
                            var elem = document.createElement('input');
                            elem.type = 'hidden';
                            elem.name = 'dates['+ keyString +']';
                            elem.value = dates[keyString];
                            formobj = document.forms[0];
                            formobj.appendChild(elem);
                        }
                    } else {
                        $("#modal-alart-area").addClass("alert alert-error")
                                .html("開始・終了時刻が入力されていません");
                    }

                    calEvent.title = title;
                    calendar.fullCalendar('updateEvent', event);

                    $("#edit-modal").modal("hide");
                });

                $("#delete-modal-btn").die().live("click", function() {
                    var id = calEvent.id;
                    dates[id] = "";
                    for (var keyString in dates) {
                        var elem = document.createElement('input');
                        elem.type = 'hidden';
                        elem.name = 'dates['+ keyString +']';
                        elem.value = dates[keyString];
                        formobj = document.forms[0];
                        formobj.appendChild(elem);
                    }

                    calendar.fullCalendar('removeEvents', id);
                    $("#edit-modal").modal("hide");
                });

            },
            selectable:true,
            selectHelper:true,
            select:function (start, end, allDay) {
                var target_date = __date2string(start);
                // モーダルの準備
                $("#modal-Label").html(target_date + "の候補日程を追加");
                $("#delete-modal-btn").attr("style", "display:none");
                $('#edit-modal').modal();

                // 確定ボタンクリック
                $("#confirm-modal-btn").die().live("click", function () {

                    var start_time = $("#start_time").val();
                    var end_time = $("#end_time").val();

                    if (start_time != "" && end_time != "") {
                        // エラーを消す
                        $("#modal-alart-area").removeClass("alert alert-error").html("");

                        var title = start_time + "〜" + end_time;
                        calendar.fullCalendar('renderEvent',
                                {
                                    id :count,
                                    title:title,
                                    start:start,
                                    end:end,
                                    allDay:allDay
                                },
                                true // make the event "stick"
                        );
                        $("#edit-modal").modal("hide");

                    dates[count] = target_date+" "+start_time+":00"+"&"+target_date+" "+end_time+":00";
                    for (var keyString in dates) {
                        var elem = document.createElement('input');
                        elem.type = 'hidden';
                        elem.name = 'dates['+ keyString +']';
                        elem.value = dates[keyString];
                        formobj = document.forms[0];
                        formobj.appendChild(elem);
                    }
                        count++;
                    } else {
                        $("#modal-alart-area").addClass("alert alert-error")
                                .html("開始・終了時刻が入力されていません");
                    }

                });
                calendar.fullCalendar('unselect');
            },
            events:[
            ]
        });


        function __date2string(date) {
            var YYYY = date.getYear();
            if (YYYY < 2000) {
                YYYY += 1900;
            }
            var MM = date.getMonth() + 1;
            if (MM < 10) {
                MM = "0" + MM;
            }
            var DD = date.getDate();
            if (DD < 10) {
                DD = "0" + DD;
            }
            var tgtDate = YYYY + "-" + MM + "-" + DD;
            return tgtDate;
        }

    });
</script>

<style>
textarea{
width:100%;
height:30%;
}
</style>

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

        <h2>面接日程作成フォーム</h2>
        <blockquote>
            面接可能な日程をスケジューリングし、確定ボタンを押してください。
        </blockquote>

    </div>
<form action="/schedules/newpadule" id="LockNewpaduleForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
    <div class="row-fluid">
        <div>
        <?php
            echo $this->Form->input('Event.title',array('label' => 'タイトル','value'=>'◯◯面接'));
            echo $this->Form->input('Event.text',array('label' => '詳細','value' => 'この度は、弊社にご応募いただき、誠にありがとうございました。
是非一度ご面接の機会を設けさせていただきたく存じ上げます。つきましては、面接内容をご確認のうえ、ご都合の良い日時にご予約いただけますようよろしくお願い致します。

【内容】○○との個人面接　60分

【所要時間】　30分～60分
【持ち物】　履歴書（写真貼付）、筆記用具

選考を通して、当社への理解をより深めていただけますと幸いです。
それではご予約をお待ちしております！
'));
        ?>
        </div>
    </div>

    <div id="calendar-row" class="row-fluid">

        <div id="calendar-area">
        </div>

    </div>

    <br>

    <div class="row-fluid">

        <button class="btn btn-large btn-primary" type="submit">決定</button>

        <a class="btn btn-large btn-danger submit-btn" href="/schedules/">
            元の画面に戻る
        </a>

    </div>

</div>
<div id="hidden"><div>

</form>

<!-- Modal -->
<div id="edit-modal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="modal-Label"></h3>
    </div>
    <div class="modal-body">
        <p>時間帯を入力し、確定ボタンをおしてください。</p>

        <input id="start_time" class="span1" type="time"> 〜 <input id="end_time" class="span1" type="time">

        <div id="modal-alart-area">

        </div>
    </div>
    <div class="modal-footer">
        <button id="confirm-modal-btn" class="btn btn-success">
            <i class="icon-ok icon-white"></i> 確定
        </button>

        <button id="delete-modal-btn" style="display: none" class="btn btn-danger">
            <i class="icon-remove icon-white"></i> 削除
        </button>
    </div>
</div>


</body>
</html>