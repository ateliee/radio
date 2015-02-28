<?php
if(isset($_GET['url'])){
    $url = $_GET['url'];
    exec("killall mplayer");
    exec("mplayer -playlist " .$url. " > /dev/null &");
}
if(isset($_GET['action'])){
    if($_GET['action']=="stop"){
        exec("killall mplayer");
    }
}
/**
 * @param $id
 * @return string
 */
function get_shoutcast_url($id)
{
    return sprintf('http://yp.shoutcast.com/sbin/tunein-station.pls?id=%s',$id);
}

/**
 * @param $id
 * @return string
 */
function get_itunes_url($id){
    return sprintf('http://www.live365.com/cgi-bin/play.pls?stationid=%s&tag=itunes',$id);
}

/**
 * @param $str
 * @return mixed
 */
function escape_str($str){
    return $str;
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>インターネットラジオ再生</title>

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <h2>インターネットラジオ再生</h2>
    <p><a href="index.php?action=stop" class="btn btn-danger btn-block">stop</a></p>
    <h2>プレイリスト</h2>
    <h3>shoutcast</h3>
    <ul class="nav nav-pills nav-stacked">
        <li><a href="./?url=<?php print escape_str(get_shoutcast_url(172098)); ?>" class="btn btn-default btn-block">SmoothJazz.com Global Radio</a></li>
        <li><a href="./?url=<?php print escape_str(get_shoutcast_url(709809)); ?>" class="btn btn-default btn-block">ABC Lounge</a></li>
        <li><a href="./?url=<?php print escape_str(get_shoutcast_url(209680)); ?>" class="btn btn-default btn-block">ABC Jazz</a></li>
        <li><a href="./?url=<?php print escape_str(get_shoutcast_url(190282)); ?>" class="btn btn-default btn-block">Jazzradio</a></li>
        <li><a href="./?url=<?php print escape_str(get_shoutcast_url(98600)); ?>" class="btn btn-default btn-block">TheJazzGroove.com</a></li>
    </ul>
    <h3>itunes</h3>
    <ul class="nav nav-pills nav-stacked">
        <li><a href="./?url=<?php print escape_str(get_itunes_url('rec4')); ?>" class="btn btn-default btn-block">J POP</a></li>
        <li><a href="./?url=<?php print escape_str('http://listen.sky.fm/itunes/jpop.pls'); ?>" class="btn btn-default btn-block">J POP</a></li>
        <li><a href="./?url=<?php print escape_str('http://www.sky.fm/mp3/itunes/tophits.pls'); ?>" class="btn btn-default btn-block">洋楽</a></li>
    </ul>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>