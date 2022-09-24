<?php
    
    require_once("baglan.php");
   
    header("Content-Type:application/json; charset=utf-8");

    $talep = $_SERVER["REQUEST_METHOD"];
    parse_str(file_get_contents("php://input"), $veriler);

    if ($veriler["token"] != sha1(md5("mehmet"))){
       islem($ogrenciler,901,"Yetkisiz erişim");
      }  
        // $islem["icerik"] = $ogrenciler;
        // $islem["kod"] = 901;
        // $islem["mesaj"] = "yetkisiz Erişim";
   
    function islem($icerik, $kod, $mesaj){
        $islem["icerik"] = $icerik;
        $islem["kod"] = $kod;
        $islem["mesaj"] = $mesaj;
        $sonuc = json_encode($islem, JSON_UNESCAPED_UNICODE);
        echo $sonuc;
    }

    if($talep == "GET") {
        $sorgu= $baglan->query("select * from ogrenci where id=$veriler[id]", PDO::FETCH_ASSOC);
        if($sorgu->rowCount() > 0) {
            foreach($sorgu as $satir) {
                $ogrenciler[] = array("adsoyad" => $satir["adsoyad"], "tckimlik" => $satir["tckimlik"], "adres" => $satir["adres"]);
            }
            islem($ogrenciler,900, "Kayıt Listelendi!");
            // $islem["icerik"] = $ogrenciler;
            // $islem["kod"] = 900;
            // $islem["mesaj"] = "Kayıt Listelendi!";
        } else {
            islem("",902,"Kayıt Bulunamadı");
            // $islem["icerik"] = "";
            // $islem["kod"] = 902;
            // $islem["mesaj"] = "Kayıt Bulunamadı";
        }
    } 
    else if ($talep == "POST") {
        $sorgu = $baglan->prepare("insert into ogrenci values (?,?,?,?)");
        $sorgu->execute(NULL,$veriler["adsoyad"], $veriler["tckimlik"],$veriler["adres"]);
        if ($sorgu->rowCount() > 0) {
            islem(array($veriler), 900, "Kayıt Eklendi");
        } else {
            islem (NULL,903,"Kayıt EkleMEndi");
        }
    }
    else if($talep == "PUT") {
        $sorgu = $baglan->prepare("update ogrenci set adsoyad=?, tckimlik=?, adres=? where  id=?");
        $sorgu->execute(array($veriler["adsoyad"], $veriler["tckimlik"],$veriler["adres"],$veriler["id"]));
        if ($sorgu->rowCount() > 0) {
            islem(array($veriler), 900, "Kayıt Güncellendi");
        } else {
            islem (NULL,903,"Kayıt güncellenemedi");
        }
    }
    else if ($talep == "DELETE"){
        $sorgu = $baglan->prepare("delete from ogrenci where id=?");
        $sorgu->execute(array($veriler["id"]));
        if ($sorgu->rowCount() > 0) {
            islem(array($veriler), 900, "Kayıt silindi");
        } else {
            islem (NULL,903,"Kayıt silinemedi");
        }

    }
    else {
        islem (NULL,906, "Hatalı İşlem");
    }
?>