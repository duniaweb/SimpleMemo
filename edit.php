<?php
session_start();
include"head.php";
if(session_is_registered('log')){
$arsip='content/art.txt';
if($id){
$xfile=file($arsip);
for($x=0;$x<count($xfile);$x++)
{
$data = explode("|",$xfile[$x]);
if($id==$data[0])
{?>
<form action="ed.php" method="post">
<input type="hidden" name="id" value="<?=$id;?>"><form class="form-horizontal">  <fieldset>    <legend>Edit Tulisan</legend>	<div class="form-group">  <label class="control-label" for="inputDefault" name="judul">Judul</label>    <input class="form-control" id="inputDefault" type="text" name="judul" value="<?=$data[4];?>"></div><div class="form-group">  <label class="control-label" for="inputLarge" name="news">Tulisan</label>  <textarea class="form-control" rows="8" id="textArea" type="text" name="news"><?=$data[5];?></textarea></div>  <div class="form-group">        <div class="col-lg-10 col-lg-offset-0">          <a class="btn btn-default" onclick="history.back()">Kembali</a></button>   <button type="submit" class="btn btn-primary" id="form" name="rep" value="Edit">Simpan</button>    </div>    </div>  </fieldset></form></p>
<?
}
}
}
}
?>
