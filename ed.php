<?php
session_start();
include"config.php";
$id =  $_REQUEST['id'];
$judul = $_POST['judul'];
$news = $_POST['news'];
$rep = $_POST['rep'];
$datablog=("./content/art.txt");
if(session_is_registered('log')){
if($rep) 
{if(isset($id)) 
{$data = file($datablog);
for($i=0;$i<count($data);$i++) 
{$isi = explode("|", $data[$i]);
if ($isi[0]==$id) 
{$data[$i] = "$isi[0]|$isi[1]|$isi[2]|$isi[3]|$judul|$news|\r\n";
$fp = fopen($datablog, "wb");
$flock ? flock($fp, 2) : '';
foreach($data as $line) 
{
fputs($fp, rtrim($line)."\n");
}
fclose($fp);
header("location:./art.php?id=$id");
if(file_exists($datablog)) {
return true;
} 
else
{
return false;}}}}
}
header("location:./art.php?id=$id");
}
else{header("location:./art.php?id=$id");}
?>
