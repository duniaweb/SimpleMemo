<?
session_start();
include"head.php";
if(session_is_registered('log')){
switch($ad)
{case ipx :
if($ip!='')
{$op=fopen("./lib/ip-blacklisted.db","a");
fwrite($op,"$ip\r\n");
fclose($op);
echo "
<div class=\"alert alert-dismissable alert-success\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
  <strong>Oke!</strong> $ip was addedd to Deny Ips. <a onclick=\"history.back()\" class=\"alert-link\">back.</a>.
</div>
";}
else{}
break;
case spamx :
if($spam!='')
{$op=fopen("./lib/spamw.db","a");
fwrite($op,"$spam\r\n");
fclose($op);
echo "
<div class=\"alert alert-dismissable alert-success\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
  <strong>Oke!</strong> $spam was added to list Spam!. <a onclick=\"history.back()\" class=\"alert-link\">back.</a>.
</div>
";}
else{}
break;
}
switch($fil){
case ip : ?>
<form action="<?=$PHP_SELF;?>?ad=ipx" method="post">
<div class="form-group">
  <label class="control-label">Input IP</label>
  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-ban"></i></span>
    <input class="form-control" type="text" name="ip">
    <span class="input-group-btn">
      <button class="btn btn-default" type="submit" Value="Tambahkan">Add</button>
    </span>
  </div>
</form>
<?
break;
case spam : ?>
<form action="<?=$PHP_SELF;?>?ad=spamx" method="post">
<div class="form-group">
  <label class="control-label">Input Word</label>
  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-times"></i></span>
    <input class="form-control" type="text" name="spam">
    <span class="input-group-btn">
      <button class="btn btn-default" type="submit" Value="Tambahkan">Add</button>
    </span>
  </div>
</form>
<?
break;
}
switch($show)
{
case ip :
$data=file("./lib/ip-blacklisted.db");
$total=count($data);
$post=15;
if ($hal == "")
{$hal = "1";}
$first = $total - ($post * ($hal - 1));
$second = $total - ($post * $hal) + 1;
if ($second < 1) {$second = 1;}
$hals = ($total / $post);
if ($hal>1) $rew = "<a href=\"$PHP_SELF?show=ip&amp;hal=".($hal-1)."\">".($hal-1)."</a>";
if ($hal<$hals) $next = "<a href=\"$PHP_SELF?show=ip&amp;hal=".($hal+1)."\">".($hal+1)."</a>";
echo "<div class=\"panel panel-danger\">  <div class=\"panel-heading\">    <h3 class=\"panel-title\">List of IP Deny</h3>  </div>
";
for ($i = $first-1; $i >= $second-1; $i--) 
{
$ii = $i;$ii++;
echo $data[$i].' </br>';}
echo "
</div></div>
<p><a class=\"btn btn-default\" href=\"$PHP_SELF?fil=ip\">Add More</a></p></div>
<th><p>$rew  $next</p>";
break;
case spam :
$data=file("./lib/spamw.db");
$total=count($data);
$post=15;
if ($hal == "")
{$hal = "1";}
$first = $total - ($post * ($hal - 1));
$second = $total - ($post * $hal) + 1;
if ($second < 1) {$second = 1;}
$hals = ($total / $post);
if ($hal>1) $rew = "<a href=\"$PHP_SELF?show=spam&amp;hal=".($hal-1)."\">".($hal-1)."</a>";
if ($hal<$hals) $next = "<a href=\"$PHP_SELF?show=spam&amp;hal=".($hal+1)."\">".($hal+1)."</a>";
echo "
<div class=\"panel panel-warning\">
  <div class=\"panel-heading\">
    <h3 class=\"panel-title\">List of Spams</h3>
  </div>
  <div class=\"panel-body\">

";
for ($i = $first-1; $i >= $second-1; $i--) 
{
$ii = $i;$ii++;
$isi=explode(' ',$data[$i]);
echo $isi[0]."</br>";}
echo "
  </div>
</div>
<p><a class=\"btn btn-default\" href=\"$PHP_SELF?fil=spam\">Add More</a></p></div>
<p>$rew  $next</p>";
break;
}
}
include"cp.php";
include"footer.php";?>

