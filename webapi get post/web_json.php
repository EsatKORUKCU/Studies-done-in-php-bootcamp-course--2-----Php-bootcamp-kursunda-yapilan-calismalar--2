<?php
// XML ile Web Servisini Yapımı (GET)
require_once("baglan.php");

$ogrenciler = array();
$sorgu = $baglan->query("select * from ogrenci", PDO::FETCH_ASSOC);

if($sorgu->rowCount() > 0){
    foreach($sorgu as $satir){
        $ogrenciler[] = array("adsoyad" => $satir["adsoyad"], "tckimlik" => $satir["tckimlik"], "adres" => $satir["adres"]);
    }
}



// Http Get ile json Web Servisini Kullanma
// require_once("baglan.php");

// $ogrenciler = array();
// $sorgu = $baglan->query("select * from ogrenci", PDO::FETCH_ASSOC);

// if($sorgu->rowCount() > 0){
//     foreach($sorgu as $satir){
//         $ogrenciler[] = array("adsoyad" => $satir["adsoyad"], "tckimlik" => $satir["tckimlik"], "adres" => $satir["adres"]);
//     }
// }


header("Content-Type: application/json; charset=utf-8");// dosyanın json dosyası oldugunun tanımlar
$json = json_encode($ogrenciler, JSON_UNESCAPED,UNICODE);// json oluşturduk
echo $json;
?>