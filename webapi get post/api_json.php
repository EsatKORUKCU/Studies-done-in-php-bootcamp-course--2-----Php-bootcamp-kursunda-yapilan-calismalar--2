<?php

Http Get ile json Web Servisini Kullanma
$url = "http://localhost/esat/web_json.php";
$json = file_get_contents($url);
$json = json_decode($json,true);

foreach($json as $ogrenciler){
    foreach($ogrenciler as $anahtar => $deger) {
        echo "$anahtar: $deger<br>";
    }
    echo "<br><br>";
}

?>