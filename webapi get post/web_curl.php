<?php
// json ile web servis oluşturma(post)

require_once("baglan.php");

$token = $_POST["token"];
$ogrenci = intval($_POST["id"]);

if($token != sha1(md5("mehmet"))) {echo "Yetkisiz Erişim!"; die();}

$ogrenciler = array();
if ($ogrenci>0) {
    $sorgu = $baglan->query("select * from ogrenci where id='$ogrenci'",PDO::FETCH_ASSOC);   
} else {
    $sorgu = $baglan->query("select * from ogrenci", PDO::FETCH_ASSOC);
}

if ($sorgu->rowCount()>0) {
    foreach($sorgu as $satir) {
        $ogrenciler[] = array("adsoyad" => $satir["adsoyad"], "tckimlik" => $satir["tckimlik"],"adres" =>$satir["adres"]);
    }
    header("Cntent-Type:applicotion/json; charset=utf-8");
    $json = json_encode($ogrenciler,JSON_UNESCAPED_UNICODE);
    echo $json;
}
?>