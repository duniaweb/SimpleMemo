<?session_start();
include"head.php";
switch($x){case artikel : 
if(session_is_registered('log')){?>
<form id="form" action="./execute.php" method="post">
<input type="hidden" name="id" value="<?=date("dmYHis");?>">
<input type="hidden" name="add" value="art"></br>
<form class="form-horizontal">  <fieldset>  
  <legend>Tulis Baru</legend>	<div class="form-group">  <label class="control-label" for="inputDefault" name="judul">Title</label>  
  <input class="form-control" id="inputDefault" type="text" name="judul"></div><div class="form-group">  <label class="control-label" for="inputLarge" name="news">Content</label>
  <textarea class="form-control" rows="8" id="textArea" type="text" name="news"></textarea></div>
  <div class="form-group">      
  <div class="col-lg-10 col-lg-offset-0">        
  <a class="btn btn-default" href="/index.php">Back</a></button> 
  <button type="submit" class="btn btn-success" id="form" value="Simpan">Publish</button>  
  </div>    </div>  </fieldset></form>
</p><?}
break;
case komentar :
if($id){ ?>
<form id="form" action="./execute.php" method="post">
<input type="hidden" name="nid" value="<?=$id;?>">
<input type="hidden" name="id" value="<?=date("dmYHis");?>">
<input type="hidden" name="add" value="kom">
<div class="form-group">
  <label class="control-label" for="inputDefault">Name</label>
  <input class="form-control" id="inputDefault" type="text" name="nam">
</div>

<div class="form-group">
  <label class="control-label" for="inputSmall">Comment</label>
  <textarea class="form-control" rows="3" id="textArea" name="komen" cols="10" rows="5"></textarea>
</div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-0">
        <a class="btn btn-default" href="./art.php?id=<?=$id;?>">Back</a>
        <button type="submit" class="btn btn-primary" value="Simpan">Add</button> 
      </div>
    </div>
	

</form>
<?}
break;
}
