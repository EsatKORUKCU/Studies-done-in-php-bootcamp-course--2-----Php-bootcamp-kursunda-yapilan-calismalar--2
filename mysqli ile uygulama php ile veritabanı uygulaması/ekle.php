<?php
$baglan = new mysqli("localhost","esat","1234","deneme");

if($baglan->connect_errno) {
    echo "Hata:". $baglan->connect_error;
}

$baglan->set_charset("utf8");

$kayıtno = $_POST["id"];

if($kayıtno>0){
    $adsoyad = $_POST["adsoyad"];
    $tckimlik = $_POST["tckimlik"];
    $telefon = $_POST["telefon"];
    $sorgu->execute();  

    $sorgu= $baglan->query("update set adsoyad='$adsoyad',tckimlik='$tckimlik',
    telefon='$telefon' where id=$kayıtno");

    $toplam = $baglan->affected_rows;

    if ($toplam>0){
        header("location:liste.php");
    }else {
        echo "düzenleme Yapılamadı";
    }



}else{

$sorgu = $baglan->query("insert into ogrenciler values(?,?,?)");
$sorgu = bind_param("sss",$adsoyad,$tckimlik,$telefon);

$adsoyad = $_POST["adsoyad"];
$tckimlik = $_POST["tckimlik"];
$telefon = $_POST["telefon"];
$sorgu->execute();


$toplam = $baglan->affected_rows;
$sorgu->close();
$baglan->close();

if($toplam>0){
   header("location:yeni.php");
    //echo "Kayıt Eklendi.";
} else {
     echo "Kayıt Eklenemedi.";
}
   
}  
?>