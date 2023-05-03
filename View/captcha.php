<?php

session_start();

$_SESSION['captcha']= mt_rand(1000,9999);



$im = imagecreate(110, 33);
$font = 'font/destroy.ttf';
$background_color = imagecolorallocate($im, 0, 0, 0);
$text_color = imagecolorallocate($im, 233, 14, 91);
//imagestring($im, 35, 7, 3,  $_SESSION['captcha'], $text_color);
imagettftext($im, 23, 0, 3, 30, $text_color, $font,$_SESSION['captcha']);

header('content-type:image/jpeg');
imagepng($im);
imagedestroy($im);




?>