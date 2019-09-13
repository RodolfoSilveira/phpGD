<?php
$filename = "imagem.png";

$width = 200;
$height = 200;

list($largura_original, $altura_original) = getimagesize($filename);

$ratio = $largura_original / $altura_original;

if($width/$height > $ratio) {
    $width = $height * $ratio;
} else {
    $height = $width / $ratio;
}

$imagem_final = imagecreatetruecolor($width, $height);
$imagem_original = imagecreatefrompng($filename);

imagecopyresampled($imagem_final, $imagem_original, 
0, 0, 0, 0,
$width, $height, $largura_original, $altura_original);

// header("Content-Type: image/png");
// imagejpeg($imagem_final, null, 80);
imagepng($imagem_final, "mini_imagem.png");

echo "Imagem redimensionada com sucesso!";