<?php
/**
 * Created by PhpStorm.
 * User: liang
 * Date: 2017/8/16
 * Time: 9:20
 */
$str=file_get_contents('url.txt');
$str=explode(PHP_EOL,$str);
//var_dump($str);
for ($i=0;$i<count($str);$i++){
    echo "<url>
        <loc>$str[$i]</loc>
        <changefreq>always</changefreq>
        <priority>0.8</priority>
    </url>";
    echo '<br/>';
}
