<?session_start();
include"head.php";
$arsip='content/art.txt';
if($id){
$xfile=file($arsip);
for($x=0;$x<count($xfile);$x++)
{
$data = explode("|",$xfile[$x]);
if($id==$data[0])
{
echo "
<div class=\"list-group\">
  <h4 class=\"list-group-item active\">
    ".ucfirst($data[4])." 
  </h4>
  <a  class=\"list-group-item\">".text($data[5])."
  </a>
</div></a></div><span class=\"label label-default\"> Written by $data[3] on $data[1] at $data[2]</span> ";
if(session_is_registered('log')){
echo " <a class=\"label label-primary\" href=\"./edit.php?id=$data[0]\">Edit</a>
<a class=\"label label-danger\" href=\"./dels.php?del=entry&amp;id=$data[0]\">Hapus</a>";}
echo "<br></br>";
}}}
echo"<div id=\"form\">";
$komdata=file("./content/kom_$id.txt");
echo "";
if(session_is_registered('log')){
echo "<br/><a class=\"label label-danger\" href=\"./dels.php?del=allkom&amp;id=$id\">Hapus semua komentar</a><br></br>";}
$self="./art.php?id=$id";
if ($hal == ""){$hal = "1";}
$first = count($komdata) - ($postkom * ($hal - 1));
$second = count($komdata) - ($postkom * $hal) + 1;
if ($second < 1) {$second = 1;}
$hals = (count($komdata) / $postkom);
if ($hal>1) $rew = "<ul class=\"pager\">  <li><a  href=\"$self&amp;hal=".($hal-1)."\">← Sebelumnya</a></li></ul>";
if ($hal<$hals) $next = "<ul class=\"pager\">  <li><a  href=\"$self&amp;hal=".($hal+1)."\">Selanjutnya →</a></li></ul>";
for ($i = $first-1; $i >= $second-1; $i--) {
$ii = $i;
$ii++;
$data = explode("|",$komdata[$i]);
print "<div><hr><div class=\"list-group\">  <a class=\"list-group-item\">    ".ucfirst($data[4])."<span style=\"float: right;\"><small>$data[2] $data[3]</small>  </a>  <a  class=\"list-group-item\">".text($data[5])."  </a>";
if(session_is_registered('log')){
echo "<span class=\"label label-info\"> $data[6]</span> <a class=\"label label-warning\" href=\"fil.php?ad=ipx&amp;ip=$data[6]\">Banned</a>
<a class=\"label label-danger\" href=\"./dels.php?del=koment&amp;nid=$data[1]&amp;id=$data[0]\">Hapus</a>";}
echo "</div>";
}?>
<?=$rew.' '.$next;?></div>
<p><a class="btn btn-default" href="./new.php?x=komentar&amp;id=<?=$id;?>"> <i class="fa fa-comment-o"></i> Tambah Komentar</a></p><hr>
<?include"cp.php";
include"footer.php";
?>
