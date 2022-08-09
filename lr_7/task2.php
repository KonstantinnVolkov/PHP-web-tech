<?php
include "simple_html_dom.php";
$root = 'task2ImgFolder/';
$url = 'http://wallpaperswide.com';

$html = file_get_html($url);
foreach ($html -> find("a") as $image) {
    $href = $image->href;
    if (!$href || strlen($href) < 1) {
        $href = "";
        continue;
    }
    echo $href.PHP_EOL;
    $dirName = $image->plaintext;
    if (!file_exists($root . $dirName)) {
        mkdir($root . $dirName, 0777);
    }
    $link = $url . $href;
    echo $link.PHP_EOL;
    $link = file_get_html($link);
    foreach ($link->find("img") as $img) {
        $src = $img->src;
        $fileName = basename($src);
        echo $fileName.PHP_EOL;
        if (strtolower(substr($src, 0, 5)) != "http:" && strtolower(substr($src, 0, 6)) != "https:") {
            $src = $url . $src;
            file_put_contents($root . $dirName . '/' . $fileName, file_get_contents($src));
        }
    }
}

