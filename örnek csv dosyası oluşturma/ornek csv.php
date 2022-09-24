<?php

$dosya = fopen("isimler.csv","rbt");

while (!feof($dosya)) {
    $satir = fgetcsv($dosya,filesize("isimler.csv"). ";");
}

foreach($satir as $icerik) {
    echo "$icerik<br>";
}

fclose($dosya);

/*
$isimler = array("Mehmet","Fatih","Zehra","Metehan");

touch("isimler.csv");

$dosya = fopen("isimler.csv","wbt");

foreach($isimler as $isim) {
    fwrite($dosya,"$isim;");
}

fclose($dosya);
*/
?>