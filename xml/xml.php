<?php

$xml = simplexml_load_file("ogrenciler.xml");
$json = json_encode($xml);
$dizi = json_decode($json,true);
foreach($dizi["ogrenci"] as $icerikler){
    foreach($icerikler as $icerik) {
        echo "$icerik - ";
    }
    echo "<br>";
}


// $xml = new DOMDocument();
// $xml -> load("ogrenciler.xml");

// $ogrenciler = $xml -> getElementsByTagName("ogrenci");

// foreach ($ogrenciler as $ogrenci) {
//     echo $ogrenci -> getElementsByTagName("ad")[0] -> nodeValue . "<br>";
// }


// $xml = new DOMDocument();
// $xml->load("ogrenciler.xml");

// $ogrenciler = $xml -> getElementsByTagName("ogrenci");

// foreach ($ogrenciler as $ogrenci) {
//     echo $ogrenci -> nodeValue . "<br>";
// }

// // xml dosyasını okumak için ikinci yöntem

// $dosya = file_get_contents("http://localhost/esat/ogrenciler.xml");

// $xml = new DOMDocument();
// $xml -> loadXML($dosya);

// echo $xml -> saveXML();

// // xml dosyasını okumak için birinci yöntem
// $xml = new DOMDocument();
// $xml->load("ogrenciler.xml"); // xml formatında yazdırır

// echo $xml->saveXML();


// ikinci yöntem dosya oluşturmak için
// $xml = new DomDocument("1.0","UTF-8");

// $ogrenciler = $xml -> createElement("ogrenciler"); // ismi
// $xml -> appendChild($ogrenciler);  // xml e eklemek için

// for ($i=1; $i<=20; $i++) {
//     $ogrenci = $xml -> createElement("ogrenci");
//     $no = $xml ->createAttribute("no"); // özellik oluştur.
//     $no -> value = $i;  // deger tanımlaması yapılacak
//     $ad = $xml ->createAttribute("ad");
//     $ad -> value = "Mehmet Selçuk $i";
//     $soyad = $xml ->createAttribute("soyad");
//     $soyad -> value = "Batal $i";

//     $ogrenci -> appendChild($no);
//     $ogrenci -> appendChild($ad);
//     $ogrenci -> appendChild($soyad);    

//     $ogrenciler -> appendChild($ogrenci);
    
// }

// $xml -> formatOutput = true;  ///normalde yan yana yazdırır bu alt alta yazdırır

// $xml ->save("ogrenciler.xml");

// echo $xml ->saveHTML();


//Birinci yöntem dosya oluşturmak için
// $xml = new DomDocument("1.0","UTF-8");

// $ogrenciler = $xml -> createElement("ogrenciler"); // ismi
// $xml -> appendChild($ogrenciler);  // xml e eklemek için

// $ogrenci = $xml -> createElement("ogrenci");
// $no = $xml -> createElement("no","1");
// $ad = $xml -> createElement("ad","Ahmet");
// $soyad = $xml -> createElement("Soyad","Koçak");

// $ogrenci -> appendChild($no);
// $ogrenci -> appendChild($ad);
// $ogrenci -> appendChild($soyad);

// $ogrenciler -> appendChild($ogrenci);

// $xml -> save("ogrenciler.xml"); // dosyayı oluşturuyoruz
// echo $xml -> saveHTML(); // ekrana yazdırmak istiyorsak

?>