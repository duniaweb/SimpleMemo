<?
if(session_is_registered('log')){?>
<div class="btn-group btn-group-justified">  
<a href="./new.php?x=artikel" class="btn btn-default">Write</a>  
<a href="./fil.php?show=ip" class="btn btn-default">Manage IP Deny</a>  
<a href="./fil.php?show=spam" class="btn btn-default">Manage Spams</a>
</div>
<a href="./aut.php?a=ot" class="btn btn-default btn-lg btn-block">Sign Off</a>
<?}
else{?><div class="jumbotron"> 
<?}?> 
