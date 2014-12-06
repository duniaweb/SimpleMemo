<?session_start();
include"head.php";
if($a=='login'){
?>
<form action="aut.php" method="post">
<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-key"></i></span>
    <input class="form-control" type="text" name ="pw" type="password" id="inputPassword" placeholder="Password">
    <span class="input-group-btn">
      <button class="btn btn-default" type="submit" name="log" value="Login">Login</button>
    </span>
  </div>
</form>
<?
exit();}
if ($hal == ""){$hal = "1";}
$xfile=@file("content/art.txt");
$first = count($xfile) - ($post * ($hal - 1));
$second = count($xfile) - ($post * $hal) + 1;
if ($second < 1) {$second = 1;}
$hals = (count($xfile) / $post);
if ($hal>1) $rew = "<a class=\"btn btn-primary btn-xs\" href=\"./?hal=".($hal-1)."\">« Sebelumnya</a>";
if ($hal<$hals) $next = "<a class=\"btn btn-primary btn-xs\" href=\"./?hal=".($hal+1)."\">Selanjutnya »</a>";
for ($i = $first-1; $i >= $second-1; $i--) {
$ii = $i;
$ii++;
$data = explode("|",$xfile[$i]);
$fkom=file("./content/kom_$data[0].txt");
print "<div class=\"isi\">
<span class=\"label label-default\"><i class=\"fa fa-calendar-o\"></i> $data[1] <i class=\"fa fa-clock-o\"></i> $data[2]</span> <span class=\"label label-primary\"><i class=\"fa fa-comments-o\"></i> ".count($fkom)." komentar.</span>
<div class=\"list-group\">
  <a href=\"./art.php?id=$data[0]\" class=\"list-group-item\">
     <h4 class=\"list-group-item-heading\"><i class=\"fa fa-paperclip\"></i> ".ucfirst($data[4])."</h4>
    <p class=\"list-group-item-text\">".substr(text($data[5]),0,178)."</p>
  </a>
";
if(session_is_registered('log')){
echo "<a class=\"label label-primary\" href=\"./edit.php?id=$data[0]\">Edit</a>
<a class=\"label label-danger\" href=\"./dels.php?del=entry&amp;id=$data[0]\">Hapus</a>";}
echo "</div>";
}
print "<center>" . $rew."&nbsp;".$next."
</center><hr>";
include"cp.php";
include"footer.php";
?>
