<?if(!isset($HTTP_REQUEST_VARS))
$HTTP_REQUEST_VARS=$_REQUEST;
if(!isset($HTTP_SERVER_VARS))
$HTTP_SERVER_VARS=$_SERVER;
extract($HTTP_REQUEST_VARS);
extract($HTTP_SERVER_VARS);
include"config.php";
include"./lib/func.php";
include"./lib/mods.php";
$arsip='content/art.txt';
$news=str_replace("\n"," ",$news);
$news=str_replace("\r"," ",$news);
$komen=str_replace("\n"," ",$komen);
$komen=str_replace("\r"," ",$komen);
$ip=isset($_SERVER[HTTP_X_FORWARDED_FOR]) ?
$_SERVER[HTTP_X_FORWARDED_FOR] : $_SERVER[REMOTE_ADDR];
switch($add){
case art :
if($news==''||$judul=='')
{header("location:new.php?x=artikel");}
else
{$op=fopen($arsip,"a");
$content="$id|$tang|$jam|$admin|$judul|$news|\r\n";
chmod($arsip,0777);
fwrite($op,$content);
fclose($op);
fopen("content/kom_$id.txt","w");
chmod("content/kom_$id.txt",0777);
header("location:./");}
break;
case kom :
$komfile="./content/kom_$nid.txt";
$cex=file($komfile);
for($x=0;$x<count($cex);$x++)
{$exist=explode('|',$cex[$x]);}
if($nam==''||$komen=='')
{header("location:new.php?x=komentar&id=$nid");}
elseif($nam==$exist[4]&&$komen==$exist[5])
{header("location:new.php?x=komentar&id=$nid");}
elseif(spam($nam)||spam($komen)||ban($ip))
{header("location:new.php?x=komentar&id=$nid");}
else{
$op=fopen($komfile,"a");
$content="$id|$nid|$tang|$jam|$nam|$komen|$ip|\r\n";
fwrite($op,$content);
fclose($op);
header("location:./art.php?id=$nid");
}
break;
}
?>
