<?php

$token = sha1(md5("mehmet"));
//$veriler = array("token" =>$token, "id" => "3"); // GET İÇİN
$veriler = array("token" => $token, "adsoyad" =>"Ali Veli", "tckimlik" => "999999", "adres" => "alanya"); //POST İÇİN
//$veriler = array("token" => $token, "adsoyad" =>"Ali Veli", "tckimlik" => "999999", "adres" => "alanya", "id" =>2); //put için
//$veriler = array("token" => $token, "id" => "3");


$curl = curl_init("http://localhost/esat/api.php");
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,"POST"); //GET,POST,PUT,DELETE
curl_setopt($curl,CURLOPT_POSTFIELDS, http_build_query($veriler));
curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
$cevap = curl_exec($curl);
curl_close($curl);

$sonuc = json_decode($cevap, true);

echo "<b>Sonuç: $sonuc[kod] / $sonuc[mesaj]</b><br><br>";

if ($sonuc["kod"] == "900") {
    foreach($sonuc["icerik"] as $icerik){
        foreach($icerik as $anahtar => $deger){
            echo "$anahtar: $deger<br>";
        }
        echo "<br><br>";
    }
}

?>