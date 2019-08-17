<?php
$height = 60;  // neue Hoehe

if(($direndung == ".jpg") or ($direndung == ".jpeg") or
($direndung == ".JPG") or ($direndung == ".JPEG")){

$bg = ImageCreateFromJpeg("$uploadfile");
$img_width = imagesx($bg);
$img_height = imagesy($bg);

$width = ($height/$img_height) * $img_width; // Passende Breite berechnen

$im = ImageCreateTrueColor($width,$height);  // Verkleinertes Bild erstellen

ImageAlphaBlending($im,false);
ImageCopyResampled($im, $bg, 0, 0, 0, 0, $width, $height, $img_width, $img_height);  // verkleinern

ImageDestroy($bg); // und das alte Bild aus dem Speicher entfernen
Imagejpeg($im,"$vorschau_ort"); // neues Bild ausgeben, alternativ koennte man es speichern.
}

if(($direndung == ".gif") or ($direndung == ".GIF")){

echo $bg = ImageCreateFromGif("$uploadfile");
$img_width = imagesx($bg);
$img_height = imagesy($bg);

$width = ($height/$img_height) * $img_width; // Passende Breite berechnen

$im = ImageCreateTrueColor($width,$height);  // Verkleinertes Bild erstellen

ImageAlphaBlending($im,false);
ImageCopyResampled($im, $bg, 0, 0, 0, 0, $width, $height, $img_width, $img_height);  // verkleinern

ImageDestroy($bg); // und das alte Bild aus dem Speicher entfernen
Imagegif($im,"$vorschau_ort"); // neues Bild ausgeben, alternativ koennte man es speichern.
}


if(($direndung == ".png") or
($direndung == ".PNG")){

$bg = ImageCreateFromPng("$uploadfile");
$img_width = imagesx($bg);
$img_height = imagesy($bg);

$width = ($height/$img_height) * $img_width; // Passende Breite berechnen

$im = ImageCreateTrueColor($width,$height);  // Verkleinertes Bild erstellen

ImageAlphaBlending($im,false);
ImageCopyResampled($im, $bg, 0, 0, 0, 0, $width, $height, $img_width, $img_height);  // verkleinern

ImageDestroy($bg); // und das alte Bild aus dem Speicher entfernen
Imagepng($im,"$vorschau_ort"); // neues Bild ausgeben, alternativ koennte man es speichern.
}


if(($direndung == ".wbmp") or
($direndung == ".WBMP")){

$bg = ImageCreateFromwbmp("$uploadfile");
$img_width = imagesx($bg);
$img_height = imagesy($bg);

$width = ($height/$img_height) * $img_width; // Passende Breite berechnen

$im = ImageCreateTrueColor($width,$height);  // Verkleinertes Bild erstellen

ImageAlphaBlending($im,false);
ImageCopyResampled($im, $bg, 0, 0, 0, 0, $width, $height, $img_width, $img_height);  // verkleinern

ImageDestroy($bg); // und das alte Bild aus dem Speicher entfernen
Imagewbmp($im,"$vorschau_ort"); // neues Bild ausgeben, alternativ koennte man es speichern.
}
?>