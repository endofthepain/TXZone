<?php
session_start();
$code1 = rand(1,100);
$code2 = rand(1,100);
$code=$code1 . ' + ' . $code2 . ' =';
$_SESSION["code"]=$code2 + $code1;
$im = imagecreatetruecolor(100, 24);
$bg = imagecolorallocate($im, 22, 86, 165); //background color blue
$fg = imagecolorallocate($im, 255, 255, 255);//text color white
imagefill($im, 0, 0, $bg);
imagestring($im, 5, 5, 5,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>