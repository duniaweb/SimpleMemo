<?if(!isset($HTTP_REQUEST_VARS))
$HTTP_REQUEST_VARS=$_REQUEST;
if(!isset($HTTP_SERVER_VARS))
$HTTP_SERVER_VARS=$_SERVER;
extract($HTTP_REQUEST_VARS);
extract($HTTP_SERVER_VARS);
include"set.php";
include"./lib/pasar.php";
include"./lib/func.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?if(!$title){$title ="Layangan";}?><?=$title;?></title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/yeti.bootstrap.css">   
<meta charset="utf-8">    
<meta http-equiv="X-UA-Compatible" content="IE=edge">    
<meta name="viewport" content="width=device-width, initial-scale=1">    
<meta name="description" content="">    
<meta name="author" content="goez.my.id">
</head>
<body>
<div class="head">
<div class="jumbotron">
<h1><i class="fa fa-pencil-square-o"></i> <a href="./"> <?=$title;?></a></h1>  
<p><?=$slog;?></p>
</div>
