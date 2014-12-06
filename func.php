<?
function text($text)
{$text=str_replace("<","",$text);
$text=str_replace("\\","",$text);
$text=str_replace("\\\\","",$text);
$text=str_replace(">","",$text);
$text=str_replace("&","",$text);
$text=ereg_replace('http://[-0-9a-zA-Z/&%$#._=?/]+',
'<a href="\\0">\\0</a>',$text);
$text=ereg_replace('www.[-0-9a-zA-Z/&%$#._=?]+',
'<a href="http://\\0">\\0</a>',$text);
return $text;}
function spam($string) {
$data = "lib/spam.txt";
$spam = false;
if (file_exists($data)) {
$spamword = file($data);
$jml = count($spamword);
for ($i=0; $i<$jml; $i++) {
$spamword[$i] = trim($spamword[$i]);
if (eregi($spamword[$i],$string)) {
$spam = true;
break;
}
}
}
return $spam;
}
function ban($banip) {
$data = "lib/ip.txt";
$ban = false;
if (file_exists($data)) {
$ipban = file($data);
$jml = count($ipban);
for ($i=0; $i<$jml; $i++) {
$ipban[$i] = trim($ipban[$i]);
if (eregi($ipban[$i],$banip)) {
$ban = true;
break;
}
}
}
return $ban;
}
?>
