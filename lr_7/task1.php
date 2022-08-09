<?php
$root = "task1ImgFolder/";
$url = readline("Enter URL: ");
$html = file_get_contents($url);

$doc = new DOMDocument();
$doc->loadHTML($html);

$images = $doc->getElementsByTagName('img');

foreach ($images as $image) {
    $src = $image->getAttribute('src');
    $name = basename($src);
    echo $src.PHP_EOL;
    $path = $root.$name;
    file_put_contents($path, file_get_contents($src));
}
//http://konstanta.tech:8081/feed