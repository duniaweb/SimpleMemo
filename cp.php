<?
if(session_is_registered('log')){?><div class="btn-group btn-group-justified">  
<a href="./nyar.php?x=artikel" class="btn btn-default">Write</a>  
<a href="./fil.php?show=ip" class="btn btn-default">Block IP</a>  
<a href="./fil.php?show=spam" class="btn btn-default">Antispam</a>
</div>
<a href="./aut.php?a=ot" class="btn btn-default btn-lg btn-block">Logout</a>
<?}
else{?><div class="jumbotron"> 
<?}?> 
