<?
include"config.php";
$del=$_REQUEST[del];
$id=$_REQUEST[id];
$nid=$_REQUEST[nid];
switch($del)
{case entry :
$datablog="./arsip/art.txt";
$record = file($datablog);
$jmlrec = count($record);
for ($i=0; $i<$jmlrec; $i++) {
$row = explode("|",$record[$i]);
if ($id==$row[0]) {
$record[$i] = "";}}
$update_data = fopen($datablog,"w");
for ($j=0; $j<$jmlrec; $j++) 
{if($record[$j] <> "") 
fputs($update_data,$record[$j]);}
fclose($update_data);
unlink("./arsip/kom_$id.txt");
header("location:./");
break;
case koment :
$datakom="./arsip/kom_$nid.txt";
$record = file($datakom);
$jmlrec = count($record);
for ($i=0; $i<$jmlrec; $i++) {
$row = explode("|",$record[$i]);
if ($id==$row[0]) {
$record[$i] = "";}}
$update_data = fopen($datakom,"w");
for ($j=0; $j<$jmlrec; $j++) 
{if($record[$j] <> "") 
fputs($update_data,$record[$j]);}
fclose($update_data);
header("location:./art.php?id=$nid");
break;
case allkom :
$dell=fopen("./arsip/kom_$id.txt","w+");
header("location:./art.php?id=$id");
break;
case allnews :
$dell=fopen("./arsip/entry.txt","w+");
header("location:./");
break;
}
?>
