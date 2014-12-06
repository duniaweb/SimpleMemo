<?if(!isset($HTTP_REQUEST_VARS))
$HTTP_REQUEST_VARS=$_REQUEST;
if(!isset($HTTP_SERVER_VARS))
$HTTP_SERVER_VARS=$_SERVER;
extract($HTTP_REQUEST_VARS);
extract($HTTP_SERVER_VARS);
include"config.php";
include"./lib/mods.php";
include"./lib/func.php";?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title><?if(!$title){$title ="Layangan";}?><?=$title;?></title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/lib/botsarap.css">   
<meta charset="utf-8">    
<meta http-equiv="X-UA-Compatible" content="IE=edge">    
<meta name="viewport" content="width=device-width, initial-scale=1">    
<meta name="description" content="<?=$title;?> -  <?=$slog;?>">    
<meta name="author" content=" <?=$email;?>">
</head><body>
<div class="head">
<div class="jumbotron">  <h1><i class="fa fa-pencil-square-o"></i> <a href="./"> <?=$title;?></a></h1>  <p>   <?=$slog;?></p></div>
